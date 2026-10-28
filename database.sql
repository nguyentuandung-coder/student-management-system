
-- 1. Tao database neu chua co
CREATE DATABASE IF NOT EXISTS testdb
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE testdb;


-- 2. Tao bang students (Sinh vien)
CREATE TABLE IF NOT EXISTS students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_code VARCHAR(50) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    class VARCHAR(50) NOT NULL
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;


-- 3. Tao bang subjects (Mon hoc)
CREATE TABLE IF NOT EXISTS subjects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    code VARCHAR(50) NOT NULL,
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
INSERT INTO students (student_code, name, class)
VALUES
('SV001', 'Nguyen Van An', '66HTTT1'),
('SV002', 'Tran Thi Binh', '66HTTT1'),
('SV003', 'Le Van Cuong', '66HTTT2');


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


-- 8. Tao bang users (Nguoi dung: Sinh vien / Giang vien / Quan tri)
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_code VARCHAR(50) NULL,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    class_name VARCHAR(50) NULL,
    role VARCHAR(20) NOT NULL DEFAULT 'student',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_unicode_ci;
