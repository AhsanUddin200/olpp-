<?php
// installment.php
include 'olpp_db.php'; // Include your database connection

// Check if user_id is set in the URL
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Fetch installment data from the database
    $query = "SELECT * FROM customers WHERE id = ?"; // Adjust the table name and condition as needed
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $installments = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "<div class='alert'>No installment details found.</div>";
        exit;
    }

    // Fetch payment history from the database
    $payment_query = "SELECT * FROM payment_history WHERE id = ?"; // Adjust the table name and condition as needed
    $payment_stmt = $conn->prepare($payment_query);
    $payment_stmt->bind_param("i", $user_id);
    $payment_stmt->execute();
    $payment_result = $payment_stmt->get_result();

    if ($payment_result->num_rows > 0) {
        $payment_history = $payment_result->fetch_all(MYSQLI_ASSOC);
    } else {
        $payment_history = [];
    }
} else {
    echo "<div class='alert'>User ID not specified.</div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installment Payment Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #555;
            line-height: 1.6;
        }
        .container {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 900px;
            margin: 50px auto;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .container:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }
        h1 {
            color: #4caf50;
            text-align: center;
            margin-bottom: 40px;
            font-size: 2.5em;
        }
        .installment-info {
            margin-bottom: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }
        .installment-info div {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, transform 0.3s;
        }
        .installment-info div:hover {
            background-color: #e9ecef;
            transform: translateY(-2px);
        }
        .alert {
            background-color: #ffdddd;
            color: #d8000c;
            padding: 10px;
            margin: 20px;
            border: 1px solid #d8000c;
            border-radius: 5px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 40px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 12px;
            transition: background-color 0.3s;
        }
        th {
            background-color: #4caf50;
            color: white;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
        }
        .button-container a {
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
            font-size: 1em;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .button-container a.delete {
            background-color: #e74c3c;
            color: white;
        }
        .button-container a.delete:hover {
            background-color: #c0392b;
            transform: translateY(-2px);
        }
        .button-container a.edit {
            background-color: #3498db;
            color: white;
        }
        .button-container a.edit:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }
        .additional-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .additional-buttons a {
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
            font-size: 1.1em;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            color: white;
        }
        .additional-buttons a.add-installment {
            background-color: #28a745;
        }
        .additional-buttons a.add-installment:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }
        .additional-buttons a.dashboard {
            background-color: #007bff;
        }
        .additional-buttons a.dashboard:hover {
            background-color: #0069d9;
            transform: translateY(-2px);
        }
        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }
            h1 {
                font-size: 2em;
            }
            .additional-buttons {
                flex-direction: column;
            }
            .additional-buttons a {
                margin-bottom: 10px;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>
            <i class="fas fa-money-check-alt"></i>
            Installment Payment Details
        </h1>

        <div class="installment-info">
            <?php foreach ($installments as $installment): ?>
                <div>
                    <strong>Name:</strong> <span><?php echo htmlspecialchars($installment['name']); ?></span><br>
                    <strong>Email:</strong> <span><?php echo htmlspecialchars($installment['email']); ?></span><br>
                    <strong>Phone:</strong> <span><?php echo htmlspecialchars($installment['phone']); ?></span><br>
                    <strong>CNIC:</strong> <span><?php echo htmlspecialchars($installment['cnic']); ?></span><br>
                    <strong>Address:</strong> <span><?php echo htmlspecialchars($installment['address']); ?></span><br>
                    <strong>Payment Type:</strong> <span>Installment</span><br>
                    <strong>Serial Number:</strong> <span><?php echo htmlspecialchars($installment['serial_number']); ?></span><br>
                    <strong>Laptop Model:</strong> <span><?php echo htmlspecialchars($installment['laptop_model']); ?></span><br>
                    <strong>Laptop Configuration:</strong> <span><?php echo htmlspecialchars($installment['laptop_configuration']); ?></span>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Payment History Section -->
        <h1>Payment History</h1>
        <table>
            <thead>
                <tr>
                    <th>Amount</th>
                    <th>Due Date</th>
                    <th>Payment Date</th>
                    <th>Payment Method</th>
                    <th>Transaction ID</th>
                    <th>Remaining Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($payment_history)): ?>
                    <?php foreach ($payment_history as $payment): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($payment['amount']); ?></td>
                            <td><?php echo htmlspecialchars($payment['due_date']); ?></td>
                            <td><?php echo htmlspecialchars($payment['payment_date']); ?></td>
                            <td><?php echo htmlspecialchars($payment['payment_method']); ?></td>
                            <td><?php echo htmlspecialchars($payment['transaction_id']); ?></td>
                            <td><?php echo htmlspecialchars($payment['remaining_amount']); ?></td>
                            <td>
                                <div class="button-container">
                                    <a class="edit" href="edit_payment.php?id=<?php echo $payment['id']; ?>">Edit</a>
                                    <a class="delete" href="delete_payment.php?id=<?php echo $payment['id']; ?>">Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="alert">No payment history found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="additional-buttons">
            <a class="add-installment" href="add_installment.php?user_id=<?php echo $user_id; ?>">Add Installment</a>
            <a class="dashboard" href="dashboard.php">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>
