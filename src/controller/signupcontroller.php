<?php
require_once __DIR__ . '/../model/signup.model.php';
require_once __DIR__ . '/../view/signupview.php';

class SignupController {
    public static function execute() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $user = new SignupModel($username, $password_hash);
            $user->save();

            echo "<h2>Signup successful! You can now log in.</h2>";
        } else {
            SignupView::render();
        }
    }
}

SignupController::execute();