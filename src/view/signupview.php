<?php
require_once __DIR__ . '/BaseView.php';

class SignupView extends BaseView {
    public static function render($error = null) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Sign Up | GameShop</title>
            <link rel="stylesheet" href="/Gameshop/src/view/style.css">
        </head>
        <body class="signup-hero-bg">
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
    <li style="float:right;"><a href="/Gameshop/src/controller/profilecontroller.php" style="color:#ffd700;font-weight:bold;">Profile</a></li>
</ul>
                </div>
            </nav>
            <div class="signup-card-split">
                <div class="signup-left">
                    <div class="signup-left-content">
                        <h2>GameShop</h2>
                        <p>JOIN THE GAMESHOP COMMUNITY!<br>
                        <span style="font-size:0.95em;">Discover the latest and greatest games, all in one place.</span>
                        </p>
                    </div>
                </div>
                <div class="signup-right">
                    <h3 style="color:#232946; font-size:2em; margin-bottom:24px; text-align:center;">Create Account</h3>
                    <?php if ($error) { echo "<p class='signup-error'>$error</p>"; } ?>
                    <form class="signup-form" action="../controller/signupcontroller.php" method="post">
                        <input type="email" id="email" name="email" placeholder="Enter Email" required>
                        <input type="text" id="username" name="username" placeholder="Enter Username" required>
                        <input type="password" id="password" name="password" placeholder="Enter Password" required>
                        <button type="submit" class="signup-btn-main">SIGN UP</button>
                        <a href="logincontroller.php" class="signup-btn-alt">Already have an account? Log In</a>
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

