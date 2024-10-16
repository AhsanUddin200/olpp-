<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OLPP Admin Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 1200px;
            margin: 20px auto;
        }
        h1, h2 {
            color: #333;
            text-align: left;
        }
        p {
            color: #666;
            text-align: left;
            margin: 5px 0;
        }
        .card-container {
            display: flex;
            gap: 20px;
            justify-content: space-between;
        }
        .card {
            background: linear-gradient(to right, #5cb85c, #73c276);
            border: 1px solid #5cb85c;
            border-radius: 8px;
            padding: 20px;
            width: calc(25% - 15px);
            height: 150px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1), 0 10px 15px rgba(76, 175, 80, 0.5);
            transition: transform 0.2s;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.8em;
        }
        .card:hover {
            transform: translateY(-10px);
        }
        form {
            margin-top: 30px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 15px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
       

        .footer-card {
    background: linear-gradient(to right, #4CAF50, #66BB6A); /* Gradient background */
    border: 1px solid #4CAF50;
    border-radius: 8px;
    padding: 20px;
    text-align: left; /* Left align text */
    color: white;
    margin-top: 40px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1), 0 10px 15px rgba(76, 175, 80, 0.5);
}

.footer-columns {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
}

.footer-column {
    width: 23%; /* Adjust width for spacing */
}

.footer-column h3 {
    margin-top: 0;
    border-bottom: 2px solid #FFFFFF; /* Underline for headings */
    padding-bottom: 5px; /* Space below heading */
}

.footer-column p {
    margin: 5px 0; /* Space between paragraphs */
}

.footer-column ul {
    list-style-type: none;
    padding: 0;
}

.footer-column ul li {
    margin: 5px 0;
}

.footer-column a {
    color: white; /* Link color */
    text-decoration: none; /* Remove underline */
    transition: color 0.3s; /* Smooth color transition */
}

.footer-column a:hover {
    color: #FFEB3B; /* Change link color on hover */
}

.social-links {
    padding: 0;
}

.footer-bottom {
    text-align: center; /* Center align bottom text */
    margin-top: 20px; /* Space above bottom text */
    border-top: 1px solid rgba(255, 255, 255, 0.5); /* Top border for separation */
    padding-top: 10px; /* Space above the text */
    color: white; /* Corrected to ensure the text is white */
}


.footer-end{
    text-align: center; /* Center the text */
   
    padding: 20px; /* Optional: add some padding */
}
.footer-end p{    color: white; /* Set text color to white */
margin: 0; /* Remove default margin */
text-align: center;
}

.olpp-description {
    color: #FFFFFF   /* Green color for OLPP description */
}

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
            background-color: #4caf50; /* Tailwind's bg-green-500 */
            height: 100px; /* Navbar height */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); /* Subtle shadow */
            display: flex; /* Make navbar a flex container */
            align-items: center; /* Center items vertically */
            padding: 0 10px; /* Horizontal padding */
            border-radius: 10px; /* Rounded corners */
        }

        .brand {
            color: white;
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
            color: white;
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
            color: #2f855a; /* Placeholder color */
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>  
    <div class="container">
    <nav class="navbar">
        <div class="brand">
            <span class="font-black">OLPP</span> One Laptop Per Pakistani
        </div>
        <div class="nav-links">
            <a href="admin_dashboard.php">Dashboard</a>
            <a href="all_user.php">Customers</a>
            <a href="all_laptops.php">Laptops Inventory</a>
            <a href="update_inventory.php">Update Laptop</a>
            <a href="logout.php">Logout</a>
        </div>
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search..." autocomplete="off">
            <button id="searchButton">Search</button>
            <div class="suggestions" id="suggestions"></div>
        </div>
    </nav>

        <h1>OLPP Admin Dashboard</h1>
        <p>Total Laptops Distributed: <strong>29</strong></p>
        <h2>Laptop Distribution</h2>
        <div class="card-container">
            <div class="card">Munawwar Campus</div>
            <div class="card">Korangi Campus</div>
            <div class="card">Online Academy</div>
            <div class="card">On Campus</div>
        </div>
        <h2>Laptop Inventory</h2>
        <table class="table table-bordered" id="laptopTable">
            <thead>
                <tr>
                <th> Name</th>
                    <th>Laptop Model</th>
                    <th>Serial Number</th>
                    <th>Location</th>
                    
                    <th> Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Laptop data will be inserted here -->
            </tbody>
        </table>
        <button id="showAllLaptops">Show All Laptops</button>

        <h2>Customer Management</h2>
        <table id="customerTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>CNIC</th>
                    <th>Address</th>
                    <th>Payment Type</th>
                    <th>Laptop Model</th>
                    <th>Laptop Configuration</th>
                    <th>Serial Number</th>
                    <th>Location</th>
                    <th>Laptop Status</th>
                   
                </tr>
            </thead>
            <tbody>
                <!-- Dynamic rows will be inserted here via JavaScript -->
            </tbody>
        </table>

        <button id="seeAllCustomers">See All Customers</button>

        <h2>Add New Customer</h2>
        <form id="customerForm">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="phone">Phone:</label>
            <input type="tel" name="phone" id="phone" required>

            <label for="cnic">CNIC:</label>
            <input type="text" name="cnic" id="cnic" required>

            <label for="address">Address:</label>
            <input type="text" name="address" id="address" required>

            <label for="payment_type">Payment Type:</label>
            <select name="payment_type" id="payment_type" required>
                <option value="cash">Cash</option>
                <option value="installment">Installment</option>
            </select>

            <label for="laptop_model">Laptop Model:</label>
            <input type="text" name="laptop_model" id="laptop_model" required>

            <label for="laptop_configuration">Laptop Configuration:</label>
            <input type="text" name="laptop_configuration" id="laptop_configuration" required>

            <label for="serial_number">Serial Number:</label>
            <input type="text" name="serial_number" id="serial_number" required>

            <label for="location">Location:</label>
            <select name="location" id="location" required>
                <option value="munawwar">Munawwar Campus</option>
                <option value="korangi">Korangi Campus</option>
                <option value="online">Online Academy</option>
                <option value="other">Other</option>
            </select>

            

            <label for="laptop_status">Laptop Status:</label>
            <select name="laptop_status" id="laptop_status" required>
                <option value="instock">In Stock</option>
                <option value="issued">Issued</option>
                <option value="underRepair">Under Repair</option>
            </select>

            <button type="submit">Add Customer</button>
        </form>

        <h2>Inventory Management</h2>
        <table id="inventoryTable">
            
            <tbody>
                <!-- Dynamic inventory rows will be inserted here via JavaScript -->
            </tbody>
        </table>

       
    </div>
    <div class="footer-card">
    <div class="footer-columns">
        <div class="footer-column">
            <h3>About OLPP</h3>
            <p class="olpp-description">One Laptop Per Pakistani (OLPP) is an initiative to provide affordable laptops to every Pakistani student and professional.</p>
        </div>
        <div class="footer-column">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Our Laptops</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Contact Us</h3>
            <p>Email: <a href="mailto:support@olpp.org">support@olpp.org</a></p>
            <p>Phone: <a href="tel:+921234567890">+92 123 456 7890</a></p>
        </div>
        <div class="footer-column">
            <h3>Follow Us</h3>
            <ul class="social-links">
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Instagram</a></li>
            </ul>
        </div>
    </div>
        <div class="footer-bottom">
           
        </div>

        <div class="footer-end"> <p>&copy; 2024 OLPP Admin Dashboard. All Rights Reserved.</p></div>
</div>

      


    <script>

document.getElementById('searchButton').addEventListener('click', function() {
            const query = document.getElementById('searchInput').value.trim().toLowerCase();

            switch (query) {
                case 'dashboard':
                    window.location.href = 'admin_dashboard.php';
                    break;
                case 'customers':
                case 'customer':
                    window.location.href = 'all_user.php';
                    break;
                case 'laptops inventory':
                case 'laptops':
                case 'inventory':
                    window.location.href = 'all_laptops.php';
                    break;
                case 'update laptop':
                    window.location.href = 'update_inventory.php';
                    break;
                case 'logout':
                    window.location.href = 'logout.php';
                    break;
                default:
                    alert('Page not found. Please try again.');
            }
        });

        // Optional: Handle Enter key press in the search input field
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                document.getElementById('searchButton').click();
            }
        });


        $(document).ready(function() {
            $('#customerForm').submit(function(event) {
                event.preventDefault(); // Prevent the default form submission
                
                $.ajax({
                    url: 'add_customer.php', // Your PHP file that handles the form data
                    type: 'POST',
                    data: $(this).serialize(), // Serialize form data
                    success: function(response) {
                        console.log(response); // Log response to console for debugging
                        $('#customerForm')[0].reset(); // Clear form fields
                        loadCustomerData(); // Reload customer data
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ' + error);
                    }
                });
            });

            // Function to load customer data
            function loadCustomerData(limit = 4) {
                $.ajax({
                    url: 'fetch_customers.php?limit=' + limit, // PHP file that fetches customer data from the database
                    type: 'GET',
                    success: function(data) {
                        $('#customerTable tbody').html(data); // Populate table with fetched data
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ' + error);
                    }
                });
            }

            // Function to load inventory data
            function loadInventoryData() {
                $.ajax({
                    url: 'fetch_inventory.php', // PHP file that fetches inventory data from the database
                    type: 'GET',
                    success: function(data) {
                        $('#inventoryTable tbody').html(data); // Populate inventory table with fetched data
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ' + error);
                    }
                });
            }

            // Function to load laptop data
            function loadLaptopData() {
                $.ajax({
                    url: 'fetch_laptop.php', // PHP file that fetches laptop data from the database
                    type: 'GET',
                    success: function(data) {
                        $('#laptopTable tbody').html(data); // Populate laptop table with fetched data
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ' + error);
                    }
                });
            }

            // Load initial data on page load
            loadCustomerData();
            loadInventoryData();
            loadLaptopData();
        });
        $('#seeAllCustomers').click(function() {
                window.location.href = 'all_user.php'; // Redirect to all customers page
            });

            $('#showAllLaptops').click(function() {
    window.location.href = 'all_laptops.php'; // Redirect to all laptops page
});


    </script>
</body>
</html>
