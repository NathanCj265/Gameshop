<?php


class TermsController {
    public static function execute() {
        session_start();
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : null;

        require_once __DIR__ . '/../view/termsview.php';
        TermsView::render($username);
    }
}
TermsController::execute();

 ?>