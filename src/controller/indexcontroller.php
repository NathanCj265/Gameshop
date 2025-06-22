<?php
session_start();

require_once __DIR__ . '/../model/productmodel.php';
require_once __DIR__ . '/../model/gamemodel.php';
require_once __DIR__ . '/../view/indexview.php';

class IndexController {
    public static function execute() {
        $featuredProducts = ProductModel::findAll();
        $featuredGames = GameModel::findAll();
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
        HomeView::render($featuredProducts, $featuredGames, $username);
    }
}

IndexController::execute();


