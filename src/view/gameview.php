<?php

class GameView {
    public static function render($games) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Games</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <h1>Games</h1>
            <nav>
                <ul>
                    <li><a href="?page=home">Home</a></li>
                    <li><a href="?page=products">Products</a></li>
                    <li><a href="?page=games">Games</a></li>
                    <li><a href="?page=about">About Us</a></li>
                    <li><a href="?page=contact">Contact</a></li>
                </ul>
            </nav>

            <h2>Available Games</h2>
            <?php
            if ($games == null || count($games) === 0) {
                echo "<h3>No games found!</h3>";
            } else {
                echo "<ul>";
                foreach ($games as $game) {
                    echo "<li>" . htmlspecialchars($game->name) . " - $" . number_format($game->price, 2) . "</li>";
                }
                echo "</ul>";
            }
            ?>

            <footer>
                <p>&copy; 2025 GameShop. All rights reserved.</p>
                <p><a href="privacy.php">Privacy Policy</a></p>
                <p><a href="terms.php">Terms of Service</a></p>
                <p><a href="contact.php">Contact Us</a></p>
            </footer>
        </body>
        </html>
        <?php
    }
}