
-- 1. Tao database neu chua co
CREATE DATABASE IF NOT EXISTS testdb
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE testdb;


-- 2. Tao bang students (Sinh vien)
CREATE TABLE IF NOT EXISTS students (
  id            INT(11)      NOT NULL AUTO_INCREMENT,
  student_code  VARCHAR(50)  NOT NULL,
  full_name     VARCHAR(100) NOT NULL,
  email         VARCHAR(100) DEFAULT NULL,
  phone         VARCHAR(20)  DEFAULT NULL,
  class_name    VARCHAR(50)  DEFAULT NULL,
  date_of_birth DATE         DEFAULT NULL,
  gender        VARCHAR(10)  DEFAULT NULL,
    PRIMARY KEY (id),
  UNIQUE KEY student_code (student_code)
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;


-- 3. Tao bang subjects (Mon hoc)
CREATE TABLE IF NOT EXISTS subjects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    code VARCHAR(50) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    credits INT NOT NULL
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;


-- 4. Tao bang grades (Diem)
CREATE TABLE IF NOT EXISTS grades (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    subject_id INT NOT NULL,
    score DECIMAL(4,2) NOT NULL,

    CONSTRAINT fk_grades_students
        FOREIGN KEY (student_id) REFERENCES students(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    CONSTRAINT fk_grades_subjects
        FOREIGN KEY (subject_id) REFERENCES subjects(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    CONSTRAINT chk_grades_score
        CHECK (score >= 0 AND score <= 10)
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;


-- 5. Them du lieu mau cho students
INSERT INTO students (student_code, full_name, email, phone, class_name, date_of_birth, gender) VALUES
('SV001', 'Nguyễn Văn An',  'an@example.com',  '0901234567', 'CNTT01', '2004-03-15', 'Nam'),
('SV002', 'Trần Thị Bình',  'binh@example.com', '0912345678', 'CNTT01', '2004-07-22', 'Nữ'),
('SV003', 'Lê Minh Cường',  'cuong@example.com','0923456789', 'CNTT02', '2003-11-05', 'Nam');


-- 6. Them du lieu mau cho subjects
INSERT INTO subjects (code, name, credits)
VALUES
('MH01', 'Lập trình PHP MVC', 3),
('MH02', 'Cơ sở dữ liệu nâng cao', 4),
('MH03', 'Mạng máy tính', 3),
('MH04', 'Cấu trúc dữ liệu và giải thuật', 4),
('MH05', 'Hệ điều hành', 3);


-- 7. Them du lieu mau cho grades
INSERT INTO grades (student_id, subject_id, score)
VALUES
(1, 1, 8.50),
(1, 2, 7.00),
(2, 1, 9.00),
(2, 3, 8.00),
(3, 4, 7.50);


-- 8. Tao bang users (Nguoi dung: Quan tri vien he thong)
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL DEFAULT 'admin',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;


-- 9. Them tai khoan Quan tri vien mac dinh (Admin Account)
-- Email: admin@studyhub.edu.vn | Mat khau: admin123
INSERT INTO users (fullname, email, password, role)
VALUES
('Quản trị viên Hệ thống', 'admin@studyhub.edu.vn', '$2y$10$mEBVpgtoZ4gYT03zEspL.eruBa82ljHYNIcRD6Kk0bAFqN.4PbdcW', 'admin')
ON DUPLICATE KEY UPDATE role = 'admin';
