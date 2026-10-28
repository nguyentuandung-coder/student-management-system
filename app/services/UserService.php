<?php
require_once APP_ROOT . '/app/libs/DbConnection.php';
require_once APP_ROOT . '/app/models/User.php';

class UserService {
    private $conn;

    public function __construct() {
        $db = new DbConnection();
        $this->conn = $db->getConnection();
        $this->createTableIfNotExists();
    }

    private function createTableIfNotExists() {
        if ($this->conn == null) {
            return;
        }

        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT PRIMARY KEY AUTO_INCREMENT,
            student_code VARCHAR(50) NULL,
            fullname VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            class_name VARCHAR(50) NULL,
            role VARCHAR(20) NOT NULL DEFAULT 'student',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

        $this->conn->exec($sql);
    }

    public function emailExists($email) {
        if ($this->conn == null) return false;
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
        $stmt->execute([':email' => trim($email)]);
        return (int)$stmt->fetchColumn() > 0;
    }

    public function studentCodeExists($studentCode) {
        if ($this->conn == null || empty($studentCode)) return false;
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM users WHERE student_code = :code");
        $stmt->execute([':code' => trim($studentCode)]);
        return (int)$stmt->fetchColumn() > 0;
    }

    public function register($studentCode, $fullname, $email, $password, $confirmPassword, $className = '', $agreeTerms = true) {
        if ($this->conn == null) {
            return ['success' => false, 'message' => 'Không thể kết nối cơ sở dữ liệu! Vui lòng kiểm tra lại MySQL trong XAMPP.'];
        }

        $fullname = trim($fullname);
        $studentCode = strtoupper(trim($studentCode));
        $email = strtolower(trim($email));
        $className = trim($className);

        // Validation
        if (empty($fullname)) {
            return ['success' => false, 'message' => 'Vui lòng nhập họ và tên của bạn!'];
        }

        if (empty($email)) {
            return ['success' => false, 'message' => 'Vui lòng nhập địa chỉ email!'];
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['success' => false, 'message' => 'Định dạng email không hợp lệ (VD: sv.an@studyhub.edu.vn)!'];
        }

        if (empty($password)) {
            return ['success' => false, 'message' => 'Vui lòng nhập mật khẩu!'];
        }

        if (strlen($password) < 6) {
            return ['success' => false, 'message' => 'Mật khẩu phải có ít nhất 6 ký tự!'];
        }

        if ($password !== $confirmPassword) {
            return ['success' => false, 'message' => 'Mật khẩu xác nhận không khớp!'];
        }

        if (!$agreeTerms) {
            return ['success' => false, 'message' => 'Bạn cần đồng ý với Điều khoản sử dụng và Chính sách của hệ thống!'];
        }

        if ($this->emailExists($email)) {
            return ['success' => false, 'message' => 'Email này đã được sử dụng. Vui lòng chọn email khác hoặc chuyển sang Đăng nhập!'];
        }

        if (!empty($studentCode) && $this->studentCodeExists($studentCode)) {
            return ['success' => false, 'message' => 'Mã định danh này đã tồn tại trong hệ thống!'];
        }

        // Tự động phân loại role dựa trên mã định danh hoặc email
        $role = 'student';
        if (str_starts_with($studentCode, 'GV') || str_contains($email, 'gv.') || str_contains($email, 'giaovu')) {
            $role = 'teacher';
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        try {
            $stmt = $this->conn->prepare("INSERT INTO users (student_code, fullname, email, password, class_name, role) 
                                          VALUES (:student_code, :fullname, :email, :password, :class_name, :role)");
            $stmt->execute([
                ':student_code' => !empty($studentCode) ? $studentCode : null,
                ':fullname' => $fullname,
                ':email' => $email,
                ':password' => $hashedPassword,
                ':class_name' => !empty($className) ? $className : null,
                ':role' => $role
            ]);

            // Dong bo sang bang students neu la sinh vien va co ma sinh vien
            if (!empty($studentCode) && $role === 'student') {
                try {
                    $checkStudent = $this->conn->prepare("SELECT COUNT(*) FROM students WHERE student_code = :code");
                    $checkStudent->execute([':code' => $studentCode]);
                    if ((int)$checkStudent->fetchColumn() === 0) {
                        $studentCols = $this->conn->query("SHOW COLUMNS FROM students")->fetchAll(PDO::FETCH_COLUMN);
                        $nameCol = in_array('full_name', $studentCols) ? 'full_name' : (in_array('name', $studentCols) ? 'name' : null);
                        $classCol = in_array('class_name', $studentCols) ? 'class_name' : (in_array('class', $studentCols) ? 'class' : null);
                        $emailCol = in_array('email', $studentCols) ? 'email' : null;

                        if ($nameCol) {
                            $fields = ['student_code', $nameCol];
                            $params = [':code' => $studentCode, ':name' => $fullname];
                            $placeholders = [':code', ':name'];

                            if ($classCol && !empty($className)) {
                                $fields[] = $classCol;
                                $params[':class'] = $className;
                                $placeholders[] = ':class';
                            }

                            if ($emailCol && !empty($email)) {
                                $fields[] = $emailCol;
                                $params[':email'] = $email;
                                $placeholders[] = ':email';
                            }

                            $sql = "INSERT INTO students (" . implode(', ', $fields) . ") VALUES (" . implode(', ', $placeholders) . ")";
                            $insertStudent = $this->conn->prepare($sql);
                            $insertStudent->execute($params);
                        }
                    }
                } catch (Exception $ex) {
                    // Ghi nhan hoac bo qua loi dong bo sang students
                }
            }

            return [
                'success' => true,
                'message' => 'Đăng ký tài khoản thành công! Bạn có thể sử dụng thông tin này để đăng nhập.'
            ];
        } catch (PDOException $e) {
            return [
                'success' => false,
                'message' => 'Lỗi lưu dữ liệu: ' . $e->getMessage()
            ];
        }
    }

    public function findByEmailOrCode($identifier) {
        if ($this->conn == null || empty($identifier)) return null;

        $identifier = trim($identifier);
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :id1 OR student_code = :id2 LIMIT 1");
        $stmt->execute([
            ':id1' => strtolower($identifier),
            ':id2' => strtoupper($identifier)
        ]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new User(
                $row['id'],
                $row['student_code'],
                $row['fullname'],
                $row['email'],
                $row['password'],
                $row['class_name'],
                $row['role'],
                $row['created_at']
            );
        }
        return null;
    }

    public function login($identifier, $password) {
        $user = $this->findByEmailOrCode($identifier);
        if (!$user) {
            return ['success' => false, 'message' => 'Tài khoản hoặc mã sinh viên không tồn tại!'];
        }

        if (!password_verify($password, $user->getPassword())) {
            return ['success' => false, 'message' => 'Mật khẩu không chính xác!'];
        }

        return [
            'success' => true,
            'message' => 'Đăng nhập thành công!',
            'user' => $user
        ];
    }
}
