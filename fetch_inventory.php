<?php
// fetch_inventory.php

// Database connection
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

// Fetch inventory data
$sql = "SELECT * FROM inventory"; // Fetch all records from the inventory table
$result = $conn->query($sql);

echo "<table border='1'>
        <tr>
            <th>Laptop Model</th>
            <th>Laptop Configuration</th>
            <th>Serial Number</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['laptop_model']}</td>
                <td>{$row['laptop_configuration']}</td>
                <td>{$row['serial_number']}</td>
                <td>{$row['quantity']}</td>
                <td><button class='edit-button' data-id='{$row['id']}'>Edit</button></td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5'>No inventory records found.</td></tr>";
}

echo "</table>";

$conn->close();
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle click event for Edit buttons
        $(document).on('click', '.edit-button', function() {
            const id = $(this).data('id'); // Get the ID from the button's data attribute
            window.location.href = `edit_inventory.php?id=${id}`; // Redirect to edit page
        });
    });
</script>
