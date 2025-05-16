<?php
require 'config.php';

$page = $_GET['page'] ?? 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Shop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Gameshop</h1>
    <nav>
        <ul>
            <li><a href="?page=home">Home</a></li>
            <li><a href="?page=products">Products</a></li>
            <li><a href="?page=games">Games</a></li>
            <li><a href="?page=about">About Us</a></li>
            <li><a href="?page=contact">Contact</a></li>
        </ul>
    </nav>
</body>
</html>