<?php
require_once __DIR__ . '/../models/user.php';
require_once __DIR__ . '/../views/loginview.php';

class UserController {
    public static function execute() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if (UserModel::authenticate($username, $password)) {
                echo "<h2>Login successful! Welcome, $username.</h2>";
            } else {
                loginview::render("Invalid username or password.");
            }
        } else {
            loginview::render();
        }
    }
}

UserController::execute();