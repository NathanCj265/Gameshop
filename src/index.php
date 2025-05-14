<?php
require 'config.php';

$page = $_GET['page'] ?? 'home';

if ($page === 'products') {
    include_once __DIR__ . "/controllers/ProductController.php";
} elseif ($page === 'login') {
    include_once __DIR__ . "/controllers/UserController.php";
} else {
    echo "<h1>Welcome to the Game Shop!</h1>";
}
?>