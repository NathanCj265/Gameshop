<?php
require_once __DIR__ . '/BaseView.php';
class AdminView extends BaseView  {
    public static function render($username, $products, $games) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Admin Panel</title>
            <link rel="stylesheet" href="/Gameshop/src/view/style.css">
        </head>
        <body>
            <h1 class="glow-title" style="text-align:center;margin-top:30px;">Admin Panel</h1>
            <a href="/Gameshop/src/controller/indexcontroller.php" class="back-home-btn">← Back to Homepage</a>
            <p>Welcome, <?= htmlspecialchars($username) ?>! You have admin access.</p>

            <h2>Manage Products</h2>
            <table class="admin-panel-table">
                <tr>
                    <th>Name</th>
                    <th>Stock</th>
                    <th>Update Stock</th>
                </tr>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= htmlspecialchars($product->getName()) ?></td>
                    <td><?= (int)$product->getStock() ?></td>
                    <td>
                        <form method="post" action="/Gameshop/src/controller/admincontroller.php">
                            <input type="hidden" name="type" value="product">
                            <input type="hidden" name="id" value="<?= (int)$product->getID() ?>">
                            <input type="number" name="stock" value="<?= (int)$product->getStock() ?>" min="0">
                            <button type="submit">Update</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>

            <h2>Manage Games</h2>
            <table class="admin-panel-table">
                <tr>
                    <th>Title</th>
                    <th>Stock</th>
                    <th>Update Stock</th>
                </tr>
                <?php foreach ($games as $game): ?>
                <tr>
                    <td><?= htmlspecialchars($game->getTitle()) ?></td>
                    <td><?= (int)$game->getStock() ?></td>
                    <td>
                        <form method="post" action="/Gameshop/src/controller/admincontroller.php">
                            <input type="hidden" name="type" value="game">
                            <input type="hidden" name="id" value="<?= (int)$game->getID() ?>">
                            <input type="number" name="stock" value="<?= (int)$game->getStock() ?>" min="0">
                            <button type="submit">Update</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </body>
        </html>
        <?php
    }
}

