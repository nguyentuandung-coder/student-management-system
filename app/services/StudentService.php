<?php

require_once APP_ROOT . '/app/models/Student.php';

class StudentService
{
    // Lay ket noi CSDL (tra ve null neu that bai)
    private function getConn()
    {
        $dbConnection = new DbConnection();
        return $dbConnection->getConnection();
    }

    // Chuyen chuoi rong thanh NULL cho cac cot khong bat buoc
    private function nullIfEmpty($value)
    {
        $value = trim((string)$value);
        return $value === '' ? null : $value;
    }

    private function rowToStudent($row)
    {
        return new Student(
            $row['id'],
            $row['student_code'],
            $row['full_name'],
            $row['email'],
            $row['phone'],
            $row['class_name'],
            $row['date_of_birth'],
            $row['gender']
        );
    }

    // Ham lay danh sach sinh vien
    public function getAllStudents()
    {
        $students = [];
        $conn = $this->getConn();

        if ($conn != null) {
            $stmt = $conn->query("SELECT * FROM students ORDER BY id ASC");
            if ($stmt) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $students[] = $this->rowToStudent($row);
                }
            }
        }

        return $students;
    }

    // Kiem tra ma sinh vien da ton tai chua (bo qua mot id khi sua)
    public function studentCodeExists($studentCode, $excludeId = null)
    {
        $conn = $this->getConn();
        if ($conn == null) {
            return false;
        }

        $sql = "SELECT COUNT(*) FROM students WHERE student_code = :code";
        $params = [':code' => $studentCode];
        if ($excludeId !== null) {
            $sql .= " AND id <> :id";
            $params[':id'] = $excludeId;
        }

        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        return (int)$stmt->fetchColumn() > 0;
    }

    // Ham them sinh vien
    public function addStudent(Student $student)
    {
        $conn = $this->getConn();
        if ($conn == null) {
            return false;
        }

        $sql = "INSERT INTO students (student_code, full_name, email, phone, class_name, date_of_birth, gender)
                VALUES (:student_code, :full_name, :email, :phone, :class_name, :date_of_birth, :gender)";
        $stmt = $conn->prepare($sql);

        return $stmt->execute([
            ':student_code'  => $student->getStudentCode(),
            ':full_name'     => $student->getFullName(),
            ':email'         => $this->nullIfEmpty($student->getEmail()),
            ':phone'         => $this->nullIfEmpty($student->getPhone()),
            ':class_name'    => $this->nullIfEmpty($student->getClassName()),
            ':date_of_birth' => $this->nullIfEmpty($student->getDateOfBirth()),
            ':gender'        => $this->nullIfEmpty($student->getGender()),
        ]);
    }

    // Ham lay sinh vien theo ID
    public function getStudentById($id)
    {
        $conn = $this->getConn();
        if ($conn == null) {
            return null;
        }

        $stmt = $conn->prepare("SELECT * FROM students WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ? $this->rowToStudent($row) : null;
    }

    // Ham cap nhat sinh vien
    public function updateStudent(Student $student)
    {
        $conn = $this->getConn();
        if ($conn == null) {
            return false;
        }

        $sql = "UPDATE students
                SET student_code = :student_code, full_name = :full_name, email = :email, phone = :phone,
                    class_name = :class_name, date_of_birth = :date_of_birth, gender = :gender
                WHERE id = :id";
        $stmt = $conn->prepare($sql);

        return $stmt->execute([
            ':id'            => $student->getId(),
            ':student_code'  => $student->getStudentCode(),
            ':full_name'     => $student->getFullName(),
            ':email'         => $this->nullIfEmpty($student->getEmail()),
            ':phone'         => $this->nullIfEmpty($student->getPhone()),
            ':class_name'    => $this->nullIfEmpty($student->getClassName()),
            ':date_of_birth' => $this->nullIfEmpty($student->getDateOfBirth()),
            ':gender'        => $this->nullIfEmpty($student->getGender()),
        ]);
    }

    // Ham xoa sinh vien theo ID
    public function deleteStudent($id)
    {
        $conn = $this->getConn();
        if ($conn == null) {
            return false;
        }

        $stmt = $conn->prepare("DELETE FROM students WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
