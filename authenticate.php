<?php
session_start();
include 'olpp_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Fetch user data
        $user = $result->fetch_assoc();
        
        // Verify password
        if ($password === $user['password']) { // Replace this with password_verify($password, $user['password']) if passwords are hashed
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            
            // Redirect to dashboard
            header("Location: admin_dashboard.php");
            exit();
        } else {
            header("Location: login.php?error=Invalid email or password.");
        }
    } else {
        header("Location: login.php?error=Invalid email or password.");
    }

    $stmt->close();
}

$conn->close();
?>
