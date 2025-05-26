<?php

require_once __DIR__ . '/dbconnect.php';
require_once __DIR__ . '/orminterface.php';

class GameModel implements ORMInterface {
    private $id;
    private $title;
    private $genre;
    private $platform;
    private static $pdo;

    public function __construct($title, $genre, $platform, $id = null) {
        $this->title = $title;
        $this->genre = $genre;
        $this->platform = $platform;
        $this->id = $id;
        if (!self::$pdo) {
            include __DIR__ . '/dbconnect.php';
            self::$pdo = $pdo;
        }
    }

    public function save() {
        if ($this->id) {
            $stmt = self::$pdo->prepare("UPDATE games SET title=?, genre=?, platform=? WHERE id=?");
            $stmt->execute([$this->title, $this->genre, $this->platform, $this->id]);
        } else {
            $stmt = self::$pdo->prepare("INSERT INTO game (title, genre, platform) VALUES (?, ?, ?)");
            $stmt->execute([$this->title, $this->genre, $this->platform]);
            $this->id = self::$pdo->lastInsertId();
        }
    }

    public function delete() {
        if ($this->id) {
            $stmt = self::$pdo->prepare("DELETE FROM games WHERE id=?");
            $stmt->execute([$this->id]);
        }
    }

    public function getID() {
        return $this->id;
    }

    public static function findByID($id) {
        include __DIR__ . '/dbconnect.php';
        $stmt = $pdo->prepare("SELECT * FROM games WHERE id=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if ($row) {
            return new GameModel($row['title'], $row['genre'], $row['platform'], $row['id']);
        }
        return null;
    }

    public static function findAll() {
        include __DIR__ . '/dbconnect.php';
        $stmt = $pdo->query("SELECT * FROM games");
        $games = [];
        while ($row = $stmt->fetch()) {
            $games[] = new GameModel($row['title'], $row['genre'], $row['platform'], $row['id']);
        }
        return $games;
    }
}