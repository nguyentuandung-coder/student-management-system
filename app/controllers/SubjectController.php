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
        $code = '';
        $name = '';
        $credits = '';
        $errorMessage = null;
        include_once APP_ROOT . '/app/views/subject/add.php';
    }

    public function store()
    {
        $code = strtoupper(trim($_POST['code'] ?? ''));
        $name = trim($_POST['name'] ?? '');
        $credits = (int)($_POST['credits'] ?? 0);
        $subjectService = new SubjectService();

        if (empty($code) || empty($name)) {
            $errorMessage = 'Vui lòng điền đầy đủ mã môn học và tên môn học!';
        } elseif ($credits <= 0 || $credits > 15) {
            $errorMessage = 'Số tín chỉ phải từ 1 đến 15!';
        } elseif ($subjectService->codeExists($code)) {
            $errorMessage = "Mã môn học \"{$code}\" đã tồn tại trong hệ thống! Vui lòng chọn mã khác.";
        } else {
            try {
                $subject = new Subject(null, $code, $name, $credits);
                $subjectService->addSubject($subject);
                header('Location: ?controller=subject&action=index');
                exit;
            } catch (PDOException $e) {
                $errorMessage = "Lỗi lưu dữ liệu: Mã môn học \"{$code}\" đã tồn tại!";
            }
        }

        include APP_ROOT . '/app/views/subject/add.php';
    }

    public function edit($id)
    {
        if (!empty($id)) {
            $subjectService = new SubjectService();
            $subject = $subjectService->getSubjectById($id);

            if ($subject != null) {
                $code = $subject->getCode();
                $name = $subject->getName();
                $credits = $subject->getCredits();
                $errorMessage = null;
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
        $code = strtoupper(trim($_POST['code'] ?? ''));
        $name = trim($_POST['name'] ?? '');
        $credits = (int)($_POST['credits'] ?? 0);
        $subjectService = new SubjectService();

        $subject = $subjectService->getSubjectById($id);
        if ($subject == null) {
            echo 'Không tìm thấy môn học!';
            return;
        }

        if (empty($code) || empty($name)) {
            $errorMessage = 'Vui lòng điền đầy đủ mã môn học và tên môn học!';
        } elseif ($credits <= 0 || $credits > 15) {
            $errorMessage = 'Số tín chỉ phải từ 1 đến 15!';
        } elseif ($subjectService->codeExists($code, $id)) {
            $errorMessage = "Mã môn học \"{$code}\" đã tồn tại ở một môn học khác! Vui lòng chọn mã khác.";
        } else {
            try {
                $updatedSubject = new Subject($id, $code, $name, $credits);
                $subjectService->updateSubject($updatedSubject);
                header('Location: ?controller=subject&action=index');
                exit;
            } catch (PDOException $e) {
                $errorMessage = "Lỗi cập nhật: Mã môn học \"{$code}\" đã tồn tại!";
            }
        }

        include APP_ROOT . '/app/views/subject/edit.php';
    }

    public function delete($id)
    {
        if (empty($id)) {
            header('Location: ?controller=subject&action=index');
            exit;
        }

        $subjectService = new SubjectService();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_POST['btn_confirm_delete'])) {
            $subjectService->deleteSubject($id);
            header('Location: ?controller=subject&action=index');
            exit;
        }

        $subject = $subjectService->getSubjectById($id);
        if ($subject == null) {
            header('Location: ?controller=subject&action=index');
            exit;
        }

        include APP_ROOT . '/app/views/subject/delete.php';
    }
}
