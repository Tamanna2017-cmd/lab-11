<?php
// Run once to create the database, table, and sample account.
$host = "localhost";
$dbUser = "root";
$dbPassword = "";

try {
    $connection = new PDO(
        "mysql:host=$host;charset=utf8mb4",
        $dbUser,
        $dbPassword,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    $connection->exec(
        "CREATE DATABASE IF NOT EXISTS login_validation_friend CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci"
    );
    $connection->exec("USE login_validation_friend");
    $connection->exec("
        CREATE TABLE IF NOT EXISTS login_users (
            user_id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            password_hash VARCHAR(255) NOT NULL
        )
    ");

    $findUser = $connection->prepare("SELECT user_id FROM login_users WHERE username = ?");
    $findUser->execute(["demo"]);

    if (!$findUser->fetch()) {
        $securePassword = password_hash("Demo@456", PASSWORD_DEFAULT);
        $addUser = $connection->prepare(
            "INSERT INTO login_users (username, password_hash) VALUES (?, ?)"
        );
        $addUser->execute(["demo", $securePassword]);
    }

    echo "<h2>Database is ready!</h2>";
    echo "<p>Database: <b>login_validation_friend</b></p>";
    echo "<p>Sample username: <b>demo</b></p>";
    echo "<p>Sample password: <b>Demo@456</b></p>";
    echo "<p><a href='index.php'>Go to the login page</a></p>";
    echo "<p>Delete create_database.php after setup.</p>";
} catch (PDOException $error) {
    die("Database setup error: " . htmlspecialchars($error->getMessage()));
}
