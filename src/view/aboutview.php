<?php

class AboutView {
    public static function render() {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>About Us | GameShop</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <nav>
                <div class="navbar-container">
                    <div class="logo-nav">
                        <a href="index.php"><img src="images/Gameshop.png" alt="GameShop Logo" class="logo"></a>
                    </div>
                    <ul>
                     <li><a href="indexview.php">Home</a></li>
                        <li><a href="productview.php">Products</a></li>
                        <li><a href="gameview.php">Games</a></li>
                        <li><a href="aboutview.php">About Us</a></li>
                        <li><a href="signupview.php">Sign Up</a></li>
                        <li><a href="loginview.php">Login</a></li>
                    </ul>
                </div>
            </nav>
            <main class="content about-content">
                <h1>About Us</h1>
                <p>
                    Welcome to <strong>GameShop</strong>! We are dedicated to providing the best gaming experience for players of all ages and backgrounds.
                </p>
                <p>
                    <strong>GameShop</strong> was founded in Rotterdam and has grown to become one of the leading gaming retailers in Europe. With many stores across the Netherlands, Germany, and Spain, we are proud to serve a vibrant and diverse gaming community.
                </p>
                <ul>
                    <li><strong>Wide Selection:</strong> We offer the latest and most popular games for PlayStation, Xbox, Nintendo Switch, and PC, as well as top-quality accessories and merchandise.</li>
                    <li><strong>Trusted Service:</strong> Our team is committed to providing fast shipping, secure payments, and excellent customer support both online and in-store.</li>
                    <li><strong>Community Focused:</strong> We regularly host gaming events, tournaments, and special promotions for our loyal customers.</li>
                    <li><strong>International Presence:</strong> With stores in Rotterdam, Amsterdam, Berlin, Hamburg, Madrid, and Barcelona, GameShop is your go-to destination for gaming in the Netherlands, Germany, and Spain.</li>
                </ul>
                <p>
                    Thank you for choosing GameShop as your gaming destination. Whether you shop online or visit us in-store, we are here to help you level up your play!
                </p>
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

AboutView::render();