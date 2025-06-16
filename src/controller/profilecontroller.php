<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /Gameshop/src/controller/logincontroller.php");
    exit;
}
require_once __DIR__ . '/../view/profileview.php';

$username = $_SESSION['username'];
ProfileView::render($username);