<?php

require_once __DIR__ . '/dbconnect.php';
require_once __DIR__ . '/orminterface.php';

class GameModel implements ORMInterface {
    private $id;
    private $title;
    private $genre;
    private $platform;
    private $image; 
    private static $pdo;

    public function __construct($title, $genre, $platform, $image = null, $id = null) {
        $this->title = $title;
        $this->genre = $genre;
        $this->platform = $platform;
        $this->image = $image;
        $this->id = $id;
        if (!self::$pdo) {
            include __DIR__ . '/dbconnect.php';
            self::$pdo = $pdo;
        }
    }

    public function save() {
        if ($this->id) {
            $stmt = self::$pdo->prepare("UPDATE game SET title=?, genre=?, platform=?, image=? WHERE id=?");
            $stmt->execute([$this->title, $this->genre, $this->platform, $this->image, $this->id]);
        } else {
            $stmt = self::$pdo->prepare("INSERT INTO game (title, genre, platform, image) VALUES (?, ?, ?, ?)");
            $stmt->execute([$this->title, $this->genre, $this->platform, $this->image]);
            $this->id = self::$pdo->lastInsertId();
        }
    }

    public function delete() {
        if ($this->id) {
            $stmt = self::$pdo->prepare("DELETE FROM game WHERE id=?");
            $stmt->execute([$this->id]);
        }
    }

    public function getID() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function getPlatform() {
        return $this->platform;
    }

    public function getImage() {
        return $this->image;
    }

    public static function findByID($id) {
        include __DIR__ . '/dbconnect.php';
        $stmt = $pdo->prepare("SELECT * FROM game WHERE id=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if ($row) {
            return new GameModel($row['title'], $row['genre'], $row['platform'], $row['image'], $row['id']);
        }
        return null;
    }

    public static function findAll() {
        include __DIR__ . '/dbconnect.php';
        $stmt = $pdo->query("SELECT * FROM game");
        $games = [];
        while ($row = $stmt->fetch()) {
            $games[] = new GameModel($row['title'], $row['genre'], $row['platform'], $row['image'], $row['id']);
        }
        return $games;
    }
}