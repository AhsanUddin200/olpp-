<?php
// edit_payment.php
include 'olpp_db.php'; // Include your database connection

// Check if payment ID is set in the URL
if (isset($_GET['id'])) {
    $payment_id = $_GET['id'];

    // Fetch payment details from the database
    $query = "SELECT * FROM payment_history WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $payment_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $payment = $result->fetch_assoc();
    } else {
        echo "<div class='alert'>No payment details found.</div>";
        exit;
    }

    // Update payment details if form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $amount = $_POST['amount'];
        $due_date = $_POST['due_date'];
        $payment_date = $_POST['payment_date'];
        $payment_method = $_POST['payment_method'];
        $transaction_id = $_POST['transaction_id'];

        $update_query = "UPDATE payment_history SET amount = ?, due_date = ?, payment_date = ?, payment_method = ?, transaction_id = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("sssssi", $amount, $due_date, $payment_date, $payment_method, $transaction_id, $payment_id);

        if ($update_stmt->execute()) {
            echo "<div class='alert success'>Payment details updated successfully.</div>";
        } else {
            echo "<div class='alert'>Error updating payment details. Please try again.</div>";
        }
    }
} else {
    echo "<div class='alert'>Payment ID not specified.</div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Payment Details</title>
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
            max-width: 600px;
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
            font-size: 2em;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        h1 i {
            margin-right: 15px;
            font-size: 1.5em;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 10px;
            color: #333;
            font-weight: bold;
        }
        input, select {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }
        button {
            background-color: #4caf50;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
            font-size: 1.1em;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
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
        .alert.success {
            background-color: #ddffdd;
            color: #4caf50;
            border-color: #4caf50;
        }
        .back-button {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }
        .back-button a {
            text-decoration: none;
            background-color: #3498db;
            color: white;
            padding: 12px 25px;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
            font-size: 1.1em;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .back-button a:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>
            <i class="fas fa-edit"></i>
            Edit Payment Details
        </h1>

        <form action="" method="POST">
            <label for="amount">Amount</label>
            <input type="text" id="amount" name="amount" value="<?php echo htmlspecialchars($payment['amount']); ?>" required>

            <label for="due_date">Due Date</label>
            <input type="date" id="due_date" name="due_date" value="<?php echo htmlspecialchars($payment['due_date']); ?>" required>

            <label for="payment_date">Payment Date</label>
            <input type="date" id="payment_date" name="payment_date" value="<?php echo htmlspecialchars($payment['payment_date']); ?>" required>

            <label for="payment_method">Payment Method</label>
            <select id="payment_method" name="payment_method" required>
                <option value="Cash" <?php echo ($payment['payment_method'] == 'Cash') ? 'selected' : ''; ?>>Cash</option>
                <option value="Credit Card" <?php echo ($payment['payment_method'] == 'Credit Card') ? 'selected' : ''; ?>>Credit Card</option>
                <option value="Bank Transfer" <?php echo ($payment['payment_method'] == 'Bank Transfer') ? 'selected' : ''; ?>>Bank Transfer</option>
                <!-- Add more options as needed -->
            </select>

            <label for="transaction_id">Transaction ID</label>
            <input type="text" id="transaction_id" name="transaction_id" value="<?php echo htmlspecialchars($payment['transaction_id']); ?>" required>

            <button type="submit">Update Payment</button>
        </form>

        <div class="back-button">
            <a href="installment.php?user_id=<?php echo $payment['user_id']; ?>">Back to Installment Details</a>
        </div>
    </div>
</body>
</html>
