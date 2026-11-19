<?php
session_start();
require_once "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}

$enteredName = trim($_POST["username"] ?? "");
$enteredPassword = $_POST["password"] ?? "";

if ($enteredName === "" || $enteredPassword === "") {
    $_SESSION["login_error"] = "Both fields are required. Please try again.";
    header("Location: index.php");
    exit();
}

// Use a prepared query to safely search for the account.
$query = $connection->prepare(
    "SELECT user_id, username, password_hash FROM login_users WHERE username = :username LIMIT 1"
);
$query->execute(["username" => $enteredName]);
$account = $query->fetch();

if ($account && password_verify($enteredPassword, $account["password_hash"])) {
    session_regenerate_id(true);
    $_SESSION["user_id"] = $account["user_id"];
    $_SESSION["username"] = $account["username"];
    header("Location: home.php");
    exit();
}

$_SESSION["login_error"] = "Login failed. The username or password is incorrect.";
header("Location: index.php");
exit();
