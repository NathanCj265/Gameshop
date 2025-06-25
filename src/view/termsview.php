<?php

class TermsView {
    public static function render($username = null) { 
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Terms & Conditions | GameShop</title>
            <link rel="stylesheet" href="/Gameshop/src/view/style.css">
        </head>
        <body>
            <nav>
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
            </nav>
            <div class="header-image">
               <a href="/Gameshop/src/controller/indexcontroller.php"><img src="/Gameshop/images/Gameshop.png" alt="GameShop Logo" class="logo"></a>
            </div>
            <main class="content terms-content">
                <h1>Terms and Conditions</h1>
                <p>Welcome to GameShop! By accessing or using our website, you agree to comply with and be bound by the following terms and conditions:</p>
                <ul>
                    <li><strong>Account Registration:</strong> You must provide accurate and complete information when creating an account. You are responsible for maintaining the confidentiality of your account credentials.</li>
                    <li><strong>Purchases:</strong> All purchases made through GameShop are subject to product availability and confirmation of the order price. We reserve the right to refuse or cancel any order at our discretion.</li>
                    <li><strong>Returns and Refunds:</strong> Please refer to our Returns Policy for information about returning products and obtaining refunds.</li>
                    <li><strong>Intellectual Property:</strong> All content on this website, including images, logos, and text, is the property of GameShop or its licensors and may not be used without permission.</li>
                    <li><strong>User Conduct:</strong> You agree not to use the website for any unlawful purpose or to violate any applicable laws or regulations.</li>
                    <li><strong>Limitation of Liability:</strong> GameShop is not liable for any indirect, incidental, or consequential damages arising from your use of the website or products purchased.</li>
                    <li><strong>Changes to Terms:</strong> We reserve the right to update these terms at any time. Continued use of the website constitutes acceptance of the new terms.</li>
                </ul>
                <p>If you have any questions about these terms, please contact our customer service team.</p>
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

