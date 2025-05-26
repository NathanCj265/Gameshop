<?php

class TermsView {
    public static function render() {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Terms & Conditions | GameShop</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="productview.php">Products</a></li>
                    <li><a href="gameview.php">Games</a></li>
                    <li><a href="aboutview.php">About Us</a></li>
                    <li><a href="privacy.php">Privacy</a></li>
                    <li><a href="terms.php">Terms</a></li>
                    <li><a href="signupview.php">Sign Up</a></li>
                    <li><a href="loginview.php">Login</a></li>
                </ul>
            </nav>
            <div class="header-image">
                <img src="images/Gameshop.png" alt="GameShop Logo" class="logo">
            </div>
            <main class="content terms-content">
                <h1>Terms and Conditions</h1>
                <p>By using our website, you agree to the following terms and conditions...</p>
            </main>
            <footer>
                <p>&copy; 2025 GameShop. All rights reserved.</p>
            </footer>
        </body>
        </html>
        <?php
    }
}

TermsView::render();