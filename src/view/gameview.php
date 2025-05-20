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
            <h1>Games</h1>
            <h2>Available Games</h2>
            <div class="product-list">
            <?php
            if ($games == null || count($games) === 0) {
                echo "<h3>No games found!</h3>";
            } else {
                foreach ($games as $game) {
                    echo '<div class="product-item">';
                    echo '<strong>' . htmlspecialchars($game->name) . '</strong><br>';
                    echo 'Price: $' . number_format($game->price, 2) . '<br>';
                    echo htmlspecialchars($game->description ?? '');
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