<?php
require_once __DIR__ . '/../model/product.php';
require_once __DIR__ . '/../view/productview.php';

class ProductController {
    public static function execute() {
        ProductModel::initializeDatabase();
        $allProducts = ProductModel::getAllProducts();
        productview::render($allProducts);
    }
}

ProductController::execute();
?>