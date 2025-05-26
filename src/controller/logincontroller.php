<?php
require_once __DIR__ . '/../model/loginmodel.php';
require_once __DIR__ . '/../view/loginview.php';

class LoginController {
    public static function execute() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = LoginModel::authenticate($username, $password);
            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user->getID();
                $_SESSION['username'] = $username;
                echo "<h2>Login successful! Welcome, $username.</h2>";
            } else {
                LoginView::render("Invalid username or password.");
            }
        } else {
            LoginView::render();
        }
    }
}

LoginController::execute();
?>