<?php
require_once __DIR__ . '/../model/usermodel.php';
require_once __DIR__ . '/../model/productmodel.php';
require_once __DIR__ . '/../model/gamemodel.php';
require_once __DIR__ . '/../view/adminview.php';

class AdminController {
    public static function execute() {
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: /Gameshop/src/controller/logincontroller.php");
            exit;
        }

        $user = UserModel::findByUsername($_SESSION['username']);
        if (!$user || $user->getRole() !== 'admin') {
         
            header("Location: /Gameshop/src/controller/indexcontroller.php");
            exit;
        }

        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $type = $_POST['type'] ?? '';
            $id = (int)($_POST['id'] ?? 0);
            $stock = (int)($_POST['stock'] ?? 0);

            if ($type === 'product') {
                $product = ProductModel::findByID($id);
                if ($product) {
                    $product->setStock($stock);
                    $product->save();
                }
            } elseif ($type === 'game') {
                $game = GameModel::findByID($id);
                if ($game) {
                    $game->setStock($stock);
                    $game->save();
                }
            }
        
            header("Location: /Gameshop/src/controller/admincontroller.php");
            exit;
        }

        
        $products = ProductModel::findAll();
        $games = GameModel::findAll();

        
        AdminView::render($user->getUsername(), $products, $games);
    }
}

AdminController::execute();