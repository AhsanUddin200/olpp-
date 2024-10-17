        <?php
        // Database connection
        $servername = "localhost";
        $username = "root"; // Your database username
        $password = ""; // Your database password
        $dbname = "olpp_db"; // Your database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Initialize user ID (make sure this is set correctly)
        $user_id = 1; // Set this to the correct user ID based on your application's logic

        // Prepare and bind
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $amount = $_POST['amount'];
            $due_date = $_POST['due_date'];
            $payment_date = $_POST['payment_date'];
            $payment_method = $_POST['payment_method'];
            
            // Transaction ID is optional
            $transaction_id = !empty($_POST['transaction_id']) ? $_POST['transaction_id'] : null;

            // Prepare SQL statement
            $stmt = $conn->prepare("INSERT INTO payment_history (amount, due_date, payment_date, payment_method, transaction_id, user_id) VALUES (?, ?, ?, ?, ?, ?)");
            
            // Bind parameters
            // Note: Assuming amount is a float, transaction_id can be nullable (string), and user_id is an integer
            $stmt->bind_param("issssi", $amount, $due_date, $payment_date, $payment_method, $transaction_id, $user_id);
            
            // Execute the statement and check for errors
            if ($stmt->execute()) {
                echo "<div class='alert'>New installment added successfully.</div>";
            } else {
                echo "<div class='alert'>Error executing query: " . $stmt->error . "</div>";
            }

            // Close the statement
            $stmt->close();
        }

        // Close the connection
        $conn->close();
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Add Installment</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
            <style>
                /* Include your existing CSS styles here */
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
                    font-size: 2.5em;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    position: relative;
                }
                h1::before {
                    content: "";
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    height: 100%;
                    width: 100%;
                    border: 1px dashed #4caf50;
                    transform: translate(-50%, -50%);
                    z-index: 0;
                    border-radius: 8px;
                }
                h1 i {
                    margin-right: 15px;
                    font-size: 1.5em;
                    z-index: 1; /* Ensuring icon is on top */
                }
                .form-group {
                    margin-bottom: 20px;
                }
                .form-group label {
                    display: block;
                    margin-bottom: 5px;
                    color: #333;
                    font-weight: bold;
                }
                .form-group input[type="text"],
                .form-group input[type="number"],
                .form-group input[type="date"],
                .form-group select {
                    width: 100%;
                    padding: 10px;
                    border-radius: 5px;
                    border: 1px solid #dddddd;
                    transition: border-color 0.3s;
                }
                .form-group input[type="text"]:focus,
                .form-group input[type="number"]:focus,
                .form-group input[type="date"]:focus,
                .form-group select:focus {
                    border-color: #4caf50;
                }
                .form-group button {
                    display: inline-block;
                    background-color: #4caf50;
                    color: white;
                    padding: 12px 25px;
                    border-radius: 5px;
                    border: none;
                    cursor: pointer;
                    font-size: 1.1em;
                    transition: background-color 0.3s, transform 0.3s;
                }
                .form-group button:hover {
                    background-color: #45a049;
                    transform: translateY(-2px);
                }
                .back-button {
                    display: flex;
                    justify-content: center;
                    margin-top: 30px;
                }
                .back-button button {
                    text-decoration: none;
                    background-color: #4caf50;
                    color: white;
                    padding: 12px 25px;
                    border-radius: 5px;
                    transition: background-color 0.3s, transform 0.3s;
                    font-size: 1.1em;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                }
                .back-button button:hover {
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
            </style>
            <script>
                function toggleTransactionId() {
                    const paymentMethod = document.getElementById('payment_method').value;
                    const transactionIdDiv = document.getElementById('transaction_id_div');
                    if (paymentMethod === 'Bank') {
                        transactionIdDiv.style.display = 'block';
                    } else {
                        transactionIdDiv.style.display = 'none';
                    }
                }

                function redirectToInstallment() {
                    window.location.href = 'installment.php';
                }
            </script>
        </head>
        <body>
            <div class="container">
                <h1>
                    <i class="fas fa-plus-circle"></i>
                    Add Installment
                </h1>

                <form action="add_installment.php" method="post">
                    <div class="form-group">
                        <label for="amount">Installment Amount:</label>
                        <input type="number" name="amount" id="amount" required>
                    </div>
                    <div class="form-group">
                        <label for="due_date">Due Date:</label>
                        <input type="date" name="due_date" id="due_date" required>
                    </div>
                    <div class="form-group">
                        <label for="payment_date">Payment Date:</label>
                        <input type="date" name="payment_date" id="payment_date" required>
                    </div>
                    <div class="form-group">
                        <label for="payment_method">Payment Method:</label>
                        <select name="payment_method" id="payment_method" onchange="toggleTransactionId()" required>
                            <option value="Cash">Cash</option>
                            <option value="Bank">Bank</option>
                        </select>
                    </div>
                    <div class="form-group" id="transaction_id_div" style="display:none;">
                        <label for="transaction_id">Transaction ID:</label>
                        <input type="text" name="transaction_id" id="transaction_id">
                    </div>
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <div class="form-group">
                        <button type="submit">Add Installment</button>
                    </div>
                </form>

                <!-- Redirect Button -->
                <div class="back-button">
                    <button onclick="redirectToInstallment()">Go to Installment</button>
                </div>
            </div>
        </body>
        </html>
