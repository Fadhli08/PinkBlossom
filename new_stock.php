<?php
$success_message = '';

// Handle form submission for registering new flower stock
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $flower_name = trim($_POST['flower_name']);
    $flower_type = trim($_POST['flower_type']);
    $arrival_date = trim($_POST['arrival_date']);
    $quantity = trim($_POST['quantity']);
    $price = trim($_POST['price']);

    // Save flower data to the text file
    $data = "$flower_name,$flower_type,$arrival_date,$quantity,$price\n"; // Use comma as delimiter
    $result = file_put_contents('floristrecord.txt', $data, FILE_APPEND);
    
    if ($result === false) {
        $success_message = "Error writing to file.";
    } else {
        $success_message = "New flower stock registered successfully!";
    }
}

// Read all flower stocks from the text file
$flower_stocks = [];
if (file_exists('floristrecord.txt')) {
    $flower_stocks = file('floristrecord.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Stock - Pink Blossom</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('home img.jpg') no-repeat center center fixed; /* Set image as background */
            background-size: cover; /* Cover the entire viewport */
            color: #333;
            text-align: center;
            padding: 50px;
            margin: 0; /* Remove default margin */
            min-height: 100vh; /* Ensure body takes full height of the viewport */
        }
        h1 {
            color: #e91e63;
            text-shadow: 2px 2px 0 white, -2px -2px 0 white, 
                         2px -2px 0 white, -2px 2px 0 white; /* White outline effect */
        }
        h2 {
            color: #333;
            text-shadow: 2px 2px 0 white, -2px -2px 0 white, 
                         2px -2px 0 white, -2px 2px 0 white; /* White outline effect */
        }
        nav {
            margin-bottom: 20px;
        }
        .nav-container {
            display: inline-block;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            padding: 10px; /* Padding around the links */
            border-radius: 8px; /* Rounded corners */
        }
        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #333;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .success {
            color: green;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent table background */
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #e91e63;
            color: white;
        }
    </style>
</head>
<body>
    <h1>New Stock</h1>
    <nav class="nav-container">
        <a href="index.php">Home</a>
        <a href="new_stock.php">New Registered Stock</a>
        <a href="register.php">Register Stock</a>
        <a href="view_records.php">View Records</a>
        <a href="delete_records.php">Delete Records</a>
    </nav>

    <div>
        <?php if (!empty($success_message)): ?>
            <p class="success"><?php echo $success_message; ?></p>
        <?php endif; ?>
    </div>

    <h2>Registered Flower Stocks</h2>
    <table>
        <thead>
            <tr>
                <th>Flower Name</th>
                <th>Flower Type</th>
                <th>Arrival Date</th>
                <th>Quantity</th>
                <th>Price (RM)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($flower_stocks)): ?>
                <?php foreach ($flower_stocks as $stock): ?>
                    <?php list($flower_name, $flower_type, $arrival_date, $quantity, $price) = explode(',', $stock); ?>
                    <tr>
                        <td><?php echo htmlspecialchars($flower_name); ?></td>
                        <td><?php echo htmlspecialchars($flower_type); ?></td>
                        <td><?php echo htmlspecialchars($arrival_date); ?></td>
                        <td><?php echo htmlspecialchars($quantity); ?></td>
                        <td><?php echo htmlspecialchars($price); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No flower stocks registered yet.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
