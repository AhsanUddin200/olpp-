    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>All Customers</title>
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
                text-align: center; /* Center content */
            }
            h1 {
                color: #333;
                text-align: center;
            }
            .total-customers {
                font-size: 1.2em;
                margin-bottom: 20px; /* Space between total customers and table */
            }
            table {
                width: 100%;
                margin-top: 20px;
                border-collapse: collapse;
                margin: 0 auto; /* Center table */
            }
            th, td {
                border: 1px solid #ddd;
                padding: 10px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
            .btn-detail {
                padding: 5px 10px;
                background-color: #28a745;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            .btn-detail:hover {
                background-color: #0056b3;
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
            .button{
                margin-top: 30px;
            border-radius: 90px; 
            }
        </style>
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
            <h1>All Customers</h1>
            <div class="total-customers">
                Total Customers: <span id="totalCustomers">0</span>
            </div>
            <table id="allCustomerTable">
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
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dynamic rows will be inserted here via JavaScript -->
                </tbody>
            </table>
         <div class="button">
         <a href="admin_dashboard.php" style="background-color: #4caf50; border: radius 90px;" class="text-white font-semibold py-8 px-4 rounded shadow transition duration-200">Back to Admin</a>

</div>

        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                // Function to load all customer data
                function loadAllCustomerData() {
                    $.ajax({
                        url: 'fetch_all_customers.php', // PHP file that fetches all customer data from the database
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            var tableBody = $('#allCustomerTable tbody');
                            tableBody.empty(); // Clear any existing rows
                            $('#totalCustomers').text(data.length); // Update total customers count

                            $.each(data, function(index, customer) {
                                var row = `<tr>
                                    <td>${customer.name}</td>
                                    <td>${customer.email}</td>
                                    <td>${customer.phone}</td>
                                    <td>${customer.cnic}</td>
                                    <td>${customer.address}</td>
                                    <td>${customer.payment_type}</td>
                                    <td>${customer.laptop_model}</td>
                                    <td>${customer.laptop_configuration}</td>
                                    <td>${customer.serial_number}</td>
                                    <td>${customer.location}</td>
                                    <td>${customer.laptop_status}</td>
                                    <td><button class="btn-detail" onclick="showDetails('${customer.id}', '${customer.payment_type}')">Details</button></td>
                                </tr>`;
                                tableBody.append(row);
                            });
                            
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error: ' + error);
                        }
                        
                    });
                }

                // Function to show details of a customer
                window.showDetails = function(userId, paymentType) {
                    if (paymentType === 'installment') {
                        window.location.href = `installment.php?user_id=${userId}`;
                    } else if (paymentType === 'cash') {
                        window.location.href = `cashpayment.php?user_id=${userId}`;
                    }
                };
                

                // Load all customer data on page load
                loadAllCustomerData();
            });
            
        </script>
    </body>
    </html>
