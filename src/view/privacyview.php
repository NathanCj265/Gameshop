<?php
require_once __DIR__ . '/BaseView.php';
class PrivacyView  extends BaseView {
    public static function render($username = null) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Privacy Policy | GameShop</title>
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
                    <li class="cart-nav" style="position:relative;">
    
    <a href="#" id="cart-toggle" style="font-weight:bold;">
        
        Cart <span id="cart-count" style="color:#ffd700;">0</span>
    </a>
    
    <div id="cart" class="cart cart-dropdown">
        <h2>Cart</h2>
        <ul id="cart-items"></ul>
    </div>
</li>
                    </ul>
                </div>
            </nav>
            <div class="header-image">
                <img src="/Gameshop/images/Gameshop.png" alt="GameShop Logo" class="logo">
            </div>
            <main class="content privacy-content">
                <h1>Privacy Policy</h1>
                <p>Your privacy is important to us. This policy explains how GameShop collects, uses, and protects your personal information:</p>
                <ul>
                    <li><strong>Information Collection:</strong> We collect information you provide when creating an account, placing an order, or contacting customer service. This may include your name, email address, shipping address, and payment details.</li>
                    <li><strong>Use of Information:</strong> Your information is used to process orders, provide customer support, and improve our services. We may also use your email to send updates or promotional offers (you can opt out at any time).</li>
                    <li><strong>Cookies:</strong> Our website uses cookies to enhance your browsing experience and analyze site traffic. You can disable cookies in your browser settings.</li>
                    <li><strong>Data Security:</strong> We implement security measures to protect your personal data from unauthorized access, alteration, or disclosure.</li>
                    <li><strong>Third Parties:</strong> We do not sell or share your personal information with third parties except as necessary to fulfill your order or comply with legal obligations.</li>
                    <li><strong>Access and Control:</strong> You can access, update, or delete your personal information by logging into your account or contacting us directly.</li>
                    <li><strong>Policy Updates:</strong> We may update this privacy policy from time to time. Changes will be posted on this page.</li>
                </ul>
                <p>If you have any questions about our privacy practices, please contact us at privacy@gameshop.com.</p>
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

