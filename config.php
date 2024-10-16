<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <style>
        body {
            background-image: url('laptop.jpg'); /* Make sure to have a laptop.jpg in the same directory */
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
        }
        .button {
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }
        .admin-button {
            background-color: #4CAF50;
            color: white;
        }
        .customer-button {
            background-color: #008CBA;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome to Our Website</h2>
        <button class="button admin-button" onclick="location.href='admin_login.php'">Admin Login</button>
        <button class="button customer-button" onclick="location.href='customer_login.php'">Customer Login</button>
    </div>
</body>
</html>
