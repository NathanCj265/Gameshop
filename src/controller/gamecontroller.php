<?php
session_start();

require_once __DIR__ . '/../model/gamemodel.php';
require_once __DIR__ . '/../view/gameview.php';

class GameController {
    public static function execute() {
        if (!isset($_SESSION['username'])) {
            header("Location: /Gameshop/src/controller/logincontroller.php");
            exit;
        }
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
        $games = GameModel::findAll();
        GameView::render($games, $username);
    }
}

GameController::execute();
?>