<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class HomeView {
    public static function render($featuredProducts = [], $featuredGames = [], $username = null) {
        // Shuffle and limit featured products
        if ($featuredProducts && count($featuredProducts) > 0) {
            shuffle($featuredProducts);
            $featuredProducts = array_slice($featuredProducts, 0, 4); // Show up to 4 random products
        }
        // Shuffle and limit featured games
        if ($featuredGames && count($featuredGames) > 0) {
            shuffle($featuredGames);
            $featuredGames = array_slice($featuredGames, 0, 4); // Show up to 4 random games
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Home | GameShop</title>
        <link rel="stylesheet" href="/Gameshop/src/view/style.css">
        </head>
        <body>
            <nav>
                <div class="navbar-container">
                    <div class="logo-nav">
                       <a href="/Gameshop/index.php"><img src="/Gameshop/images/Gameshop.png" alt="GameShop Logo" class="logo"></a>
                    </div>
                    <ul>
                        <li><a href="/Gameshop/src/controller/indexcontroller.php">Home</a></li>
                        <li><a href="/Gameshop/src/controller/productcontroller.php">Products</a></li>
                        <li><a href="/Gameshop/src/controller/gamecontroller.php">Games</a></li>
                        <li><a href="/Gameshop/src/controller/aboutcontroller.php">About Us</a></li>
                        <?php if (empty($username)): ?>
                        <li><a href="/Gameshop/src/controller/signupcontroller.php">Sign Up</a></li>
                        <li><a href="/Gameshop/src/controller/logincontroller.php">Login</a></li>
                        <?php else: ?>
                       <li style="color:#00ff99;font-weight:bold;padding:0 10px;">You are logged in as <?= htmlspecialchars($username) ?></li>
                      <li><a href="/Gameshop/src/controller/logoutcontroller.php">Sign Out</a></li>
                    <?php endif; ?>
                    </ul>
                </div>
            </nav>
            <main class="content home-content">
                <h1>GameShop</h1>
                <h2>Your Gaming Paradise!</h2>
                <p>Welcome to GameShop, your one-stop shop for all your gaming needs!</p>
                <p>Explore our wide range of products and games.</p>

                <h2>Featured Products</h2>
                <div class="product-list" style="display:flex;gap:24px;flex-wrap:wrap;">
                <?php
                if (empty($featuredProducts)) {
                    echo "<h3>No featured products found!</h3>";
                } else {
                    foreach ($featuredProducts as $product) {
                        echo '<div class="product-item" style="background:#23284a;padding:18px;border-radius:12px;box-shadow:0 2px 8px #0002;width:260px;color:#fff;">';
                        if (!empty($product->image)) {
                            echo '<img src="' . htmlspecialchars($product->image) . '" alt="' . htmlspecialchars($product->name) . '" style="width:100%;height:140px;object-fit:cover;border-radius:8px 8px 0 0;margin-bottom:10px;">';
                        }
                        echo '<strong style="font-size:1.1em;color:#ffd700;">' . htmlspecialchars($product->name) . '</strong><br>';
                        if (isset($product->category)) {
                            echo '<span style="color:#aaa;">Category: ' . htmlspecialchars($product->category) . '</span><br>';
                        }
                        echo '<span style="color:#00ff99;font-weight:bold;">Price: $' . number_format($product->price, 2) . '</span><br>';
                        echo '<span style="font-size:0.95em;">' . htmlspecialchars($product->description ?? '') . '</span>';
                        echo '</div>';
                    }
                }
                ?>
                </div>

                <h2 style="margin-top:40px;">Featured Games</h2>
                <div class="product-list" style="display:flex;gap:24px;flex-wrap:wrap;">
                <?php
                if (empty($featuredGames)) {
                    echo "<h3>No featured games found!</h3>";
                } else {
                    foreach ($featuredGames as $game) {
                        echo '<div class="product-item" style="background:#23284a;padding:18px;border-radius:12px;box-shadow:0 2px 8px #0002;width:260px;color:#fff;">';
                        if (!empty($game->image)) {
                            echo '<img src="' . htmlspecialchars($game->image) . '" alt="' . htmlspecialchars($game->name) . '" style="width:100%;height:140px;object-fit:cover;border-radius:8px 8px 0 0;margin-bottom:10px;">';
                        }
                        echo '<strong style="font-size:1.1em;color:#ffd700;">' . htmlspecialchars($game->name) . '</strong><br>';
                        if (isset($game->platform)) {
                            echo '<span style="color:#aaa;">Platform: ' . htmlspecialchars($game->platform) . '</span><br>';
                        }
                        if (isset($game->genre)) {
                            echo '<span style="color:#aaa;">Genre: ' . htmlspecialchars($game->genre) . '</span><br>';
                        }
                        if (isset($game->price)) {
                            echo '<span style="color:#00ff99;font-weight:bold;">Price: $' . number_format($game->price, 2) . '</span><br>';
                        }
                        echo '<span style="font-size:0.95em;">' . htmlspecialchars($game->description ?? '') . '</span>';
                        echo '</div>';
                    }
                }
                ?>
                </div>
            </main>
            <footer>
                <div class="footer-links">
                    <a href="privacy.php">Privacy</a> | 
                    <a href="terms.php">Terms</a>
                </div>
                <p>&copy; 2025 GameShop. All rights reserved.</p>
            </footer>
        </body>
        </html>
        <?php
    }
}

// Example usage with sample data:
$featuredProducts = [
    (object)[
        'name' => 'Xbox Wireless Controller',
        'image' => '/Gameshop/images/xbox-controller.jpg',
        'category' => 'Accessories',
        'price' => 59.99,
        'description' => 'Experience the modernized design of the Xbox Wireless Controller.'
    ],
    (object)[
        'name' => 'PlayStation 5 Console',
        'image' => '/Gameshop/images/ps5.jpg',
        'category' => 'Consoles',
        'price' => 499.99,
        'description' => 'The PS5 console unleashes new gaming possibilities you never anticipated.'
    ],
    (object)[
        'name' => 'Nintendo Switch',
        'image' => '/Gameshop/images/switch.jpg',
        'category' => 'Consoles',
        'price' => 299.99,
        'description' => 'Nintendo Switch is designed to fit your life, transforming from home console to portable system in a snap.'
    ],
    (object)[
        'name' => 'Logitech G502 Mouse',
        'image' => '/Gameshop/images/g502.jpg',
        'category' => 'Accessories',
        'price' => 49.99,
        'description' => 'High performance gaming mouse with customizable weights and lighting.'
    ]
];

$featuredGames = [
    (object)[
        'name' => "Marvel's Spider-Man 2",
        'image' => '/Gameshop/images/spiderman2.jpg',
        'platform' => 'PS5',
        'genre' => 'Action-Adventure',
        'price' => 59.99,
        'description' => 'Swing, jump and utilize the new Web Wings to travel across Marvel’s New York.'
    ],
    (object)[
        'name' => 'God of War: Ragnarok',
        'image' => '/Gameshop/images/gowragnarok.jpg',
        'platform' => 'PS5',
        'genre' => 'Action',
        'price' => 59.99,
        'description' => 'Embark on an epic and heartfelt journey as Kratos and Atreus struggle with holding on and letting go.'
    ],
    (object)[
        'name' => 'The Legend of Zelda: Tears of the Kingdom',
        'image' => '/Gameshop/images/zelda-totk.jpg',
        'platform' => 'Nintendo Switch',
        'genre' => 'Adventure',
        'price' => 59.99,
        'description' => 'An epic adventure across the land and skies of Hyrule awaits in The Legend of Zelda: Tears of the Kingdom.'
    ],
    (object)[
        'name' => 'Forza Horizon 5',
        'image' => '/Gameshop/images/forza5.jpg',
        'platform' => 'Xbox',
        'genre' => 'Racing',
        'price' => 59.99,
        'description' => 'Your Ultimate Horizon Adventure awaits! Explore the vibrant and ever-evolving open world landscapes of Mexico.'
    ]
];
