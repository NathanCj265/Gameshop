<?php
require_once __DIR__ . '/../model/productmodel.php';
require_once __DIR__ . '/../view/productview.php';

class ProductController {
    public static function execute() {
        session_start();
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : null;

        $products = ProductModel::findAll();
        ProductView::render($products, $username);
    }
}

ProductController::execute();
?>