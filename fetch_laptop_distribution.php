<?php
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

// Fetch laptop distribution by campus
$laptopDistribution = [
    'munawwar' => 0,
    'korangi' => 0,
    'online' => 0,
    'onCampus' => 0,
];

$query = "SELECT location, COUNT(*) as count FROM laptops GROUP BY location";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        switch ($row['location']) {
            case 'munawwar':
                $laptopDistribution['munawwar'] = $row['count'];
                break;
            case 'korangi':
                $laptopDistribution['korangi'] = $row['count'];
                break;
            case 'online':
                $laptopDistribution['online'] = $row['count'];
                break;
            case 'onCampus':
                $laptopDistribution['onCampus'] = $row['count'];
                break;
        }
    }
}

$conn->close();

// Return JSON response
echo json_encode($laptopDistribution);
?>
