<?php
$dsn = 'mysql:host=localhost;dbname=game_shop';
$username = 'root'; // Replace with your MySQL username
$password = ''; // Replace with your MySQL password
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}