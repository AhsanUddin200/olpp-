<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
            background: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            width: 300px;
            max-width: 90%;
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

        input {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        input:focus {
            border-color: #5cb85c;
            outline: none;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s, transform 0.3s;
        }

        button:hover {
            background: #0056b3;
            transform: scale(1.05);
        }

        button:active {
            transform: scale(0.98);
        }

        .error-message {
            text-align: center;
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }

        .success-message {
            text-align: center;
            color: green;
            font-weight: bold;
            margin-top: 10px;
        }

        .register-message {
            text-align: center;
            margin-top: 20px;
            color: #555;
        }

        .register-message a {
            color: #007bff;
            text-decoration: none;
        }

        .register-message a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form action="authenticate.php" method="post">
        <h2>Login</h2>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>

        <?php if (isset($_GET['error'])) { ?>
            <p class="error-message"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <p class="register-message">Don't have an account? <a href="register.php">Register here</a>.</p>
    </form>
</body>
</html>
