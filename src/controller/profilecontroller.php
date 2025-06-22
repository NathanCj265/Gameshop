<?php
session_start();

require_once __DIR__ . '/../model/usermodel.php';
require_once __DIR__ . '/../view/profileview.php';

class ProfileController {
    public static function execute() {
        if (!isset($_SESSION['username'])) {
            header("Location: /Gameshop/src/controller/logincontroller.php");
            exit;
        }
        $username = $_SESSION['username'];
        $user = UserModel::findByUsername($username);
        if (!$user) {
            die('User not found.');
        }

        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
            $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $position = filter_input(INPUT_POST, 'position', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

           
            if ($email === false) {
               
                $email = null;
            }

            
            $user->setAge($age);
            $user->setCountry($country);
            $user->setAddress($address);
            $user->setEmail($email);
            $user->setPhone($phone);
            $user->setPosition($position);
            $user->save();
            
            $user = UserModel::findByUsername($username);
        }

        ProfileView::render($user);
    }
}

ProfileController::execute();