<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class HomeView {
    public static function render($featuredProducts = [], $featuredGames = [], $username = null) {
        // Shuffle and limit to 4 products/games
        if ($featuredProducts && count($featuredProducts) > 0) {
            shuffle($featuredProducts);
            $featuredProducts = array_slice($featuredProducts, 0, 4);
        }
        if ($featuredGames && count($featuredGames) > 0) {
            shuffle($featuredGames);
            $featuredGames = array_slice($featuredGames, 0, 4);
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Home | GameShop</title>
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
   // Show Admin Panel link only for admins
   require_once __DIR__ . '/../model/usermodel.php';
   $user = UserModel::findByUsername($username);
   if ($user && $user->getRole() === 'admin') {
       echo '<li style="float:right;"><a href="/Gameshop/src/controller/admincontroller.php" style="color:#00ff00;font-weight:bold;">Admin Panel</a></li>';
   }
   ?>
<?php endif; ?>
                        <li class="cart-nav" style="position:relative;">
                            <a href="#" id="cart-toggle" style="font-weight:bold;">
                                🛒 Cart <span id="cart-count" style="color:#ffd700;">0</span>
                            </a>
                            <div id="cart" class="cart cart-dropdown">
                                <h2>Cart</h2>
                                <ul id="cart-items"></ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content home-content">
                <h1>GameShop</h1>
                <h2>Your Gaming Paradise!</h2>
                <p>Welcome to GameShop, your one-stop shop for all your gaming needs!</p>
                <p>Explore our wide range of products and games.</p>

                <h2 class="glow-title">Featured Products</h2>
                <div class="product-list" style="display:flex;gap:24px;flex-wrap:wrap;">
                <?php
                if (empty($featuredProducts)) {
                    echo "<h3>No featured products found!</h3>";
                } else {
                    foreach ($featuredProducts as $product) {
                        echo '<div class="glow-card">';
                        echo '<img src="/Gameshop/images/products/' . htmlspecialchars($product->getImage()) . '" alt="' . htmlspecialchars($product->getName()) . '" style="width:100%;height:140px;object-fit:cover;border-radius:8px 8px 0 0;margin-bottom:10px;">';
                        echo '<strong style="font-size:1.1em;color:#ffd700;">' . htmlspecialchars($product->getName()) . '</strong><br>';
                        echo '<span style="color:#00ff99;font-weight:bold;">Price: $' . number_format($product->getPrice(), 2) . '</span><br>';
                        echo '<span style="color:#3be8b0;font-size:1em;">Stock: ' . (int)$product->getStock() . '</span><br>';
                        // Add description here
                        echo '<div class="product-description" style="color:#00ff99;font-size:0.95em;margin:8px 0;min-height:40px;">' . htmlspecialchars($product->getDescription()) . '</div>';
                        echo '<br><button class="buy-btn" onclick="addToCart(\'' . htmlspecialchars($product->getName()) . '\')">Buy</button>';
                        echo '</div>';
                    }
                }
                ?>
                </div>

                <h2 class="glow-title" style="margin-top:40px;">Featured Games</h2>
                <div class="product-list" style="display:flex;gap:24px;flex-wrap:wrap;">
                <?php
                if (empty($featuredGames)) {
                    echo "<h3>No featured games found!</h3>";
                } else {
                    foreach ($featuredGames as $game) {
                        echo '<div class="glow-card">';
                        echo '<img src="/Gameshop/images/games/' . htmlspecialchars($game->getImage()) . '" alt="' . htmlspecialchars($game->getTitle()) . '" style="width:100%;height:140px;object-fit:cover;border-radius:8px 8px 0 0;margin-bottom:10px;">';
                        echo '<strong style="font-size:1.1em;color:#ffd700;">' . htmlspecialchars($game->getTitle()) . '</strong><br>';
                        echo '<span style="color:#3be8b0;">Platform: ' . htmlspecialchars($game->getPlatform()) . '</span><br>';
                        echo '<span style="color:#3be8b0;">Genre: ' . htmlspecialchars($game->getGenre()) . '</span><br>';
                        echo '<span style="color:#00ff99;font-weight:bold;">Price: €' . number_format($game->getPrice(), 2) . '</span><br>';
                        echo '<span style="color:#3be8b0;font-size:1em;">Stock: ' . (int)$game->getStock() . '</span><br>';
                        echo '<br><button class="buy-btn" onclick="addToCart(\'' . htmlspecialchars($game->getTitle()) . '\')">Buy</button>';
                        echo '</div>';
                    }
                }
                ?>
                </div>
            </main>
            <footer>
                <div class="footer-links">
                  <a href="/Gameshop/src/controller/privacycontroller.php">Privacy</a> | 
                    <a href="/Gameshop/src/controller/termscontroller.php">Terms</a>
                </div>
                <p>&copy; 2025 GameShop. All rights reserved.</p>
            </footer>
            <script src="/Gameshop/src/view/cart.js"></script>
        </body>
        </html>
        <?php
    }
}

