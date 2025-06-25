<?php
require_once __DIR__ . '/BaseView.php';
class AboutView  extends BaseView {
    public static function render($username = null) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>About Us | GameShop</title>
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
                            <?php
                            require_once __DIR__ . '/../model/usermodel.php';
                            $user = isset($username) ? UserModel::findByUsername($username) : null;
                            if ($user && $user->getRole() === 'admin') {
                                echo '<li style="float:right;"><a href="/Gameshop/src/controller/admincontroller.php" style="color:#00ff00;font-weight:bold;">Admin Panel</a></li>';
                            }
                            ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
            <main class="content about-content">
                <!-- Your nice welcoming comments and content -->
                <h1>Welcome to GameShop!</h1>
                <h2>Your Gaming Paradise!</h2>
                <p>
                    Welcome to <strong>GameShop</strong>, your one-stop shop for all your gaming needs!<br>
                    Explore our wide range of products and games.
                </p>
                <hr>
                <h2>About Us</h2>
                <p>
                    At <strong>GameShop</strong>, we are passionate gamers and tech enthusiasts dedicated to bringing you the best in gaming hardware, software, and accessories.
                </p>
                <p>
                    Our mission is to provide a one-stop shop for all your gaming needs, with a wide selection of products, competitive prices, and outstanding customer service.
                </p>
                <ul>
                    <li><strong>Wide Selection:</strong> The latest and most popular games for PlayStation, Xbox, Nintendo Switch, and PC, plus top-quality accessories and merchandise.</li>
                    <li><strong>Trusted Service:</strong> Fast shipping, secure payments, and excellent customer support both online and in-store.</li>
                    <li><strong>Community Focused:</strong> We regularly host gaming events, tournaments, and special promotions for our loyal customers.</li>
                    <li><strong>International Presence:</strong> With stores in Rotterdam, Amsterdam, Berlin, Hamburg, Madrid, and Barcelona, GameShop is your go-to destination for gaming in the Netherlands, Germany, and Spain.</li>
                </ul>
                <p>
                    Thank you for choosing GameShop as your gaming destination. Whether you shop online or visit us in-store, we are here to help you level up your play!
                </p>
            </main>
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

