<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password' AND role='customer'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['email'] = $email;
        $_SESSION['role'] = 'customer';
        header("Location: customer_dashboard.php");
    } else {
        echo "Invalid credentials.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Login</title>
</head>
<body>
    <!-- The form is now handled in index.php -->
</body>
</html>

