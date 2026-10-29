<?php

require_once APP_ROOT . '/app/services/StudentService.php';

class StudentController
{
    // Danh sach sinh vien
    public function index()
    {
        $studentService = new StudentService();
        $students = $studentService->getAllStudents();
        include APP_ROOT . '/app/views/student/index.php';
    }

    // Hien form them sinh vien
    public function add()
    {
        include_once APP_ROOT . '/app/views/student/add.php';
    }

    // Luu sinh vien moi
    public function store()
    {
        $student_code  = trim($_POST['student_code'] ?? '');
        $full_name     = trim($_POST['full_name'] ?? '');
        $email         = trim($_POST['email'] ?? '');
        $phone         = trim($_POST['phone'] ?? '');
        $class_name    = trim($_POST['class_name'] ?? '');
        $date_of_birth = trim($_POST['date_of_birth'] ?? '');
        $gender        = trim($_POST['gender'] ?? '');

        if ($student_code === '' || $full_name === '') {
            header('Location: ?controller=student&action=add');
            exit;
        }

        $studentService = new StudentService();

        // Ma sinh vien bi trung -> khong them
        if ($studentService->studentCodeExists($student_code)) {
            echo '<script>alert("Mã sinh viên đã tồn tại!"); history.back();</script>';
            exit;
        }

        $student = new Student(null, $student_code, $full_name, $email, $phone, $class_name, $date_of_birth, $gender);
        $studentService->addStudent($student);

        header('Location: ?controller=student&action=index');
        exit;
    }

    // Hien form sua sinh vien
    public function edit($id)
    {
        if (empty($id)) {
            echo 'ID sinh viên không hợp lệ!';
            return;
        }

        $studentService = new StudentService();
        $student = $studentService->getStudentById($id);

        if ($student == null) {
            echo 'Không tìm thấy sinh viên!';
            return;
        }

        include APP_ROOT . '/app/views/student/edit.php';
    }

    // Cap nhat sinh vien
    public function update($id)
    {
        $student_code  = trim($_POST['student_code'] ?? '');
        $full_name     = trim($_POST['full_name'] ?? '');
        $email         = trim($_POST['email'] ?? '');
        $phone         = trim($_POST['phone'] ?? '');
        $class_name    = trim($_POST['class_name'] ?? '');
        $date_of_birth = trim($_POST['date_of_birth'] ?? '');
        $gender        = trim($_POST['gender'] ?? '');

        if (empty($id) || $student_code === '' || $full_name === '') {
            header('Location: ?controller=student&action=index');
            exit;
        }

        $studentService = new StudentService();

        if ($studentService->studentCodeExists($student_code, $id)) {
            echo '<script>alert("Mã sinh viên đã tồn tại!"); history.back();</script>';
            exit;
        }

        $student = new Student($id, $student_code, $full_name, $email, $phone, $class_name, $date_of_birth, $gender);
        $studentService->updateStudent($student);

        header('Location: ?controller=student&action=index');
        exit;
    }

    // Xoa sinh vien: GET -> trang xac nhan, POST -> thuc hien xoa
    public function delete($id)
    {
        if (empty($id)) {
            header('Location: ?controller=student&action=index');
            exit;
        }

        $studentService = new StudentService();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $studentService->deleteStudent($id);
            } catch (PDOException $e) {
                // Vi pham rang buoc khoa ngoai (sinh vien da co diem...)
            }
            header('Location: ?controller=student&action=index');
            exit;
        }

        $student = $studentService->getStudentById($id);
        if ($student == null) {
            header('Location: ?controller=student&action=index');
            exit;
        }

        include APP_ROOT . '/app/views/student/delete.php';
    }
}
