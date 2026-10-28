-- Tao Database testdb neu chua co
CREATE DATABASE IF NOT EXISTS testdb CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE testdb;

-- Tao bang subjects (Mon hoc)
CREATE TABLE IF NOT EXISTS subjects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    code VARCHAR(50) NOT NULL,
    name VARCHAR(100) NOT NULL,
    credits INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Du lieu mau
INSERT INTO subjects (code, name, credits) VALUES
('MH01', 'Lập trình PHP MVC', 3),
('MH02', 'Cơ sở dữ liệu nâng cao', 4),
('MH03', 'Mạng máy tính', 3),
('MH04', 'Cấu trúc dữ liệu và giải thuật', 4),
('MH05', 'Hệ điều hành', 3);
