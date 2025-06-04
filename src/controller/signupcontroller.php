<?php
require_once __DIR__ . '/../model/usermodel.php';
require_once __DIR__ . '/../view/signupview.php';

class SignupController {
    public static function execute() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $user = new UserModel($username, $email, $password_hash);
            $user->save();

          
            UserModel::setSession($username);

            
            header('Location: ../view/index.php');
            exit;
        } else {
            SignupView::render();
        }
    }
}

SignupController::execute();