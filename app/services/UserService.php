<?php
require_once APP_ROOT . '/app/libs/DbConnection.php';
require_once APP_ROOT . '/app/models/User.php';

class UserService {
    private $conn;

    public function __construct() {
        $db = new DbConnection();
        $this->conn = $db->getConnection();
        $this->createTableIfNotExists();
        $this->seedAdminIfNotExists();
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
            role VARCHAR(20) NOT NULL DEFAULT 'admin',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

        $this->conn->exec($sql);
    }

    /**
     * Tu dong khoi tao tai khoan Quan tri vien mac dinh neu chua co
     */
    public function seedAdminIfNotExists() {
        if ($this->conn == null) {
            return;
        }

        try {
            $stmt = $this->conn->prepare("SELECT COUNT(*) FROM users WHERE role = 'admin' OR email = 'admin@studyhub.edu.vn'");
            $stmt->execute();
            $count = (int)$stmt->fetchColumn();

            if ($count === 0) {
                $hashedPassword = password_hash('admin123', PASSWORD_BCRYPT);
                $insert = $this->conn->prepare("INSERT INTO users (student_code, fullname, email, password, class_name, role) 
                                                VALUES ('ADMIN01', 'Quản trị viên Hệ thống', 'admin@studyhub.edu.vn', :password, 'Phòng Đào tạo', 'admin')");
                $insert->execute([':password' => $hashedPassword]);
            }
        } catch (Exception $e) {
            // Khong ngat chuong trinh neu gap loi ghi
        }
    }

    public function emailExists($email) {
        if ($this->conn == null) return false;
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
        $stmt->execute([':email' => trim($email)]);
        return (int)$stmt->fetchColumn() > 0;
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
        if ($this->conn == null) {
            return ['success' => false, 'message' => 'Không thể kết nối cơ sở dữ liệu! Vui lòng kiểm tra lại MySQL trong XAMPP.'];
        }

        $identifier = trim($identifier);
        if (empty($identifier) || empty($password)) {
            return ['success' => false, 'message' => 'Vui lòng nhập đầy đủ thông tin đăng nhập!'];
        }

        $user = $this->findByEmailOrCode($identifier);
        if (!$user) {
            return ['success' => false, 'message' => 'Tài khoản hoặc mã quản trị viên không tồn tại!'];
        }

        if (!password_verify($password, $user->getPassword())) {
            return ['success' => false, 'message' => 'Mật khẩu quản trị viên không chính xác!'];
        }

        // Kiem tra phan quyen: Chi cho phep tai khoan co role 'admin'
        if ($user->getRole() !== 'admin') {
            return ['success' => false, 'message' => 'Tài khoản của bạn không có quyền truy cập vào Cổng Quản Trị Hệ Thống!'];
        }

        return [
            'success' => true,
            'message' => 'Đăng nhập thành công!',
            'user' => $user
        ];
    }
}
