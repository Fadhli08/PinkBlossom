<?php
$success_message = '';

// Handle form submission for deleting flower stock
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $flower_name_to_delete = trim($_POST['flower_name']);
    $records = file('floristrecord.txt');
    $new_records = [];

    foreach ($records as $record) {
        list($flower_name) = explode(',', trim($record));
        if ($flower_name !== $flower_name_to_delete) {
            $new_records[] = $record; // Keep records that do not match the name to delete
        }
    }

    file_put_contents('floristrecord.txt', implode('', $new_records));
    $success_message = "Record deleted successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Records - Pink Blossom</title>
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
        }
        form {
            display: inline-block;
            margin: 20px auto;
            text-align: left;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.8); /* Semi-transparent form background */
            width: auto;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"] {
            width: calc(100% - 20px); /* Subtract padding to fit within the container */
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box; /* Ensure padding is included in the total width */
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
    <h1>Delete Records</h1>
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
    
    <form action="delete_records.php" method="POST">
        <label for="flower_name">Flower Name to Delete:</label>
        <input type="text" name="flower_name" required>
        <input type="submit" value="Delete Record">
    </form>
</body>
</html>
