<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: url('https://images.unsplash.com/photo-1628114855639-f8294222fdc2?w=1920&auto=format&fit=crop&q=60') no-repeat center center fixed;
            background-size: cover;
        }

        form {
            background: rgba(255, 255, 255, 0.7); /* More transparent background */
            padding: 20px; /* Reduced padding */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px); /* Blur effect */
            width: 300px; /* Fixed width for the form */
            max-width: 90%; /* Responsive max-width */
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            color: #333;
            margin-bottom: 5px;
            font-weight: bold;
            display: block;
        }

        input, select {
            display: block;
            width: 100%;
            margin-bottom: 10px; /* Reduced margin */
            padding: 8px; /* Smaller padding */
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 14px; /* Adjusted font size */
            transition: border-color 0.3s;
        }

        input:focus, select:focus {
            border-color: #5cb85c;
            outline: none; /* Remove default outline */
        }

        button {
            width: 100%;
            padding: 10px; /* Padding for button */
            background: #007bff; /* Primary button color */
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px; /* Button font size */
            transition: background 0.3s, transform 0.3s; /* Smooth transition for background and transform */
        }

        button:hover {
            background: #0056b3; /* Darker shade on hover */
            transform: scale(1.05); /* Slightly enlarge button on hover */
        }

        button:active {
            transform: scale(0.98); /* Scale down when button is pressed */
        }

        .error-message, .success-message {
            text-align: center;
            font-weight: bold;
            margin-top: 10px;
        }

        .error-message {
            color: red;
        }

        .success-message {
            color: green;
        }

        .login-message {
            text-align: center;
            margin-top: 20px;
            color: #555;
        }

        .login-message a {
            color: #007bff; /* Link color */
            text-decoration: none; /* Remove underline */
        }

        .login-message a:hover {
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>
<body>
    <?php
    session_start();

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        // Get form data
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $gender = $_POST['gender'];

        // Check if the email already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error_message = "Email already registered.";
        } elseif ($password !== $confirm_password) {
            $error_message = "Passwords do not match.";
        } else {
            // Prepare and execute the insert statement
            $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, gender) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $first_name, $last_name, $email, $password, $gender); // Directly using the password without hashing
            if ($stmt->execute()) {
                // Redirect to login page after successful registration
                header("Location: login.php");
                exit();
            } else {
                $error_message = "Registration failed. Please try again.";
            }
        }

        // Close the connection
        $stmt->close();
        $conn->close();
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <h2>Register</h2>
        
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="" disabled selected>Select your gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>

        <button type="submit">Register</button>

        <?php if (isset($error_message)) { ?>
            <p class="error-message"><?php echo $error_message; ?></p>
        <?php } ?>

        <p class="login-message">Already have an account? <a href="login.php">Login here</a>.</p>
    </form>
</body>
</html>
