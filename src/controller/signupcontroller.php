<?php
require_once __DIR__ . '/../model/usermodel.php';
require_once __DIR__ . '/../view/signupview.php';

class SignupController {
    public static function execute() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $user = new UserModel($username, $password_hash);
            $user->save();

            // Set session after signup
            UserModel::setSession($username);

            // Redirect to homepage
            header('Location: ../controller/homecontroller.php');
            exit;
        } else {
            SignupView::render();
        }
    }
}

SignupController::execute();