<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /Gameshop/src/controller/logincontroller.php");
    exit;
}
require_once __DIR__ . '/../model/productmodel.php';
require_once __DIR__ . '/../view/productview.php';

class ProductController {
    public static function execute() {
        $username = $_SESSION['username'];

        $products = ProductModel::findAll();
        ProductView::render($products, $username);
    }
}

ProductController::execute();
?>