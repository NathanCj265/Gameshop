<?php
require_once __DIR__ . '/BaseView.php';
class ProductView  extends BaseView {
    public static function render($products = null, $username = null) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Products | GameShop</title>
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
                        <li style="float:right;position:relative;" class="cart-container">
                           
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
           
            <main class="content products-content">
                <h1>Products</h1>
                <div class="product-list">
                <?php
                if ($products) {
                    foreach ($products as $product) {
                        echo '<div class="product-card">';
                        echo '<img src="/Gameshop/images/products/' . htmlspecialchars($product->getImage()) . '" alt="' . htmlspecialchars($product->getName()) . '" class="product-img">';
                        echo '<div class="product-title">' . htmlspecialchars($product->getName()) . '</div>';
                        echo '<div class="product-meta">Price: &euro;' . htmlspecialchars($product->getPrice()) . '</div>';
                        echo '<div class="product-meta">Stock: ' . htmlspecialchars($product->getStock()) . '</div>';
                        echo '<div class="product-description">' . htmlspecialchars($product->getDescription()) . '</div>'; // <-- Add this line
                        echo '<button class="buy-btn" onclick="addToCart(\'' . htmlspecialchars($product->getName()) . '\')">Buy</button>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No products found.</p>';
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

