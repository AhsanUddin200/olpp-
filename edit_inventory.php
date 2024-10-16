<?php
// edit_inventory.php

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

// Get the ID from the query string
$id = $_GET['id'];

// Fetch the inventory item
$sql = "SELECT * FROM inventory WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$inventory = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Inventory</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9ecef;
        }
        .container {
            margin-top: 50px;
            max-width: 600px;
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-bottom: 30px;
            font-weight: 300;
            text-align: center;
            color: #333;
        }
        .btn-custom {
            background-color: #4caf50;
            color: white;
            transition: background-color 0.3s;
            border-radius: 25px;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .form-control {
            border-radius: 25px;
            border: 1px solid #ced4da;
            transition: border-color 0.3s;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }
        .form-group label {
            font-weight: bold;
            color: #555;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-laptop"></i> Edit Inventory Item</h1>
        <form action="update_inventory.php" method="POST">
            <div class="form-group">
                <label for="laptop_model">Laptop Model:</label>
                <input type="text" class="form-control" name="laptop_model" id="laptop_model" value="<?php echo htmlspecialchars($inventory['laptop_model']); ?>" required>
            </div>

            <div class="form-group">
                <label for="laptop_configuration">Laptop Configuration:</label>
                <input type="text" class="form-control" name="laptop_configuration" id="laptop_configuration" value="<?php echo htmlspecialchars($inventory['laptop_configuration']); ?>" required>
            </div>

            <div class="form-group">
                <label for="serial_number">Serial Number:</label>
                <input type="text" class="form-control" name="serial_number" id="serial_number" value="<?php echo htmlspecialchars($inventory['serial_number']); ?>" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" name="quantity" id="quantity" value="<?php echo htmlspecialchars($inventory['quantity']); ?>" required>
            </div>

            <input type="hidden" name="id" value="<?php echo $inventory['id']; ?>">
            <button type="submit" class="btn btn-custom btn-block">Update <i class="fas fa-check-circle"></i></button>
        </form>
        <div class="footer">© 2024 OLPP OF AHSAN</div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
