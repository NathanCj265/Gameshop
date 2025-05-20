<?php

class ProductView {
    public static function render($products) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Products | GameShop</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <nav>
                <ul>
                    <li><a href="?page=home">Home</a></li>
                    <li><a href="?page=products">Products</a></li>
                    <li><a href="?page=games">Games</a></li>
                    <li><a href="?page=about">About Us</a></li>
                    <li><a href="?page=contact">Contact</a></li>
                    <li><a href="?page=signup">Sign Up</a></li>
                    <li><a href="?page=login">Login</a></li>
                </ul>
            </nav>
            <h1>Products</h1>
            <h2>Available Products</h2>
            <div class="product-list">
            <?php
            if ($products == null || count($products) === 0) {
                echo "<h3>No products found!</h3>";
            } else {
                foreach ($products as $product) {
                    echo '<div class="product-item">';
                    echo '<strong>' . htmlspecialchars($product->name) . '</strong><br>';
                    echo 'Price: $' . number_format($product->price, 2) . '<br>';
                    echo htmlspecialchars($product->description ?? '');
                    echo '</div>';
                }
            }
            ?>
            </div>
            <footer>
                <p>&copy; 2025 GameShop. All rights reserved.</p>
            </footer>
        </body>
        </html>
        <?php
    }
}