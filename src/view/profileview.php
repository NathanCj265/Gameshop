<?php

class ProfileView {
    public static function render($username) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Profile | GameShop</title>
            <link rel="stylesheet" href="/Gameshop/src/view/style.css">
        </head>
        <body>
            <nav>
                <div class="navbar-container">
                    <div class="logo-nav">
                        <a href="/Gameshop/index.php"><img src="/Gameshop/images/Gameshop.png" alt="GameShop Logo" class="logo"></a>
                    </div>
                    <ul>
                        <li><a href="/Gameshop/src/controller/indexcontroller.php">Home</a></li>
                        <li><a href="/Gameshop/src/controller/productcontroller.php">Products</a></li>
                        <li><a href="/Gameshop/src/controller/gamecontroller.php">Games</a></li>
                        <li><a href="/Gameshop/src/controller/aboutcontroller.php">About Us</a></li>
                        <li style="float:right;"><a href="/Gameshop/src/controller/profilecontroller.php" style="color:#ffd700;font-weight:bold;">Profile</a></li>
                        <li style="color:#00ff99;font-weight:bold;padding:0 10px;">You are logged in as <?= htmlspecialchars($username) ?></li>
                        <li><a href="/Gameshop/src/controller/logoutcontroller.php">Sign Out</a></li>
                    </ul>
                </div>
            </nav>
            <main class="content">
                <h1>Profile Page</h1>
                <p>Welcome, <strong><?= htmlspecialchars($username) ?></strong>!</p>
                <p>This is your profile page. (Add more user info here if you want!)</p>
            </main>
        </body>
        </html>
        <?php
    }
}