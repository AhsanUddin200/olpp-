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

// Get the limit from the query parameter
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 4; // Default to 4 if not set
$limit = $limit > 0 ? $limit : 4; // Ensure the limit is a positive integer

// Prepare the SQL query with a LIMIT clause
$sql = "SELECT name, email, phone, cnic, address, payment_type, laptop_model, laptop_configuration, serial_number, location, laptop_status, created_at FROM customers LIMIT ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $limit); // Bind the limit as an integer

// Execute the statement
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['cnic']}</td>
                <td>{$row['address']}</td>
                <td>{$row['payment_type']}</td>
                <td>{$row['laptop_model']}</td>
                <td>{$row['laptop_configuration']}</td>
                <td>{$row['serial_number']}</td>
                <td>{$row['location']}</td>
                <td>{$row['laptop_status']}</td>
          
            </tr>";
    }
} else {
    echo "<tr><td colspan='12'>No customers found</td></tr>";
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
