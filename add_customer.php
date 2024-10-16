<?php
// Database configuration
$host = 'localhost'; // Your database host
$username = 'root'; // Your database username
$password = ''; // Your database password
$dbname = 'olpp_db'; // Your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the POST request
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $cnic = $_POST['cnic'];
    $address = $_POST['address'];
    $payment_type = $_POST['payment_type'];
    $laptop_model = $_POST['laptop_model'];
    $laptop_configuration = $_POST['laptop_configuration'];
    $serial_number = $_POST['serial_number'];
    $location = $_POST['location'];
    $laptop_status = $_POST['laptop_status'];

    // Prepare an SQL statement
    $stmt = $conn->prepare("INSERT INTO customers (name, email, phone, cnic, address, payment_type, laptop_model, laptop_configuration, serial_number, location, laptop_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $name, $email, $phone, $cnic, $address, $payment_type, $laptop_model, $laptop_configuration, $serial_number, $location, $laptop_status);

    if ($stmt->execute()) {
        echo "Customer added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
