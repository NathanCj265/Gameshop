<?php
require_once __DIR__ . '/../model/usermodel.php';
require_once __DIR__ . '/../view/loginview.php';

class LoginController {
    public static function execute() {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = $_POST['password'] ?? '';

            if (UserModel::authenticate($username, $password)) {
                $_SESSION['username'] = $username;
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

