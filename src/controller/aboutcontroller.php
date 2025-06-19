<?php
session_start();
require_once __DIR__ . '/../view/aboutview.php';

$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
AboutView::render($username);

class AboutController {
    public static function execute() {
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
        AboutView::render($username);
    }
}