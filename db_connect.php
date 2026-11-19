<?php
// Connect PHP to the MySQL database.
$host = "localhost";
$database = "login_validation_friend";
$username = "root";
$password = ""; // Default XAMPP MySQL password.

try {
    $connection = new PDO(
        "mysql:host=$host;dbname=$database;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $error) {
    die("Could not connect to the database. Run create_database.php and make sure MySQL is running.");
}
