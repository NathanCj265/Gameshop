<?php

include_once __DIR__ . "/dbConnect.php";

class GameModel {
    private $id;
    public $name;
    public $price;
    public $description;

    function __construct() {
        $this->name = "";
        $this->price = 0.00;
        $this->description = "";
        $this->id = null;
    }

    
    public static function initializeDatabase() {
        global $pdo;
        $pdo->prepare(
            "CREATE TABLE IF NOT EXISTS games (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                price DECIMAL(10,2) NOT NULL,
                description TEXT
            );"
        )->execute();
    }

    public function getID() {
        return $this->id;
    }

    public function setID($id) {
        $this->id = $id;
    }
 
    public static function getAllGames() {
   
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM games ORDER BY name ASC");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $games = [];
        foreach ($data as $row) {
            $game = new GameModel();
            $game->setID($row['id']);
            $game->name = $row['name'];
            $game->price = $row['price'];
            $game->description = $row['description'];
            $games[] = $game;
        }
        return $games;
    }
}