<?php

class TermsView {
    public static function render() {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Terms & Conditions | GameShop</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="productview.php">Products</a></li>
                    <li><a href="gameview.php">Games</a></li>
                    <li><a href="aboutview.php">About Us</a></li>
                    <li><a href="privacy.php">Privacy</a></li>
                    <li><a href="terms.php">Terms</a></li>
                    <li><a href="signupview.php">Sign Up</a></li>
                    <li><a href="loginview.php">Login</a></li>
                </ul>
            </nav>
            <div class="header-image">
                <img src="images/Gameshop.png" alt="GameShop Logo" class="logo">
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
                <p>&copy; 2025 GameShop. All rights reserved.</p>
            </footer>
        </body>
        </html>
        <?php
    }
}

TermsView::render();