<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


class HomeView {
    public static function render($featuredProducts = []) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Home | GameShop</title>
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
            <main class="content home-content">
                <h1>GameShop</h1>
                <h2>Your Gaming Paradise!</h2>
                <p>Welcome to GameShop, your one-stop shop for all your gaming needs!</p>
                <p>Explore our wide range of products and games.</p>
                <h2>Featured Products</h2>
                <div class="product-list">
                <?php
                if ($featuredProducts == null || count($featuredProducts) === 0) {
                    echo "<h3>No featured products found!</h3>";
                } else {
                    foreach ($featuredProducts as $product) {
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

// For testing, call with an empty array
HomeView::render([]);