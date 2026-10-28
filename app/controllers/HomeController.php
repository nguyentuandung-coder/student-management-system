<?php
require_once APP_ROOT . '/app/services/SubjectService.php';

class HomeController {
    public function index() {
        $subjectService = new SubjectService();
        $subjects = $subjectService->getAllSubjects();
        include APP_ROOT . '/app/views/home/index.php';
    }
}
