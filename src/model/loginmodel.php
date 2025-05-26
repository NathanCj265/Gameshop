<?php
require_once 'ORMinterface.php';

class LoginModel implements ORMinterface {
    private $id;
    private $username;
    private $email;
    private $passwordHash;

    public function __construct($username, $email, $passwordHash, $id = null) {
        $this->username = $username;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        $this->id = $id;
    }

    public function save() {
        $pdo = self::getPDO();
        if ($this->id) {
            $stmt = $pdo->prepare("UPDATE users SET username=?, email=?, password=? WHERE id=?");
            $stmt->execute([$this->username, $this->email, $this->passwordHash, $this->id]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$this->username, $this->email, $this->passwordHash]);
            $this->id = $pdo->lastInsertId();
        }
    }

    public function delete() {
        if (!$this->id) return;
        $pdo = self::getPDO();
        $stmt = $pdo->prepare("DELETE FROM users WHERE id=?");
        $stmt->execute([$this->id]);
    }

    public function getID() {
        return $this->id;
    }

    public static function findByID($id) {
        $pdo = self::getPDO();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if ($row) {
            return new self($row['username'], $row['email'], $row['password'], $row['id']);
        }
        return null;
    }

    public static function findAll() {
        $pdo = self::getPDO();
        $stmt = $pdo->query("SELECT * FROM users");
        $users = [];
        while ($row = $stmt->fetch()) {
            $users[] = new self($row['username'], $row['email'], $row['password'], $row['id']);
        }
        return $users;
    }

    public static function findByUsername($username) {
        $pdo = self::getPDO();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username=?");
        $stmt->execute([$username]);
        $row = $stmt->fetch();
        if ($row) {
            return new self($row['username'], $row['email'], $row['password'], $row['id']);
        }
        return null;
    }

    public function verifyPassword($password) {
        return password_verify($password, $this->passwordHash);
    }

    private static function getPDO() {
        // Adjust DSN, username, password as needed
        return new PDO('mysql:host=localhost;dbname=gameshop;charset=utf8', 'root', '');
    }
}