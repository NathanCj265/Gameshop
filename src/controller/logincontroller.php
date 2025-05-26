<?php
require_once __DIR__ . '/../model/loginmodel.php';
require_once __DIR__ . '/../view/loginview.php';

class LoginController {
    public static function execute() {
        session_start();
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $password = $_POST['password'] ?? '';

            $user = LoginModel::findByUsername($username);
            if ($user && $user->verifyPassword($password)) {
                $_SESSION['user_id'] = $user->getID();
                $_SESSION['username'] = $username;
                header("Location: index.php");
                exit;
            } else {
                LoginView::render("Invalid username or password.");
            }
        } else {
            LoginView::render();
        }
    }
}

LoginController::execute();