<?php
require_once APP_ROOT . '/app/services/StudentService.php';
require_once APP_ROOT . '/app/services/SubjectService.php';
require_once APP_ROOT . '/app/services/GradeService.php';

class HomeController {
    public function index() {
        $studentService = new StudentService();
        $subjectService = new SubjectService();
        $gradeService = new GradeService();

        $students = $studentService->getAllStudents();
        $subjects = $subjectService->getAllSubjects();
        $grades = $gradeService->getAllGrades();

        $totalScore = 0;
        foreach ($grades as $grade) {
            $totalScore += (float)$grade->getScore();
        }
        $averageScore = count($grades) > 0 ? $totalScore / count($grades) : null;

        include APP_ROOT . '/app/views/home/index.php';
    }
}
