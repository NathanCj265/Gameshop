<?php
class LogoutController {
    public static function execute() {
        session_start();
        session_destroy();
        header("Location: /Gameshop/src/controller/indexcontroller.php");
        exit;
    }
}
LogoutController::execute();    
?>
