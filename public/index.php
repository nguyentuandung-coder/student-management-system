<?php

require_once('../app/config/config.php');
require_once APP_ROOT . '/app/libs/DBConnection.php';
require_once APP_ROOT . '/app/controllers/HomeController.php';
require_once APP_ROOT . '/app/controllers/SubjectController.php';
require_once APP_ROOT . '/app/controllers/GradeController.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : null;

$homeController = new HomeController();
$subjectController = new SubjectController();

$gradeController = new GradeController();

if ($controller == 'home') {
    $homeController->index();
} else if ($controller == 'subject' && $action == 'index') {
    $subjectController->index();
} else if ($controller == 'addSubject' || ($controller == 'subject' && $action == 'add')) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_POST['btn_create'])) {
        $subjectController->store();
    } else {
        $subjectController->add();
    }
} else if ($controller == 'editSubject' || ($controller == 'subject' && $action == 'edit')) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_POST['btn_update'])) {
        $subjectController->update($id);
    } else {
        $subjectController->edit($id);
    }
} else if ($controller == 'updateSubject') {
    $subjectController->update($id);
} else if ($controller == 'deleteSubject' || ($controller == 'subject' && $action == 'delete')) {
    $subjectController->delete($id);
}
// Hien thi danh sach diem
else if ($controller == 'grade' && $action == 'index') {
    $gradeController->index();

    // Hien thi form them diem
} else if ($controller == 'addGrade' || ($controller == 'grade' && $action == 'add')) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_POST['btn_create'])) {
        $gradeController->store();
    } else {
        $gradeController->add();
    }

    // Sua diem
} else if ($controller == 'editGrade' || ($controller == 'grade' && $action == 'edit')) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_POST['btn_update'])) {
        $gradeController->update($id);
    } else {
        $gradeController->edit($id);
    }

    // Cap nhat diem
} else if ($controller == 'updateGrade' || ($controller == 'grade' && $action == 'update')) {
    $gradeController->update($id);

    // Xoa diem
} else if ($controller == 'deleteGrade' || ($controller == 'grade' && $action == 'delete')) {
    $gradeController->delete($id);
} else {
    $homeController->index();
}
