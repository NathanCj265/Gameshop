<?php
session_start();

require_once __DIR__ . '/../model/productmodel.php';
require_once __DIR__ . '/../view/indexview.php';

class IndexController {
    public static function execute() {
        // Featured products
        $featuredProducts = [
            (object)[
                'name' => 'DualSense Wireless Controller',
                'image' => '/Gameshop/images/products/dualsensecontroller.jpg',
                'category' => 'Accessories',
                'price' => 69.99,
                'description' => 'The latest PlayStation 5 controller with haptic feedback.'
            ],
            (object)[
                'name' => 'Xbox Series X Console',
                'image' => '/Gameshop/images/products/xboxcontroller.jpg',
                'category' => 'Consoles',
                'price' => 499.99,
                'description' => 'The fastest, most powerful Xbox ever.'
            ],
            (object)[
                'name' => 'Nintendo Switch OLED',
                'image' => '/Gameshop/images/products/nintendoswitcholed.jpg',
                'category' => 'Consoles',
                'price' => 349.99,
                'description' => 'Nintendo Switch with a vibrant OLED display.'
            ]
        ];

        // Featured games
        $featuredGames = [
            (object)[
                'name' => "Marvel's Spider-Man 2",
                'image' => '/Gameshop/images/games/Spiderman2.jpg',
                'platform' => 'PS5',
                'genre' => 'Action-Adventure',
                'price' => 59.99,
                'description' => 'Swing, jump and utilize the new Web Wings to travel across Marvel’s New York.'
            ],
            (object)[
                'name' => 'God of War: Ragnarok',
                'image' => '/Gameshop/images/games/GodofWar.jpg',
                'platform' => 'PS5',
                'genre' => 'Action',
                'price' => 59.99,
                'description' => 'Embark on an epic and heartfelt journey as Kratos and Atreus struggle with holding on and letting go.'
            ],
            (object)[
                'name' => 'The Legend of Zelda: Tears of the Kingdom',
                'image' => '/Gameshop/images/games/Zelda.jpg',
                'platform' => 'Nintendo Switch',
                'genre' => 'Adventure',
                'price' => 59.99,
                'description' => 'An epic adventure across the land and skies of Hyrule awaits in The Legend of Zelda: Tears of the Kingdom.'
            ]
        ];

        $username = isset($_SESSION['username']) ? $_SESSION['username'] : null;

        HomeView::render($featuredProducts, $featuredGames, $username);
    }
}

// Run the controller
IndexController::execute();


