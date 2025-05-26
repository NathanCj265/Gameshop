<?php
require_once __DIR__ . '/dbconnect.php';
require_once __DIR__ . '/orminterface.php';

class SignupModel implements ORMInterface {
    private $id;
    private $username;
    private $password_hash;
    private static $pdo;

    public function __construct($username, $password_hash, $id = null) {
        $this->username = $username;
        $this->password_hash = $password_hash;
        $this->id = $id;
        if (!self::$pdo) {
            include __DIR__ . '/dbconnect.php';
            self::$pdo = $pdo;
        }
    }

    public function save() {
        if ($this->id) {
            $stmt = self::$pdo->prepare("UPDATE users SET username=?, password_hash=? WHERE id=?");
            $stmt->execute([$this->username, $this->password_hash, $this->id]);
        } else {
            $stmt = self::$pdo->prepare("INSERT INTO users (username, password_hash) VALUES (?, ?)");
            $stmt->execute([$this->username, $this->password_hash]);
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
            return new SignupModel($row['username'], $row['password_hash'], $row['id']);
        }
        return null;
    }

    public static function findAll() {
        include __DIR__ . '/dbconnect.php';
        $stmt = $pdo->query("SELECT * FROM users");
        $users = [];
        while ($row = $stmt->fetch()) {
            $users[] = new SignupModel($row['username'], $row['password_hash'], $row['id']);
        }
        return $users;
    }
}