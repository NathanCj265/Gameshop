<?php

class ProductView {
    public static function render($products) {
        ?>
        <h1>Products</h1>
        <p>Browse our selection of games and accessories!</p>
        <h2>Available Products</h2>
        <?php
        if ($products == null || count($products) === 0) {
            echo "<h3>No products found!</h3>";
        } else {
          
            echo "<ul>";
            foreach ($products as $product) {
                echo "<li>" . htmlspecialchars($product->name) . " - $" . number_format($product->price, 2) . "</li>";
            }
            echo "</ul>";

            
            foreach ($products as $product) {
                ?>
                <div class="product">
                    <h3><?php echo htmlspecialchars($product->name); ?></h3>
                    <p>Price: $<?php echo number_format($product->price, 2); ?></p>
                    <p><?php echo htmlspecialchars($product->description); ?></p>
                </div>
                <?php
            }
        }
    }
}