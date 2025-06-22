<?php
require_once __DIR__ . '/dbconnect.php';
require_once __DIR__ . '/orminterface.php';

class UserModel implements ORMInterface {
    private $id;
    private $username;
    private $email;
    private $password_hash;
    private $role;
    private $age;
    private $country;
    private $address;
    private $phone;
    private $position;
    private static $pdo;

    public function __construct($username, $email = null, $password_hash = null, $id = null, $role = null, $age = null, $country = null, $address = null, $phone = null, $position = null) {
        $this->username = $username;
        $this->email = $email;
        $this->password_hash = $password_hash;
        $this->id = $id;
        // Ensure role is never null, default to 'Member'
        $this->role = $role ?? 'Member';
        $this->age = $age;
        $this->country = $country;
        $this->address = $address;
        $this->phone = $phone;
        $this->position = $position;
        if (!self::$pdo) {
            include __DIR__ . '/dbconnect.php';
            self::$pdo = $pdo;
        }
    }

    // Save new user or update existing
    public function save() {
        if ($this->id) {
            $stmt = self::$pdo->prepare("UPDATE users SET username=?, email=?, password_hash=?, role=?, age=?, country=?, address=?, phone=?, position=? WHERE id=?");
            $stmt->execute([
                $this->username, $this->email, $this->password_hash, $this->role,
                $this->age, $this->country, $this->address, $this->phone, $this->position, $this->id
            ]);
        } else {
            // Check for duplicate username before insert
            $checkStmt = self::$pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
            $checkStmt->execute([$this->username]);
            if ($checkStmt->fetchColumn() > 0) {
                throw new Exception("Username already exists.");
            }
            // Ensure role is never null, default to 'Member'
            $role = $this->role ?? 'Member';
            $stmt = self::$pdo->prepare("INSERT INTO users (username, email, password_hash, role, age, country, address, phone, position) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $this->username, $this->email, $this->password_hash, $role,
                $this->age, $this->country, $this->address, $this->phone, $this->position
            ]);
            $this->id = self::$pdo->lastInsertId();
        }
    }

    public function delete() {
        if ($this->id) {
            $stmt = self::$pdo->prepare("DELETE FROM users WHERE id=?");
            $stmt->execute([$this->id]);
        }
    }

    public function getID() { return $this->id; }
    public function getUsername() { return $this->username; }
    public function getEmail() { return $this->email; }
    public function getRole() { return $this->role; }
    public function getAge() { return $this->age; }
    public function getCountry() { return $this->country; }
    public function getAddress() { return $this->address; }
    public function getPhone() { return $this->phone; }
    public function getPosition() { return $this->position; }
    public function setAge($age) { $this->age = $age; }
    public function setCountry($country) { $this->country = $country; }
    public function setAddress($address) { $this->address = $address; }
    public function setEmail($email) { $this->email = $email; }
    public function setPhone($phone) { $this->phone = $phone; }
    public function setPosition($position) { $this->position = $position; }

    public static function findByID($id) {
        include __DIR__ . '/dbconnect.php';
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if ($row) {
            return new UserModel(
                $row['username'], $row['email'], $row['password_hash'], $row['id'],
                $row['role'] ?? 'Member', $row['age'] ?? null, $row['country'] ?? null,
                $row['address'] ?? null, $row['phone'] ?? null, $row['position'] ?? null
            );
        }
        return null;
    }

    public static function findAll() {
        include __DIR__ . '/dbconnect.php';
        $stmt = $pdo->query("SELECT * FROM users");
        $users = [];
        while ($row = $stmt->fetch()) {
            $users[] = new UserModel(
                $row['username'], $row['email'], $row['password_hash'], $row['id'],
                $row['role'] ?? 'Member', $row['age'] ?? null, $row['country'] ?? null,
                $row['address'] ?? null, $row['phone'] ?? null, $row['position'] ?? null
            );
        }
        return $users;
    }

    public static function findByUsername($username) {
        include __DIR__ . '/dbconnect.php';
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username=?");
        $stmt->execute([$username]);
        $row = $stmt->fetch();
        if ($row) {
            return new UserModel(
                $row['username'], $row['email'], $row['password_hash'], $row['id'],
                $row['role'] ?? 'Member', $row['age'] ?? null, $row['country'] ?? null,
                $row['address'] ?? null, $row['phone'] ?? null, $row['position'] ?? null
            );
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