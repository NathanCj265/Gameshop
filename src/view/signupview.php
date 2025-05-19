<?php

class signupview{
    public static function render($error = null) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Welcome to GameShop!</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <h1>Welcome to GameShop!</h1>
            <p>Please sign up to create an account.</p>
            <?php
            if ($error) {
                echo "<p style='color:red;'>$error</p>";
            }
            ?>
            <form action="signup.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                
                <button type="submit">Sign Up</button>
            </form>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
            <footer>
                <p>&copy; 2025 GameShop. All rights reserved.</p>
                <p><a href="privacy.php">Privacy Policy</a></p>
                <p><a href="terms.php">Terms of Service</a></p>
                <p><a href="contact.php">Contact Us</a></p>
            </footer>
        </body>
        </html>
        <?php
    }   






}