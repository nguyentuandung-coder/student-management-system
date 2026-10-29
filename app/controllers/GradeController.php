<?php
require_once APP_ROOT . '/app/services/GradeService.php';

class GradeController
{

    // Hien thi danh sach diem
    public function index()
    {
        $gradeService = new GradeService();
        $grades = $gradeService->getAllGrades();

        include APP_ROOT . '/app/views/grade/index.php';
    }

    // Hien thi form them diem
    public function add()
    {
        $studentCode = '';
        $errorMessage = null;
        include_once APP_ROOT . '/app/views/grade/add.php';
    }

    // Xu ly them diem
    public function store()
    {
        $studentCode = trim($_POST['student_code'] ?? '');
        $subject_id = (int)($_POST['subject_id'] ?? 0);
        $scoreInput = $_POST['score'] ?? null;
        $score = is_numeric($scoreInput) ? (float)$scoreInput : -1;
        $gradeService = new GradeService();
        $student = $studentCode !== '' ? $gradeService->getStudentByCode($studentCode) : null;

        if ($student === null) {
            $errorMessage = 'Mã sinh viên không tồn tại. Vui lòng kiểm tra lại.';
        } elseif ($subject_id <= 0 || $score < 0 || $score > 10) {
            $errorMessage = 'Vui lòng nhập ID môn học hợp lệ và điểm từ 0 đến 10.';
        } else {
            $grade = new Grade(null, $student['id'], $subject_id, $score);
            $gradeService->addGrade($grade);
            header('Location: ?controller=grade&action=index');
            exit;
        }

        include APP_ROOT . '/app/views/grade/add.php';
    }

    // Hien thi form sua diem
    public function edit($id)
    {
        if (!empty($id)) {
            $gradeService = new GradeService();
            $grade = $gradeService->getGradeById($id);

            if ($grade != null) {
                include APP_ROOT . '/app/views/grade/edit.php';
            } else {
                echo 'Không tìm thấy điểm!';
            }
        } else {
            echo 'ID điểm không hợp lệ!';
        }
    }

    // Xu ly cap nhat diem
    public function update($id)
    {
        $studentCode = trim($_POST['student_code'] ?? '');
        $subject_id = (int)($_POST['subject_id'] ?? 0);
        $scoreInput = $_POST['score'] ?? null;
        $score = is_numeric($scoreInput) ? (float)$scoreInput : -1;
        $gradeService = new GradeService();
        $student = $studentCode !== '' ? $gradeService->getStudentByCode($studentCode) : null;

        if (
            !empty($id) && $student !== null && $subject_id > 0
            && $score >= 0 && $score <= 10
        ) {
            $grade = new Grade($id, $student['id'], $subject_id, $score);
            $gradeService->updateGrade($grade);
            header('Location: ?controller=grade&action=index');
            exit;
        }

        $grade = $gradeService->getGradeById($id);
        if ($grade === null) {
            echo 'Không tìm thấy điểm!';
            return;
        }

        $errorMessage = $student === null
            ? 'Mã sinh viên không tồn tại. Vui lòng kiểm tra lại.'
            : 'Vui lòng nhập ID môn học hợp lệ và điểm từ 0 đến 10.';
        include APP_ROOT . '/app/views/grade/edit.php';
    }

    // Xoa diem
    public function delete($id)
    {
        if (!empty($id)) {
            $gradeService = new GradeService();
            $gradeService->deleteGrade($id);
        }

        header('Location: ?controller=grade&action=index');
        exit;
    }
}
