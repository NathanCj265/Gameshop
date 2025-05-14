<?php

class UserModel {
    private static $pdo;

    public static function initializeDatabase() {
        include __DIR__ . '/../config.php'; // Ensure $pdo is defined in config.php
        self::$pdo = $pdo;
    }

    public static function authenticate($username, $password) {
        self::initializeDatabase();
        $stmt = self::$pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $stmt->execute([
            ':username' => $username,
            ':password' => $password // In a real app, use password hashing
        ]);
        return $stmt->fetch() !== false;
    }
}