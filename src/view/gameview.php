<?php

class GameView {
    public static function render($games) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Games | GameShop</title>
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
            <main class="content games-content">
                <h1>Games</h1>
                <h2>Available Games</h2>
                <div class="game-list">
                <?php
                if ($games == null || count($games) === 0) {
                    echo "<h3>No games found!</h3>";
                } else {
                    foreach ($games as $game) {
                        echo '<div class="game-card">';
                        // Placeholder image, replace src with your actual image path later
                        echo '<img src="images/game-placeholder.png" alt="Game Image" class="game-img">';
                        echo '<div class="game-title">' . htmlspecialchars($game->title) . '</div>';
                        echo '<div class="game-meta">Platform: ' . htmlspecialchars($game->platform) . '</div>';
                        echo '<div class="game-meta">Genre: ' . htmlspecialchars($game->genre) . '</div>';
                        // Placeholder for price and description
                        echo '<div class="game-price">Price: $59.99</div>';
                        echo '<div class="game-description">Game description goes here.</div>';
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

GameView::render($games ?? []);