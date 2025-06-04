<?php

class ProductView {
    public static function render($products = null) {
       
        $products = [
            [
                'name' => "DualSense Wireless Controller",
                'price' => 69.99,
                'stock' => 25,
                'description' => "The latest PlayStation 5 controller with haptic feedback.",
                'image' => "images/products/dualsense.jpg"
            ],
            [
                'name' => "Xbox Series X Console",
                'price' => 499.99,
                'stock' => 10,
                'description' => "The fastest, most powerful Xbox ever.",
                'image' => "images/products/xboxseriesx.jpg"
            ],
            [
                'name' => "Nintendo Switch OLED",
                'price' => 349.99,
                'stock' => 15,
                'description' => "Nintendo Switch with a vibrant OLED display.",
                'image' => "images/products/switcholed.jpg"
            ],
            [
                'name' => "Steam Gift Card $50",
                'price' => 50.00,
                'stock' => 100,
                'description' => "Add funds to your Steam Wallet to buy games and more.",
                'image' => "images/products/steamgiftcard.jpg"
            ],
            [
                'name' => "PlayStation Plus 12 Month Membership",
                'price' => 59.99,
                'stock' => 40,
                'description' => "Access online multiplayer and free monthly games on PS5/PS4.",
                'image' => "images/products/psplus.jpg"
            ],
        ];
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
                foreach ($products as $product) {
                    echo '<div class="product-card">';
                    echo '<img src="' . htmlspecialchars($product['image']) . '" alt="' . htmlspecialchars($product['name']) . '" class="product-img">';
                    echo '<div class="product-title">' . htmlspecialchars($product['name']) . '</div>';
                    echo '<div class="product-price">Price: $' . number_format($product['price'], 2) . '</div>';
                    echo '<div class="product-meta">Stock: ' . htmlspecialchars($product['stock']) . '</div>';
                    echo '<div class="product-description">' . htmlspecialchars($product['description'] ?? 'No description.') . '</div>';
                    echo '</div>';
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

ProductView::render();