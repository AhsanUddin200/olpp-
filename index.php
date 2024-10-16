<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Poppins', Arial, sans-serif;
            overflow: hidden; /* Prevent scroll during splash screen */
        }
        .splash-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 1000; /* Ensure it's on top */
            opacity: 1;
            transition: opacity 0.5s;
        }
        .splash-screen.hidden {
            opacity: 0;
            visibility: hidden;
        }
        .splash-screen img {
            width: 150px; /* Adjust size as needed */
            height: auto;
            animation: fadeIn 1.5s ease-in-out;
            border-radius: 50%; /* Make the image rounded */
        }
        .splash-screen .splash-text {
            margin-top: 20px;
            font-size: 24px;
            font-weight: 600;
            color: #333;
            animation: fadeIn 1.5s ease-in-out;
            text-align: center;
        }
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
        .background-slider {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
        .background-slider img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transition: opacity 1s;
        }
        .background-slider img.active {
            opacity: 1;
        }
        .container {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: row;
            gap: 20px;
            visibility: hidden; /* Hide initially */
        }
        .button {
            padding: 15px 40px;
            font-size: 20px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            min-width: 200px;
        }
        .admin-button {
            background-color: #007bff;
            color: white;
        }
        .admin-button:hover {
            background-color: #0056b3;
        }
        .customer-button {
            background-color: #28a745;
            color: white;
        }
        .customer-button:hover {
            background-color: #1e7e34;
        }
    </style>
</head>
<body>
    <div class="splash-screen">
        <img src="https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Laptop Logo">
        <div class="splash-text">One Laptop Per Pakistani</div>
    </div>

    <div class="background-slider">
        <img src="https://images.unsplash.com/photo-1517430816045-df4b7de11d1d?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8bGFwdG9wc3xlbnwwfHwwfHx8MA%3D%3D" alt="Laptop 1" class="active">
        <img src="https://images.unsplash.com/photo-1628114855639-f8294222fdc2?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fGxhcHRvcHN8ZW58MHx8MHx8fDA%3D" alt="Laptop 2">
        <img src="https://cdn.pixabay.com/photo/2015/05/15/02/07/computer-767781_1280.jpg" alt="Laptop 3">
    </div>

    <div class="container">
        <button class="button admin-button" onclick="redirectToLogin('admin')">Admin Login</button>
        <button class="button customer-button" onclick="redirectToLogin('customer')">Customer Login</button>
    </div>

    <script>
        function redirectToLogin(role) {
            window.location.href = `login.php`;
        }

        // Image slider logic
        let currentImageIndex = 0;
        const images = document.querySelectorAll('.background-slider img');
        const totalImages = images.length;

        function changeImage() {
            images[currentImageIndex].classList.remove('active');
            currentImageIndex = (currentImageIndex + 1) % totalImages;
            images[currentImageIndex].classList.add('active');
        }

        setInterval(changeImage, 2000);

        // Splash screen logic
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                const splashScreen = document.querySelector('.splash-screen');
                splashScreen.classList.add('hidden');
                document.querySelector('.container').style.visibility = 'visible';
                document.body.style.overflow = 'auto'; /* Allow scroll after splash screen */
            }, 2000); // 2 seconds
        });
    </script>
</body>
</html>
