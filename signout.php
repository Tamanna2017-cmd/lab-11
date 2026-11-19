<?php
session_start();
$_SESSION = [];
session_destroy();
header("Location: index.php?logged_out=1");
exit();
