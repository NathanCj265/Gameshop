<?php

require_once __DIR__ . '/../model/productmodel.php';
require_once __DIR__ . '/../view/indexview.php';

class IndexController {
    public static function execute() {
        // Example: Hardcoded featured products (replace with DB fetch if you have a ProductModel)
        $featuredProducts = [
            (object)[
                'name' => 'DualSense Wireless Controller',
                'price' => 69.99,
                'description' => 'The latest PlayStation 5 controller with haptic feedback.'
            ],
            (object)[
                'name' => 'Xbox Series X Console',
                'price' => 499.99,
                'description' => 'The fastest, most powerful Xbox ever.'
            ],
            (object)[
                'name' => 'Nintendo Switch OLED',
                'price' => 349.99,
                'description' => 'Nintendo Switch with a vibrant OLED display.'
            ]
        ];

        HomeView::render($featuredProducts);
    }
}

// Run the controller
IndexController::execute();


