<?php
$flower_name = $flower_type = $arrival_date = $quantity = $price = "";
$errors = [];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $flower_name = trim($_POST['flower_name']);
    $flower_type = trim($_POST['flower_type']);
    $arrival_date = trim($_POST['arrival_date']);
    $quantity = trim($_POST['quantity']);
    $price = trim($_POST['price']);

    if (empty($flower_name) || empty($flower_type) || empty($arrival_date) || empty($quantity) || empty($price)) {
        $errors[] = "All fields are required.";
    }

    if (empty($errors)) {
        // Use a comma as the delimiter
        $flower_data = "$flower_name,$flower_type,$arrival_date,$quantity,$price\n";
        file_put_contents('floristrecord.txt', $flower_data, FILE_APPEND | LOCK_EX);

        header("Location: new_stock.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register New Flower - Pink Blossom</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('home img.jpg') no-repeat center center fixed; /* Set image as background */
            background-size: cover; /* Cover the entire viewport */
            color: #333;
            text-align: center;
            padding: 50px;
        }
        h1 {
            color: #e91e63;
            margin-bottom: 30px;
            text-shadow: 2px 2px 0 white, -2px -2px 0 white, 
                         2px -2px 0 white, -2px 2px 0 white; /* White outline effect */
        }
        nav {
            margin-bottom: 30px;
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
            color: #000; /* Change text color to black for better visibility */
        }
        nav a:hover {
            text-decoration: underline;
        }
        form {
            display: inline-block;
            padding: 30px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            background: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%; /* Make the form responsive */
        }
        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
            text-align: left; /* Align labels to the left */
        }
        input, select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        input:focus, select:focus {
            border-color: #e91e63;
            outline: none;
        }
        .error {
            color: red;
            margin-bottom: 15px;
            text-align: left; /* Align error messages to the left */
        }
        input[type="submit"] {
            background-color: #e91e63;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            padding: 12px;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #d81b60;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <h1>Register New Flower</h1>
    <nav>
        <div class="nav-container">
            <a href="index.php">Home</a>
            <a href="new_stock.php">New registered Stock</a>
            <a href="register.php">Register Stock</a>
            <a href="view_records.php">View Records</a>
            <a href="delete_records.php">Delete Records</a>
        </div>
    </nav>
    <?php if ($errors): ?>
        <div class="error"><?php echo implode('<br>', $errors); ?></div>
    <?php endif; ?>
    <form action="" method="POST">
        <label for="flower_name">Flower Name:</label>
        <input type="text" name="flower_name" required>
        
        <label for="flower_type">Flower Type:</label>
        <select name="flower_type" required>
            <option value="Roses">Roses</option>
            <option value="Tulips">Tulips</option>
            <option value="Lilies">Lilies</option>
            <option value="Orchids">Orchids</option>
        </select>
        
        <label for="arrival_date">Stock Arrival Date:</label>
        <input type="date" name="arrival_date" required>
        
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" required min="1">
        
        <label for="price">Price (RM):</label>
        <input type="number" name="price" required step="0.01" min="0">
        
        <input type="submit" value="Register Flower">
    </form>
</body>
</html>
