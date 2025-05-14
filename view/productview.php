<?php


class ProductView {
    public static function render($products) {
        echo "<!DOCTYPE html>";
        echo "<html lang='en'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<title>Product List</title>";
        echo "<link rel='stylesheet' href='../styles/style.css'>"; // Link to CSS file
        echo "</head>";
        echo "<body>";
        echo "<h1>Product List</h1>";
        echo "<ul class='product-list'>";
        foreach ($products as $product) {
            echo "<li class='product-item'>";
            echo "<strong>{$product['name']}</strong> - \${$product['price']}";
            echo "</li>";
        }
        echo "</ul>";
        echo "</body>";
        echo "</html>";
    }
}