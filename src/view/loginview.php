<?php

require_once __DIR__ . '/BaseView.php';
class LoginView  extends BaseView {
    public static function render($error = null) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login | GameShop</title>
           <link rel="stylesheet" href="/Gameshop/src/view/style.css">
        </head>
        <body class="login-hero-bg">
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
                        <li><a href="/Gameshop/src/controller/signupcontroller.php">Sign Up</a></li>
                        <li><a href="/Gameshop/src/controller/logincontroller.php">Login</a></li>
                    </ul>
                </div>
            </nav>
            <div class="login-card-split">
                <div class="login-left" style="background: url('images/games/your-featured-game.jpg') center center/cover no-repeat;">
                    <div class="login-left-content">
                        <h2>GameShop</h2>
                        <p>YOU WANT MOST GAMES IN HERE<br>
                        <span style="font-size:0.95em;">Discover the latest and greatest games, all in one place.</span>
                        </p>
                        <button class="view-more-btn" onclick="window.location.href='indexcontroller.php'">VIEW MORE</button>
                    </div>
                </div>
                <div class="login-right">
                    <h3>Sign in to the site</h3>
                    <?php
                    if ($error) {
                        echo "<p style='color:red; text-align:center;'>$error</p>";
                    }
                    ?>
                    <form class="login-form" action="../controller/logincontroller.php" method="post">
                        <input type="text" id="username" name="username" placeholder="Username" required>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <button type="submit">LOGIN</button>
                        <div class="form-extra-link">
                            Don't have an account? <a href="signupcontroller.php">Register here</a>
                        </div>
                    </form>
                </div>
            </div>
            <footer>
                <div class="footer-links">
              <a href="/Gameshop/src/controller/privacycontroller.php">Privacy</a> | 
                    <a href="/Gameshop/src/controller/termscontroller.php">Terms</a>
                </div>
                <p>&copy; 2025 GameShop. All rights reserved.</p>
            </footer>
        </body>
        </html>
        <?php
    }
}

