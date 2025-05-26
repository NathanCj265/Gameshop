<?php
require_once __DIR__ . '/../model/gamemodel.php';
require_once __DIR__ . '/../view/gameview.php';

class GameController {
    public static function execute() {
        $games = GameModel::findAll();
        GameView::render($games);
    }
}

GameController::execute();
?>