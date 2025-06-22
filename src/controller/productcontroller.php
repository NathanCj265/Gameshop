<?php
session_start();

require_once __DIR__ . '/../model/productmodel.php';
require_once __DIR__ . '/../view/productview.php';

class ProductController {
    public static function execute() {
        if (!isset($_SESSION['username'])) {
            header("Location: /Gameshop/src/controller/logincontroller.php");
            exit;
        }
        $username = $_SESSION['username'];
        $products = ProductModel::findAll();
        ProductView::render($products, $username);
    }
}

ProductController::execute();
?>