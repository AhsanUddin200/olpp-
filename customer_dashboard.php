<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'customer') {
    header("Location: index.php");
    exit();
}

echo "Welcome to the Customer Dashboard, " . $_SESSION['email'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Customer Dashboard</title>
</head>
<body>
    <h2>Customer Dashboard</h2>
    <p>You are now logged in as a customer.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
