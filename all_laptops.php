<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "olpp_db"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from laptop table
$sql = "SELECT laptop_model, serial_number, location, status FROM laptop"; // No limit
$result = $conn->query($sql);

// Prepare HTML output
$output = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Laptops</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Tailwind CSS -->
    <style>
        body {
            font-family: "Arial", sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
       <h1 class="text-4xl font-extrabold mb-8 text-center" style="color: #4caf50;">All Laptops</h1>
        <div class="overflow-x-auto rounded-lg shadow-lg bg-white border border-gray-200">
            <table class="min-w-full divide-y divide-gray-300">
                <thead>
                    <tr class=" text-white" style="background-color: #4caf50;">
                        <th class="py-3 px-6 text-left text-sm font-medium uppercase">Laptop Model</th>
                        <th class="py-3 px-6 text-left text-sm font-medium uppercase">Serial Number</th>
                        <th class="py-3 px-6 text-left text-sm font-medium uppercase">Location</th>
                        <th class="py-3 px-6 text-left text-sm font-medium uppercase">Status</th>
                    </tr>
                    
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $output .= "<tr class='hover:bg-blue-100 transition-colors duration-200' >
            <td class='py-3 px-6'>{$row['laptop_model']}</td>
            <td class='py-3 px-6'>{$row['serial_number']}</td>
            <td class='py-3 px-6'>{$row['location']}</td>
            <td class='py-3 px-6'>{$row['status']}</td>
        </tr>";
    }
} else {
    $output .= "<tr><td colspan='4' class='py-3 px-6 text-center text-gray-500'>No records found</td></tr>";
}

$output .= '</tbody>
            </table>
        </div>
        <div class="mt-8 text-center">
<a href="admin_dashboard.php" style="background-color: #4caf50; hover:bg-blue-700;" class="text-white font-semibold py-2 px-4 rounded shadow transition duration-200">Back to Admin</a>
        </div>
    </div>
</body>
</html>';

$conn->close();
echo $output; // Return the output
?>
