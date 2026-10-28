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
        include_once APP_ROOT . '/app/views/grade/add.php';
    }

    // Xu ly them diem
    public function store()
    {
        $student_id = (int)($_POST['student_id'] ?? 0);
        $subject_id = (int)($_POST['subject_id'] ?? 0);
        $score = (float)($_POST['score'] ?? -1);

        if ($student_id > 0 && $subject_id > 0 && $score >= 0 && $score <= 10) {
            $grade = new Grade(null, $student_id, $subject_id, $score);

            $gradeService = new GradeService();
            $gradeService->addGrade($grade);
        }

        header('Location: ?controller=grade&action=index');
        exit;
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
        $student_id = (int)($_POST['student_id'] ?? 0);
        $subject_id = (int)($_POST['subject_id'] ?? 0);
        $score = (float)($_POST['score'] ?? -1);

        if (
            !empty($id) && $student_id > 0 && $subject_id > 0
            && $score >= 0 && $score <= 10
        ) {

            $grade = new Grade($id, $student_id, $subject_id, $score);

            $gradeService = new GradeService();
            $gradeService->updateGrade($grade);
        }

        header('Location: ?controller=grade&action=index');
        exit;
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
