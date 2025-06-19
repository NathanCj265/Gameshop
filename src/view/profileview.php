<?php

class ProfileView {
    public static function render($username) {
        // Example user data (replace with real data if available)
        $user = [
            'name' => $username,
            'role' => 'GameShop Member',
            'age' => 21,
            'country' => 'Netherlands',
            'address' => 'Rotterdam',
            'email' => 'johnny123@example.com',
            'phone' => '+31 6 12345678',
            'position' => 'Member'
        ];
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Profile | GameShop</title>
            <link rel="stylesheet" href="/Gameshop/src/view/style.css">
            <!-- Font Awesome for icons -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
                        <li><a href="/Gameshop/src/controller/profilecontroller.php" style="color:#ffd700;font-weight:bold;">Profile</a></li>
                        <li style="color:#00ff99;font-weight:bold;padding:0 10px;">You are logged in as <?= htmlspecialchars($username) ?></li>
                        <li><a href="/Gameshop/src/controller/logoutcontroller.php">Sign Out</a></li>
                    </ul>
                </div>
            </nav>
            <div class="profile-header">
                <div class="profile-pic">
                    <img src="/Gameshop/images/avatar.png" alt="Profile Picture">
                </div>
                <h1><?= htmlspecialchars($user['name']) ?></h1>
                <h2><?= htmlspecialchars($user['role']) ?></h2>
            </div>
            <div class="profile-main">
                <div class="profile-about">
                    <h3>About <span style="color:#ff4c4c;">Me</span></h3>
                    <p>
                        Hello, I'm <b><?= htmlspecialchars($user['name']) ?></b>.<br>
                        Welcome to your GameShop profile!<br>
                        Here you can view and update your personal information.<br>
                        (You can expand this section with more user info or stats.)
                    </p>
                </div>
                <div class="profile-contact">
                    <h3>Contact <span style="color:#ff4c4c;">Details</span></h3>
                    <form method="post" action="/Gameshop/src/controller/profilecontroller.php">
                        <label>Age<br>
                            <input type="number" name="age" value="<?= htmlspecialchars($user['age']) ?>" required>
                        </label><br>
                        <label>Country<br>
                            <input type="text" name="country" value="<?= htmlspecialchars($user['country']) ?>" required>
                        </label><br>
                        <label>Address<br>
                            <input type="text" name="address" value="<?= htmlspecialchars($user['address']) ?>" required>
                        </label><br>
                        <label>E-mail<br>
                            <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
                        </label><br>
                        <label>Phone<br>
                            <input type="text" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" required>
                        </label><br>
                        <label>Position<br>
                            <input type="text" name="position" value="<?= htmlspecialchars($user['position']) ?>" required>
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