<?php
require_once __DIR__ . '/dbconnect.php';
require_once __DIR__ . '/orminterface.php';
class UserModel implements ORMInterface {
    private $id;
    private $username;
    private $email;
    private $password_hash;
    private static $pdo;

    public function __construct($username, $email = null, $password_hash = null, $id = null) {
        $this->username = $username;
        $this->email = $email;
        $this->password_hash = $password_hash;
        $this->id = $id;
        if (!self::$pdo) {
            include __DIR__ . '/dbconnect.php';
            self::$pdo = $pdo;
        }
    }

    // Save new user or update existing
    public function save() {
        if ($this->id) {
            $stmt = self::$pdo->prepare("UPDATE users SET username=?, email=?, password_hash=? WHERE id=?");
            $stmt->execute([$this->username, $this->email, $this->password_hash, $this->id]);
        } else {
            $stmt = self::$pdo->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
            $stmt->execute([$this->username, $this->email, $this->password_hash]);
            $this->id = self::$pdo->lastInsertId();
        }
    }

    public function delete() {
        if ($this->id) {
            $stmt = self::$pdo->prepare("DELETE FROM users WHERE id=?");
            $stmt->execute([$this->id]);
        }
    }

    public function getID() {
        return $this->id;
    }

    public static function findByID($id) {
        include __DIR__ . '/dbconnect.php';
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if ($row) {
            return new UserModel($row['username'], $row['email'], $row['password_hash'], $row['id']);
        }
        return null;
    }

    public static function findAll() {
        include __DIR__ . '/dbconnect.php';
        $stmt = $pdo->query("SELECT * FROM users");
        $users = [];
        while ($row = $stmt->fetch()) {
            $users[] = new UserModel($row['username'], $row['email'], $row['password_hash'], $row['id']);
        }
        return $users;
    }
    public static function findByUsername($username) {
        include __DIR__ . '/dbconnect.php';
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username=?");
        $stmt->execute([$username]);
        $row = $stmt->fetch();
        if ($row) {
            return new UserModel($row['username'], $row['email'], $row['password_hash'], $row['id']);
        }
        return null;
    }

    // Login: Authenticate user and set session
    public static function authenticate($username, $password) {
        include __DIR__ . '/dbconnect.php';
        session_start();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            return true;
        }
        return false;
    }

    // Signup: Set session after registration
    public static function setSession($username) {
        include __DIR__ . '/dbconnect.php';
        session_start();
        $stmt = $pdo->prepare("SELECT id, username FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();
        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
        }
    }
}