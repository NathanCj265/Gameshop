<?php


class LoginView {
    public static function render($error = '') {
        echo "<!DOCTYPE html>";
        echo "<html lang='en'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<title>Login</title>";
        echo "<link rel='stylesheet' href='../styles/style.css'>"; // Link to CSS file
        echo "</head>";
        echo "<body>";
        echo "<h1>Login</h1>";
        if ($error) {
            echo "<p style='color: red;'>$error</p>";
        }
        echo "<form method='POST'>";
        echo "<label for='username'>Username:</label><br>";
        echo "<input type='text' id='username' name='username' required><br><br>";
        echo "<label for='password'>Password:</label><br>";
        echo "<input type='password' id='password' name='password' required><br><br>";
        echo "<button type='submit'>Login</button>";
        echo "</form>";
        echo "</body>";
        echo "</html>";
    }
}