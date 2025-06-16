<?php
session_start();
require_once __DIR__ . '/../model/gamemodel.php';
require_once __DIR__ . '/../view/gameview.php';

$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;

class GameController {
    public static function execute($username) {
        $games = GameModel::findAll();
        GameView::render($games, $username);
    }
}

GameController::execute($username);
?>