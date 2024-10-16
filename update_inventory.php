<?php
// update_inventory.php

// Database connection
$servername = "localhost";  
$username = "root";         
$password = "";             
$dbname = "olpp_db";       

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$id = $_POST['id'];
$laptop_model = $_POST['laptop_model'];
$laptop_configuration = $_POST['laptop_configuration'];
$serial_number = $_POST['serial_number'];
$quantity = $_POST['quantity'];

// Debugging output
echo "Received data: ";
echo "ID: $id, Laptop Model: $laptop_model, Laptop Configuration: $laptop_configuration, Serial Number: $serial_number, Quantity: $quantity";

// Prepare and bind the SQL statement
$sql = "UPDATE inventory SET laptop_model = ?, laptop_configuration = ?, serial_number = ?, quantity = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $laptop_model, $laptop_configuration, $serial_number, $quantity, $id);

// Execute the query
if ($stmt->execute()) {
    // Redirect to admin_dashboard.php after successful update
    header("Location: admin_dashboard.php");
    exit();
} else {
    error_log("Error updating record: " . $stmt->error); // Log the error
    echo "Error updating record: " . $stmt->error; // More detailed error message
}

$stmt->close();
$conn->close();
?>
