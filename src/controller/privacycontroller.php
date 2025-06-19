<?php


class PrivacyController {
    public static function execute() {
        session_start();
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : null;

        require_once __DIR__ . '/../view/privacyview.php';
        PrivacyView::render($username);
    }
}
PrivacyController::execute();
?>