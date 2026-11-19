<?php
session_start();
if (isset($_SESSION["username"])) {
    header("Location: dashboard.php");
    exit();
}
$error = $_SESSION["login_error"] ?? "";
unset($_SESSION["login_error"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Login | Access Portal</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <main class="panel">
        <div class="logo-mark">A</div>
        <span class="tag">ACCOUNT ACCESS</span>
        <h1>Sign in to your account</h1>
        <p class="intro">Please enter your details below to access the portal.</p>

        <?php if ($error !== ""): ?>
            <div class="message error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <?php if (isset($_GET["logged_out"])): ?>
            <div class="message success">You have signed out successfully.</div>
        <?php endif; ?>

        <form action="authenticate.php" method="POST">
            <label for="username">User name</label>
            <input type="text" id="username" name="username"
                   placeholder="Your user name" required autocomplete="username">

            <label for="password">Password</label>
            <input type="password" id="password" name="password"
                   placeholder="Your password" required autocomplete="current-password">

            <button type="submit">Continue to account <span>→</span></button>
        </form>
        <div class="demo">
            <span>TEST ACCOUNT</span>
            <p>Username: <strong>demo</strong></p>
            <p>Password: <strong>Demo@456</strong></p>
        </div>
    </main>
</body>
</html>
