<?php

class GameView {
    public static function render($games = null, $username = null) { 
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Games | GameShop</title>
            <link rel="stylesheet" href="/Gameshop/src/view/style.css">
        </head>
        <body>
            <nav>
                <div class="navbar-container">
                    <div class="logo-nav">
                        <a href="/Gameshop/src/controller/indexcontroller.php"><img src="/Gameshop/images/Gameshop.png" alt="GameShop Logo" class="logo"></a>
                    </div>
                    <ul>
                        <li><a href="/Gameshop/src/controller/indexcontroller.php">Home</a></li>
                        <li><a href="/Gameshop/src/controller/productcontroller.php">Products</a></li>
                        <li><a href="/Gameshop/src/controller/gamecontroller.php">Games</a></li>
                        <li><a href="/Gameshop/src/controller/aboutcontroller.php">About Us</a></li>
                        <?php if (empty($username)): ?>
                            <li><a href="/Gameshop/src/controller/signupcontroller.php">Sign Up</a></li>
                            <li><a href="/Gameshop/src/controller/logincontroller.php">Login</a></li>
                        <?php else: ?>
                            <li style="color:#00ff99;font-weight:bold;padding:0 10px;">You are logged in as <?= htmlspecialchars($username) ?></li>
                            <li><a href="/Gameshop/src/controller/logoutcontroller.php">Sign Out</a></li>
                            <li style="float:right;"><a href="/Gameshop/src/controller/profilecontroller.php" style="color:#ffd700;font-weight:bold;">Profile</a></li>
                        <?php endif; ?>
                        <li class="cart-nav">
                            <a href="#" id="cart-toggle" style="font-weight:bold;">
                                🛒 Cart <span id="cart-count" style="color:#ffd700;">0</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Cart dropdown (hidden by default, shown on click) -->
            <div id="cart" class="cart cart-dropdown" style="display:none;">
                <h2>Cart</h2>
                <ul id="cart-items"></ul>
            </div>
            <main class="content games-content">
                <h1>Games</h1>
                <h2>Available Games</h2>
                <div class="game-list">
                <?php
                if ($games) {
                    foreach ($games as $game) {
                        echo '<div class="game-card">';
                        echo '<img src="/Gameshop/images/games/' . htmlspecialchars($game->getImage()) . '" alt="' . htmlspecialchars($game->getTitle()) . '" class="game-img">';
                        echo '<div class="game-title">' . htmlspecialchars($game->getTitle()) . '</div>';
                        echo '<div class="game-meta">Platform: ' . htmlspecialchars($game->getPlatform()) . '</div>';
                        echo '<div class="game-meta">Genre: ' . htmlspecialchars($game->getGenre()) . '</div>';
                        echo '<button class="buy-btn" onclick="addToCart(\'' . htmlspecialchars($game->getTitle()) . '\')">Buy</button>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No games found.</p>';
                }
                ?>
                </div>
            </main>
            <footer>
                <div class="footer-links">
                    <a href="/Gameshop/src/controller/privacycontroller.php">Privacy</a> | 
                    <a href="/Gameshop/src/controller/termscontroller.php">Terms</a>
                </div>
                <p>&copy; 2025 GameShop. All rights reserved.</p>
            </footer>
            <script src="/Gameshop/src/view/cart.js"></script>
        </body>
        </html>
        <?php
    }
}


