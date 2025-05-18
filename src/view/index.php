<?php


class HomeView {
    public static function render($featuredProducts) {
        ?>
        <h1>Welcome to GameShop</h1>
        <nav>
            <ul>
                <li><a href="?page=home">Home</a></li>
                <li><a href="?page=products">Products</a></li>
                <li><a href="?page=games">Games</a></li>
                <li><a href="?page=about">About Us</a></li>
                <li><a href="?page=contact">Contact</a></li>
            </ul>
        </nav>
        <img src="images/logo.png" alt="GameShop Logo" class="logo">
        <p>Welcome to GameShop, your one-stop shop for all your gaming needs!</p>
        <p>Explore our wide range of products and games.</p>
        <h2>Featured Products</h2>
        <?php
        if ($featuredProducts == null || count($featuredProducts) === 0) {
            echo "<h3>No featured products found!</h3>";
        } else {
            foreach ($featuredProducts as $product) {
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