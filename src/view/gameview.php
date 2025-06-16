<?php

class GameView {
    public static function render($games = null, $username = null) { // <-- add $username
      
        $games = [
            [
                'title' => "Marvel’s Spider-Man 2",
                'platform' => "PS5",
                'genre' => "Action-Adventure",
                'image' => "/Gameshop/images/games/Spiderman2.jpg"
            ],
            [   
                'title' => "God of War: Ragnarok",
                'platform' => "PS5",
                'genre' => "Action",
                'image' => "/Gameshop/images/games/GodofWar.jpg"
            ],
            [
                'title' => "The Legend of Zelda: Tears of the Kingdom",
                'platform' => "Nintendo Switch",
                'genre' => "Adventure",
                'image' => "/Gameshop/images/games/Zelda.jpg"
            ],
            [
                'title' => "Forza Horizon 5",
                'platform' => "Xbox",
                'genre' => "Racing",
                'image' => "/Gameshop/images/games/Forzahorizon5.jpg"
            ],
            [
                'title' => "Elden Ring",
                'platform' => "Steam",
                'genre' => "RPG",
                'image' => "/Gameshop/images/games/Eldenring.jpg"
            ],
            [
                'title' => "Cyberpunk 2077",
                'platform' => "Steam",
                'genre' => "RPG",
                'image' => "/Gameshop/images/games/Cyberpunk2077.jpg"
            ],
            [
                'title' => "Counter-Strike 2",
                'platform' => "Steam",
                'genre' => "Shooter",
                'image' => "/Gameshop/images/games/Counterstrike2.jpg"
            ],
            [
                'title' => "Animal Crossing: New Horizons",
                'platform' => "Nintendo Switch",
                'genre' => "Simulation",
                'image' => "/Gameshop/images/games/Animalcrossing.jpg"
            ],
            [
                'title' => "Halo Infinite",
                'platform' => "Xbox",
                'genre' => "Shooter",
                'image' => "/Gameshop/images/games/Haloinfinite.jpg"
            ],
            [
                'title' => "Starfield",
                'platform' => "Xbox",
                'genre' => "RPG",
                'image' => "/Gameshop/images/games/Starfield.jpg"
            ],
            [
                'title' => "Super Mario Odyssey",
                'platform' => "Nintendo Switch",
                'genre' => "Platformer",
                'image' => "/Gameshop/images/games/SuperMario.jpg"
            ],
        ];
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Games | GameShop</title>
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
            <div class="header-image">
            <a href="/Gameshop/index.php"><img src="/Gameshop/images/Gameshop.png" alt="GameShop Logo" class="logo"></a>
            </div>
            <main class="content games-content">
                <h1>Games</h1>
                <h2>Available Games</h2>
                <div class="game-list">
                <?php
                foreach ($games as $game) {
                    echo '<div class="game-card">';
                    echo '<img src="' . htmlspecialchars($game['image']) . '" alt="' . htmlspecialchars($game['title']) . '" class="game-img">';
                    echo '<div class="game-title">' . htmlspecialchars($game['title']) . '</div>';
                    echo '<div class="game-meta">Platform: ' . htmlspecialchars($game['platform']) . '</div>';
                    echo '<div class="game-meta">Genre: ' . htmlspecialchars($game['genre']) . '</div>';
                    echo '<div class="game-price">Price: $59.99</div>';
                    echo '<div class="game-description">Game description goes here.</div>';
                    echo '</div>';
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


