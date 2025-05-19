<?php

class UserModel {
    private static $pdo;

    public static function initializeDatabase() {
      
        
    }

    public static function authenticate($username, $password) {
        self::initializeDatabase();
        $stmt = self::$pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $stmt->execute([
            ':username' => $username,
            ':password' => $password
        ]);
        return $stmt->fetch() !== false;
    }
}