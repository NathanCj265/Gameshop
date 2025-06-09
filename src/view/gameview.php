<?php

class GameView {
    public static function render($games = null) {
      
        $games = [
            [
                'title' => "Marvel’s Spider-Man 2",
                'platform' => "PS5",
                'genre' => "Action-Adventure",
                'image' => "images/games/spiderman2.jpg"
            ],
            [
                'title' => "God of War: Ragnarok",
                'platform' => "PS5",
                'genre' => "Action",
                'image' => "images/games/godofwar.jpg"
            ],
            [
                'title' => "The Legend of Zelda: Tears of the Kingdom",
                'platform' => "Nintendo Switch",
                'genre' => "Adventure",
                'image' => "images/games/zelda.jpg"
            ],
            [
                'title' => "Forza Horizon 5",
                'platform' => "Xbox",
                'genre' => "Racing",
                'image' => "images/games/forzahorizon5.jpg"
            ],
            [
                'title' => "Elden Ring",
                'platform' => "Steam",
                'genre' => "RPG",
                'image' => "images/games/eldenring.jpg"
            ],
            [
                'title' => "Cyberpunk 2077",
                'platform' => "Steam",
                'genre' => "RPG",
                'image' => "images/games/cyberpunk2077.jpg"
            ],
            [
                'title' => "Counter-Strike 2",
                'platform' => "Steam",
                'genre' => "Shooter",
                'image' => "images/games/counterstrike2.jpg"
            ],
            [
                'title' => "Animal Crossing: New Horizons",
                'platform' => "Nintendo Switch",
                'genre' => "Simulation",
                'image' => "images/games/animalcrossing.jpg"
            ],
            [
                'title' => "Halo Infinite",
                'platform' => "Xbox",
                'genre' => "Shooter",
                'image' => "images/games/haloinfinite.jpg"
            ],
            [
                'title' => "Starfield",
                'platform' => "Xbox",
                'genre' => "RPG",
                'image' => "images/games/starfield.jpg"
            ],
            [
                'title' => "Super Mario Odyssey",
                'platform' => "Nintendo Switch",
                'genre' => "Platformer",
                'image' => "images/games/supermario.jpg"
            ],
        ];
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Games | GameShop</title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
            <nav>
                <div class="navbar-container">
                    <div class="logo-nav">
                        <a href="index.php"><img src="images/Gameshop.png" alt="GameShop Logo" class="logo"></a>
                    </div>
               <ul>
                     <li><a href="indexview.php">Home</a></li>
                        <li><a href="productview.php">Products</a></li>
                        <li><a href="gameview.php">Games</a></li>
                        <li><a href="aboutview.php">About Us</a></li>
                        <li><a href="signupview.php">Sign Up</a></li>
                        <li><a href="loginview.php">Login</a></li>
                    </ul>
                </div>
            </nav>
            <div class="header-image">
                <img src="images/Gameshop.png" alt="GameShop Logo" class="logo">
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

GameView::render();