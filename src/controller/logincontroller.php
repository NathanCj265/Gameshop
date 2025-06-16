<?php
require_once __DIR__ . '/../model/usermodel.php';
require_once __DIR__ . '/../view/loginview.php';

class LoginController {
    public static function execute() {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            if (UserModel::authenticate($username, $password)) {
                // After successful login
                $_SESSION['username'] = $username; // Store username in session
                header("Location: /Gameshop/src/controller/indexcontroller.php");
                exit;
            } else {
                $error = "Invalid username or password.";
            }
        }
        LoginView::render($error);
    }
}

LoginController::execute();

