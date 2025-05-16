<?php


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
    <p>Please log in to access your account.</p>
    
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <button type="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="register.php">Register here</a>.</p>

<footer>
    <p>&copy; 2025 GameShop. All rights reserved.</p>
    <p><a href="privacy.php">Privacy Policy</a></p>
    <p><a href="terms.php">Terms of Service</a></p>
    <p><a href="contact.php">Contact Us</a></p>
</footer>
</body>
</html>