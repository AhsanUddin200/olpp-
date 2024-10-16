<?php
// Database configuration
$servername = "localhost";  // Typically 'localhost'
$username = "root";         // Replace with your database username
$password = "";             // Replace with your database password
$dbname = "olpp_db";       // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from laptop table
$sql = "SELECT name, laptop_model, serial_number, location, status FROM laptop LIMIT 5"; // Limiting to 5 records
$result = $conn->query($sql);

// Prepare HTML output
$output = '';
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $output .= "<tr>
           <td>{$row['name']}</td>
            <td>{$row['laptop_model']}</td>
            <td>{$row['serial_number']}</td>
            <td>{$row['location']}</td>
            <td>{$row['status']}</td>
        </tr>";
    }
} else {
    $output .= "<tr><td colspan='4'>No records found</td></tr>";
}

$conn->close();
echo $output; // Return the output
?>
