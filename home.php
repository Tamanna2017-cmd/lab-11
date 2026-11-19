<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Verified</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <main class="panel result-panel">
        <div class="success-icon">✓</div>
        <span class="tag">ACCESS VERIFIED</span>
        <h1>You're signed in!</h1>
        <p class="intro">
            Hello, <strong><?= htmlspecialchars($_SESSION["username"]) ?></strong>.
            Your login information has been successfully verified using the database.
        </p>
        <div class="verified-note">Your account session is now active.</div>
        <a class="logout" href="signout.php">Sign out</a>
    </main>
</body>
</html>
