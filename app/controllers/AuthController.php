<?php
require_once APP_ROOT . '/app/services/UserService.php';

class AuthController {
    private $userService;

    public function __construct() {
        $this->userService = new UserService();
    }

    public function register() {
        $activeTab = 'register';
        $error = null;
        $success = null;
        $old = [];

        include APP_ROOT . '/app/views/auth/auth.php';
    }

    public function processRegister() {
        $activeTab = 'register';
        $error = null;
        $success = null;

        $fullname = trim($_POST['fullname'] ?? '');
        $studentCode = trim($_POST['student_code'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $className = trim($_POST['class_name'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';
        $agreeTerms = isset($_POST['agree_terms']);

        $old = [
            'fullname' => $fullname,
            'student_code' => $studentCode,
            'email' => $email,
            'class_name' => $className
        ];

        $result = $this->userService->register(
            $studentCode,
            $fullname,
            $email,
            $password,
            $confirmPassword,
            $className,
            $agreeTerms
        );

        if ($result['success']) {
            $success = $result['message'];
            $old = [];
        } else {
            $error = $result['message'];
        }

        include APP_ROOT . '/app/views/auth/auth.php';
    }

    public function login() {
        $activeTab = 'login';
        $error = null;
        $success = null;
        $old = [];

        include APP_ROOT . '/app/views/auth/auth.php';
    }

    public function processLogin() {
        $activeTab = 'login';
        $error = null;
        $success = null;

        $identifier = trim($_POST['identifier'] ?? '');
        $password = $_POST['password'] ?? '';
        $remember = isset($_POST['remember']);

        $old = [
            'identifier' => $identifier
        ];

        $result = $this->userService->login($identifier, $password);

        if ($result['success']) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['user_id'] = $result['user']->getId();
            $_SESSION['user_name'] = $result['user']->getFullname();
            $_SESSION['user_role'] = $result['user']->getRole();
            $_SESSION['user_code'] = $result['user']->getStudentCode();

            header('Location: ?controller=home');
            exit;
        } else {
            $error = $result['message'];
            include APP_ROOT . '/app/views/auth/auth.php';
        }
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header('Location: ?controller=auth&action=register');
        exit;
    }
}
