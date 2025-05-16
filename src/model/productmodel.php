<?php

class ProductModel {
    private static $pdo;

    public static function initializeDatabase() {
        include __DIR__ . '/../config.php'; // Ensure $pdo is defined in config.php
        self::$pdo = $pdo;
    }

    public static function getAllProducts() {
        $stmt = self::$pdo->query("SELECT * FROM products");
        return $stmt->fetchAll();
    }
}