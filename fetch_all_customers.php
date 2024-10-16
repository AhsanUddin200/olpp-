<?php
// Database connection
$host = 'localhost';
$dbname = 'olpp_db'; // Ensure this matches your actual database name
$username = 'root';   // Use 'root' or your actual database username
$password = '';       // Use '' if there's no password, or your actual password

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch all customers
    $stmt = $pdo->prepare("SELECT * FROM customers");
    $stmt->execute();
    
    $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return data as JSON
    echo json_encode($customers);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
