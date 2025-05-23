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
                <div class="navbar-container">
                    <div class="logo-nav">
                        <a href="index.php"><img src="images/Gameshop.png" alt="GameShop Logo" class="logo"></a>
                    </div>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="productview.php">Products</a></li>
                        <li><a href="gameview.php">Games</a></li>
                        <li><a href="aboutview.php">About Us</a></li>
                        <li><a href="signupview.php">Sign Up</a></li>
                        <li><a href="loginview.php">Login</a></li>
                    </ul>
                </div>
            </nav>
            <div class="header-image">
                <img src="images/Gameshop.png" alt="GameShop Logo" class="logo">
            </div>
            <main class="content products-content">
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
            </main>
            <footer>
                <div class="footer-links">
                    <a href="privacy.php">Privacy</a> | 
                    <a href="terms.php">Terms</a>
                </div>
                <p>&copy; 2025 GameShop. All rights reserved.</p>
            </footer>
        </body>
        </html>
        <?php
    }
}

ProductView::render([]);