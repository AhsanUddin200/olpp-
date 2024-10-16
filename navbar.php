<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Navbar Design</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #ffffff; /* White background for the body */
        }

        .navbar-container {
            background-color: #38a169; /* White background for the area behind the navbar */
            padding: 20px 0; /* Space above and below the navbar */
        }

        .navbar {
            background-color: #ffffff; /* Tailwind's bg-green-500 */
            height: 90px; /* Navbar height */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); /* Subtle shadow */
            display: flex; /* Make navbar a flex container */
            align-items: center; /* Center items vertically */
            padding: 0 20px; /* Horizontal padding */
        }

        .brand {
            color: black;
            font-size: 20px; /* Adjust font size */
            font-weight: bold;
            margin-right: 30px; /* Space between brand and links */
        }

        .brand span {
            font-size: 30px; /* Brand name size */
            margin-right: 5px; /* Space between text */
        }

        .nav-links {
            display: flex; /* Keep links in a single row */
            gap: 30px; /* Space between links */
            margin-right: auto; /* Push search bar to the right */
        }

        .nav-links a {
            color: black;
            text-decoration: none;
            font-size: 16px; /* Adjust font size */
            padding: 8px 12px; /* Padding for links */
            transition: color 0.2s, transform 0.2s;
            border-radius: 5px; /* Rounded corners */
        }

        .nav-links a:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Light hover effect */
        }

        .search-bar {
            display: flex;
            align-items: center;
        }

        .search-bar input {
            border: 1px solid #cbd5e0; /* Tailwind's border-gray-300 */
            border-radius: 5px; /* Rounded corners */
            padding: 8px 15px; /* Adjust padding */
            outline: none;
            width: 200px; /* Set width */
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .search-bar input::placeholder {
            color: #e2e8f0; /* Placeholder color */
        }

        .search-bar input:focus {
            border-color: #38a169; /* Tailwind's focus:ring-green-400 */
            box-shadow: 0 0 0 2px rgba(56, 175, 105, 0.5); /* Tailwind's focus:ring */
        }

        .search-bar button {
            background-color: #2f855a; /* Tailwind's bg-green-600 */
            color: white;
            border: none;
            border-radius: 5px; /* Rounded corners */
            padding: 8px 15px;
            margin-left: 5px; /* Space between input and button */
            cursor: pointer;
            transition: background-color 0.2s, transform 0.2s;
        }

        .search-bar button:hover {
            background-color: #276749; /* Tailwind's bg-green-700 */
            transform: scale(1.05); /* Slightly enlarge on hover */
        }
    </style>
</head>
<body>
    <div class="navbar-container">
        <nav class="navbar">
            <div class="brand">
                <span class="font-black">OLPP</span> One Laptop Per Pakistani
            </div>
            <div class="nav-links">
                <a href="admin_dashboard.php">Dashboard</a>
                <a href="customers.php">Customers</a>
                <a href="replacement.php">Replacement</a>
                <a href="laptop_summary.php">Laptop Summary</a>

                <a href="logout.php">Logout</a>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Search...">
                <button>Search</button>
            </div>
        </nav>
    </div>
</body>
</html>
