<?php
require_once APP_ROOT . '/app/services/SubjectService.php';

class SubjectController
{
    public function index()
    {
        $subjectService = new SubjectService();
        $subjects = $subjectService->getAllSubjects();
        include APP_ROOT . '/app/views/subject/index.php';
    }

    public function add()
    {
        include_once APP_ROOT . '/app/views/subject/add.php';
    }

    public function store()
    {
        $code = trim($_POST['code'] ?? '');
        $name = trim($_POST['name'] ?? '');
        $credits = (int)($_POST['credits'] ?? 0);

        if (!empty($code) && !empty($name) && $credits > 0) {
            $subject = new Subject(null, $code, $name, $credits);
            $subjectService = new SubjectService();
            $subjectService->addSubject($subject);
        }

        header('Location: ?controller=subject&action=index');
        exit;
    }

    public function edit($id)
    {
        if (!empty($id)) {
            $subjectService = new SubjectService();
            $subject = $subjectService->getSubjectById($id);

            if ($subject != null) {
                include APP_ROOT . '/app/views/subject/edit.php';
            } else {
                echo 'Không tìm thấy môn học!';
            }
        } else {
            echo 'ID môn học không hợp lệ!';
        }
    }

    public function update($id)
    {
        $code = trim($_POST['code'] ?? '');
        $name = trim($_POST['name'] ?? '');
        $credits = (int)($_POST['credits'] ?? 0);

        if (!empty($id) && !empty($code) && !empty($name) && $credits > 0) {
            $subject = new Subject($id, $code, $name, $credits);
            $subjectService = new SubjectService();
            $subjectService->updateSubject($subject);
        }

        header('Location: ?controller=subject&action=index');
        exit;
    }

    public function delete($id)
    {
        if (empty($id)) {
            header('Location: ?controller=subject&action=index');
            exit;
        }

        $subjectService = new SubjectService();

        // Neu la POST hoac bam nut xac nhan xoa -> Thuc hien xoa trong CSDL
        if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_POST['btn_confirm_delete'])) {
            $subjectService->deleteSubject($id);
            header('Location: ?controller=subject&action=index');
            exit;
        }

        // Neu la GET -> Hien thi giao dien xac nhan xoa (delete.php)
        $subject = $subjectService->getSubjectById($id);
        if ($subject == null) {
            header('Location: ?controller=subject&action=index');
            exit;
        }

        include APP_ROOT . '/app/views/subject/delete.php';
    }
}
