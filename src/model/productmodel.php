<?php
require_once __DIR__ . '/dbconnect.php';
require_once __DIR__ . '/orminterface.php';

class ProductModel implements ORMInterface {
    private $id;
    private $name;
    private $price;
    private $stock;
    private $image;
    private static $pdo;

    public function __construct($name, $price, $stock, $image = null, $id = null) {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
        $this->image = $image;
        $this->id = $id;
        if (!self::$pdo) {
            include __DIR__ . '/dbconnect.php';
            self::$pdo = $pdo;
        }
    }

    public function save() {
        if ($this->id) {
            $stmt = self::$pdo->prepare("UPDATE products SET name=?, price=?, stock=?, image=? WHERE id=?");
            $stmt->execute([$this->name, $this->price, $this->stock, $this->image, $this->id]);
        } else {
            $stmt = self::$pdo->prepare("INSERT INTO products (name, price, stock, image) VALUES (?, ?, ?, ?)");
            $stmt->execute([$this->name, $this->price, $this->stock, $this->image]);
            $this->id = self::$pdo->lastInsertId();
        }
    }

    public function delete() {
        if ($this->id) {
            $stmt = self::$pdo->prepare("DELETE FROM products WHERE id=?");
            $stmt->execute([$this->id]);
        }
    }

    public function getID() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getPrice() {
        return $this->price;
    }
    public function getStock() {
        return $this->stock;
    }
    public function getImage() {
        return $this->image;
    }

    public static function findByID($id) {
        include __DIR__ . '/dbconnect.php';
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id=?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if ($row) {
            return new ProductModel($row['name'], $row['price'], $row['stock'], $row['image'], $row['id']);
        }
        return null;
    }

    public static function findAll() {
        include __DIR__ . '/dbconnect.php';
        $stmt = $pdo->query("SELECT * FROM products");
        $products = [];
        while ($row = $stmt->fetch()) {
            $products[] = new ProductModel($row['name'], $row['price'], $row['stock'], $row['image'], $row['id']);
        }
        return $products;
    }
}