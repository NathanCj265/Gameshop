<?php

class ProfileView {
    
    public static function render($user) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Profile | GameShop</title>
            <link rel="stylesheet" href="/Gameshop/src/view/style.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
                        <li style="float:right;"><a href="/Gameshop/src/controller/profilecontroller.php" style="color:#ffd700;font-weight:bold;">Profile</a></li>
                        <li style="color:#00ff99;font-weight:bold;padding:0 10px;">You are logged in as <?= htmlspecialchars($user->getUsername()) ?></li>
                        <li><a href="/Gameshop/src/controller/logoutcontroller.php">Sign Out</a></li>
                    </ul>
                </div>
            </nav>
            <div class="profile-header">
                <div class="profile-pic">
                    <img src="/Gameshop/images/avatar.png" alt="Profile Picture">
                </div>
                <h1><?= htmlspecialchars($user->getUsername()) ?></h1>
                <h2><?= htmlspecialchars($user->getRole()) ?></h2>
            </div>
            <div class="profile-main">
                <div class="profile-about">
                    <h3>About <span style="color:#ff4c4c;">Me</span></h3>
                    <p>
                        Hello, I'm <b><?= htmlspecialchars($user->getUsername()) ?></b>.<br>
                        Welcome to your GameShop profile!<br>
                        Here you can view and update your personal information.<br>
                    </p>
                </div>
                <div class="profile-contact">
                    <h3>Contact <span style="color:#ff4c4c;">Details</span></h3>
                    <form method="post" action="/Gameshop/src/controller/profilecontroller.php">
                        <label>Age<br>
                            <input type="number" name="age" value="<?= htmlspecialchars($user->getAge()) ?>" required>
                        </label><br>
                        <label>Country<br>
                            <input type="text" name="country" value="<?= htmlspecialchars($user->getCountry()) ?>" required>
                        </label><br>
                        <label>Address<br>
                            <input type="text" name="address" value="<?= htmlspecialchars($user->getAddress()) ?>" required>
                        </label><br>
                        <label>E-mail<br>
                            <input type="email" name="email" value="<?= htmlspecialchars($user->getEmail()) ?>" required>
                        </label><br>
                        <label>Phone<br>
                            <input type="text" name="phone" value="<?= htmlspecialchars($user->getPhone()) ?>" required>
                        </label><br>
                        <label>Position<br>
                            <input type="text" name="position" value="<?= htmlspecialchars($user->getPosition()) ?>" required>
                        </label><br><br>
                        <button type="submit" class="profile-save-btn">Save Changes</button>
                    </form>
                </div>
            </div>
            <div class="profile-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-github"></i></a>
            </div>
        </body>
        </html>
        <?php
    }
}