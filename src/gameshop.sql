-- gameshop.sql

-- Create and use the database
CREATE DATABASE IF NOT EXISTS game;
USE game;

-- Users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL
);

-- Game table
CREATE TABLE IF NOT EXISTS game (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    genre VARCHAR(50),
    platform VARCHAR(50)
);

-- Products table
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL,
    description TEXT
);

-- Sample users (passwords are hashed, you should update them for real use)
INSERT INTO users (username, password_hash) VALUES
('admin', '$2y$10$eImiTXuWVxfM37uY4JANjQ=='), -- placeholder hash
('player1', '$2y$10$eImiTXuWVxfM37uY4JANjQ==');

-- Sample games
INSERT INTO game (title, genre, platform) VALUES
('Marvel’s Spider-Man 2', 'Action-Adventure', 'PS5'),
('God of War: Ragnarok', 'Action', 'PS5'),
('Horizon Forbidden West', 'RPG', 'PS5'),
('Halo Infinite', 'Shooter', 'Xbox'),
('Forza Horizon 5', 'Racing', 'Xbox'),
('Starfield', 'RPG', 'Xbox'),
('The Legend of Zelda: Tears of the Kingdom', 'Adventure', 'Nintendo Switch'),
('Super Mario Odyssey', 'Platformer', 'Nintendo Switch'),
('Animal Crossing: New Horizons', 'Simulation', 'Nintendo Switch'),
('Elden Ring', 'RPG', 'Steam'),
('Cyberpunk 2077', 'RPG', 'Steam'),
('Counter-Strike 2', 'Shooter', 'Steam');

-- Sample products
INSERT INTO products (name, price, stock, description) VALUES
('DualSense Wireless Controller', 69.99, 25, 'The latest PlayStation 5 controller with haptic feedback.'),
('Xbox Series X Console', 499.99, 10, 'The fastest, most powerful Xbox ever.'),
('Nintendo Switch OLED', 349.99, 15, 'Nintendo Switch with a vibrant OLED display.'),
('Steam Gift Card $50', 50.00, 100, 'Add funds to your Steam Wallet to buy games and more.'),
('PlayStation Plus 12 Month Membership', 59.99, 40, 'Access online multiplayer and free monthly games on PS5/PS4.');