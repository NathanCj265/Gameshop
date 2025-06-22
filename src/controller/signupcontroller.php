<?php
require_once __DIR__ . '/../model/usermodel.php';
require_once __DIR__ . '/../view/signupview.php';

class SignupController {
    public static function execute() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize and validate input
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = $_POST['password'] ?? '';

            // Basic validation
            if (!$email || !$username || strlen($password) < 6) {
                SignupView::render("Invalid input. Please check your details.");
                return;
            }

            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $user = new UserModel($username, $email, $password_hash);
            $user->save();

            UserModel::setSession($username);

            header('Location: /Gameshop/src/controller/indexcontroller.php');
            exit;
        } else {
            SignupView::render();
        }
    }
}

SignupController::execute();