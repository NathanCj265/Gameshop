<?php
require_once __DIR__ . '/../model/productmodel.php';
require_once __DIR__ . '/../view/productview.php';

class ProductController {
    public static function execute() {
        $products = ProductModel::findAll();
        ProductView::render($products);
    }
}

ProductController::execute();
?>