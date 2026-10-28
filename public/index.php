<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../app/config/config.php';
require_once APP_ROOT . '/app/libs/DbConnection.php';
require_once APP_ROOT . '/app/controllers/HomeController.php';
require_once APP_ROOT . '/app/controllers/SubjectController.php';
require_once APP_ROOT . '/app/controllers/GradeController.php';
require_once APP_ROOT . '/app/controllers/AuthController.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : null;

$homeController = new HomeController();
$subjectController = new SubjectController();
$gradeController = new GradeController();
$authController = new AuthController();

// Kiem tra trang thai dang nhap
$isLoggedIn = isset($_SESSION['user_id']);

// Neu nguoi dung chua dang nhap -> Chi cho phep cac chuc nang xac thuc (login, register, auth)
if (!$isLoggedIn) {
    if ($controller === 'auth') {
        if ($action === 'register') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $authController->processRegister();
            } else {
                $authController->register();
            }
        } else if ($action === 'login') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $authController->processLogin();
            } else {
                $authController->login();
            }
        } else {
            $authController->login();
        }
    } else if ($controller === 'register') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->processRegister();
        } else {
            $authController->register();
        }
    } else if ($controller === 'login') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->processLogin();
        } else {
            $authController->login();
        }
    } else {
        // Khi bam vao web (hoac chua dang nhap) -> Hien luon form dang nhap
        $authController->login();
    }
    exit;
}

// Khi nguoi dung da dang nhap:
// Neu co truy cap lai trang login/register -> Chuyen huong ve trang chu
if ($controller === 'login' || $controller === 'register' || ($controller === 'auth' && $action !== 'logout')) {
    header('Location: ?controller=home');
    exit;
}

// Cac tuyen duong cho nguoi dung da dang nhap
if ($controller === 'logout' || ($controller === 'auth' && $action === 'logout')) {
    $authController->logout();
} 
// Trang chu
else if ($controller === 'home' || empty($controller)) {
    $homeController->index();
} 
// Quan ly mon hoc
else if ($controller === 'addSubject' || ($controller === 'subject' && $action === 'add')) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_POST['btn_create'])) {
        $subjectController->store();
    } else {
        $subjectController->add();
    }
} else if ($controller === 'editSubject' || ($controller === 'subject' && $action === 'edit')) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_POST['btn_update'])) {
        $subjectController->update($id);
    } else {
        $subjectController->edit($id);
    }
} else if ($controller === 'updateSubject') {
    $subjectController->update($id);
} else if ($controller === 'deleteSubject' || ($controller === 'subject' && $action === 'delete')) {
    $subjectController->delete($id);
}
// Hien thi danh sach diem
else if ($controller === 'grade' && $action === 'index') {
    $gradeController->index();
} else if ($controller === 'addGrade' || ($controller === 'grade' && $action === 'add')) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_POST['btn_create'])) {
        $gradeController->store();
    } else {
        $gradeController->add();
    }
} else if ($controller === 'editGrade' || ($controller === 'grade' && $action === 'edit')) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' || isset($_POST['btn_update'])) {
        $gradeController->update($id);
    } else {
        $gradeController->edit($id);
    }
} else if ($controller === 'updateGrade' || ($controller === 'grade' && $action === 'update')) {
    $gradeController->update($id);
} else if ($controller === 'deleteGrade' || ($controller === 'grade' && $action === 'delete')) {
    $gradeController->delete($id);
} else {
    $homeController->index();
}
