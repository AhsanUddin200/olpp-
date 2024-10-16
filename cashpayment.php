<?php
// cashpayment.php
include 'olpp_db.php'; // Include your database connection

// Check if user_id is set in the URL
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Fetch user data from the database
    $query = "SELECT * FROM customers WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $customer = $result->fetch_assoc();
    } else {
        echo "No customer found.";
        exit;
    }
} else {
    echo "User ID not specified.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash Payment Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 800px;
            margin: 40px auto;
            transition: transform 0.3s;
        }
        .container:hover {
            transform: scale(1.02);
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 40px;
            font-size: 2.5em;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        h1 i {
            margin-right: 10px;
            color: #4caf50; /* Set the icon color to #4caf50 */
        }
        .customer-info {
            margin-bottom: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .customer-info div {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            position: relative;
            transition: background-color 0.3s;
        }
        .customer-info div:hover {
            background-color: #f0f2f5;
        }
        .customer-info strong {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }
        .back-button {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .back-button a {
            text-decoration: none;
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
            font-size: 1.1em;
        }
        .back-button a:hover {
            background-color: #0056b3;
        }
        .icon {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #4caf50;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <div class="container">
    <h1 style="text-align: center;">
    <i class="fas fa-money-bill-wave" style="font-size: 1em; color: #4caf50;"></i>
    <br>
    Cash Payment Details
</h1>

        <div class="customer-info">
            <div><strong>Name:</strong> <?php echo htmlspecialchars($customer['name']); ?> <i class="fas fa-user icon"></i></div>
            <div><strong>Email:</strong> <?php echo htmlspecialchars($customer['email']); ?> <i class="fas fa-envelope icon"></i></div>
            <div><strong>Phone:</strong> <?php echo htmlspecialchars($customer['phone']); ?> <i class="fas fa-phone icon"></i></div>
            <div><strong>CNIC:</strong> <?php echo htmlspecialchars($customer['cnic']); ?> <i class="fas fa-id-card icon"></i></div>
            <div><strong>Address:</strong> <?php echo htmlspecialchars($customer['address']); ?> <i class="fas fa-map-marker-alt icon"></i></div>
            <div><strong>Laptop Model:</strong> <?php echo htmlspecialchars($customer['laptop_model']); ?> <i class="fas fa-laptop icon"></i></div>
            <div><strong>Laptop Configuration:</strong> <?php echo htmlspecialchars($customer['laptop_configuration']); ?> <i class="fas fa-cogs icon"></i></div>
            <div><strong>Serial Number:</strong> <?php echo htmlspecialchars($customer['serial_number']); ?> <i class="fas fa-barcode icon"></i></div>
            <div><strong>Payment Type:</strong> Cash <i class="fas fa-money-bill-wave icon"></i></div>
            <div><strong>Location:</strong> <?php echo htmlspecialchars($customer['location']); ?> <i class="fas fa-map icon"></i></div>
            <div><strong>Laptop Status:</strong> <?php echo htmlspecialchars($customer['laptop_status']); ?> <i class="fas fa-info-circle icon"></i></div>
        </div>
        <div class="back-button">
            <a href="javascript:history.back()">Back</a>
        </div>
    </div>
</body>
</html>
