<?php
$success_message = '';

// Handle form submission for updating flower stock
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $updated_records = [];

    // Loop through each record in the submitted form
    foreach ($_POST['records'] as $record) {
        $flower_name = trim($record['flower_name']);
        $flower_type = trim($record['flower_type']);
        $arrival_date = trim($record['arrival_date']);
        $quantity = trim($record['quantity']);
        $price = trim($record['price']);

        // Append the updated record to the array
        $updated_records[] = "$flower_name,$flower_type,$arrival_date,$quantity,$price";
    }

    // Save the updated records back to the file
    file_put_contents('floristrecord.txt', implode("\n", $updated_records) . "\n");
    $success_message = "Flower stock records updated successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Records - Pink Blossom</title>
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
            background-color: rgba(255, 255, 255, 0.9); /* White background with slight transparency */
            padding: 10px; /* Add padding for better spacing */
            border-radius: 5px; /* Rounded corners for the message box */
            display: inline-block; /* Make it an inline block to size according to content */
            margin: 20px auto; /* Center it with margin */
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
        input[type="text"], input[type="date"], input[type="number"] {
            width: 90%;
            padding: 5px;
            margin: 5px 0;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #e91e63;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #d81b60;
        }
    </style>
</head>
<body>
    <h1>Flower Records</h1>
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

    <form method="POST" action="view_records.php">
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
                <?php
                if (file_exists('floristrecord.txt')) {
                    $records = file('floristrecord.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                    foreach ($records as $index => $record) {
                        list($flower_name, $flower_type, $arrival_date, $quantity, $price) = explode(',', trim($record));
                        echo "<tr>
                            <td><input type='text' name='records[$index][flower_name]' value='".htmlspecialchars($flower_name)."'></td>
                            <td><input type='text' name='records[$index][flower_type]' value='".htmlspecialchars($flower_type)."'></td>
                            <td><input type='date' name='records[$index][arrival_date]' value='".htmlspecialchars($arrival_date)."'></td>
                            <td><input type='number' name='records[$index][quantity]' value='".htmlspecialchars($quantity)."' min='0'></td>
                            <td><input type='number' name='records[$index][price]' value='".htmlspecialchars($price)."' step='0.01' min='0'></td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No records found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <input type="submit" name="update" value="Update Records" style="margin-top: 20px;">
    </form>
</body>
</html>
