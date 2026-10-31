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

        // Tao bang users tinh gon chuan cho Quan tri vien
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT PRIMARY KEY AUTO_INCREMENT,
            fullname VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
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
                $insert = $this->conn->prepare("INSERT INTO users (fullname, email, password, role) 
                                                VALUES ('Quản trị viên Hệ thống', 'admin@studyhub.edu.vn', :password, 'admin')");
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

    public function findByEmail($email) {
        if ($this->conn == null || empty($email)) return null;

        $email = trim($email);
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $stmt->execute([':email' => strtolower($email)]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new User(
                $row['id'],
                $row['fullname'],
                $row['email'],
                $row['password'],
                $row['role'],
                $row['created_at']
            );
        }
        return null;
    }

    public function findByEmailOrCode($identifier) {
        return $this->findByEmail($identifier);
    }

    public function login($identifier, $password) {
        if ($this->conn == null) {
            return ['success' => false, 'message' => 'Không thể kết nối cơ sở dữ liệu! Vui lòng kiểm tra lại MySQL trong XAMPP.'];
        }

        $identifier = trim($identifier);
        if (empty($identifier) || empty($password)) {
            return ['success' => false, 'message' => 'Vui lòng nhập đầy đủ thông tin đăng nhập!'];
        }

        $user = $this->findByEmail($identifier);
        if (!$user) {
            return ['success' => false, 'message' => 'Tài khoản email quản trị viên không tồn tại!'];
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
