<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Pink Blossom Sdn Bhd</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('home img.jpg') no-repeat center center fixed; /* Set image as background */
            background-size: cover; /* Cover the entire viewport */
            color: #333;
            text-align: center;
            margin: 0; /* Remove default margin */
            min-height: 100vh; /* Ensure body takes full height of the viewport */
        }
        h1 {
            color: #e91e63;
            text-shadow: 2px 2px 0 white, -2px -2px 0 white, 
                         2px -2px 0 white, -2px 2px 0 white; /* White outline effect */
            margin-top: 20px; /* Space above the title */
        }
        nav {
            margin-bottom: 20px; /* Space below the nav */
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
            text-decoration: underline; /* Underline on hover */
        }
        .image-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* 2 columns */
            gap: 20px; /* Space between images */
            margin: 20px auto; /* Center the grid */
            max-width: 500px; /* Limit the width of the grid */
        }
        .image-item {
            text-align: center; /* Center-align text in the item */
        }
        .image-grid img {
            width: 100%; /* Make images responsive */
            border-radius: 8px; /* Rounded corners for images */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Add shadow effect */
        }
        .description {
            margin-top: 10px; /* Space above the description */
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            font-size: 14px; /* Smaller font size for description */
            color: #333; /* Gray color for description text */
        }
    </style>
</head>
<body>
    <h1>Welcome to Pink Blossom Sdn Bhd!</h1>
    <nav>
        <div class="nav-container">
            <a href="index.php">Home</a>
            <a href="new_stock.php">New Registered Stock</a>
            <a href="register.php">Register Stock</a>
            <a href="view_records.php">View Records</a>
            <a href="delete_records.php">Delete Records</a>
        </div>
    </nav>

    <div class="image-grid">
        <div class="image-item">
            <img src="lily.jpeg" alt="Flower 1">
            <div class="description">
                Roma Lily features bold creamy white trumpet-shaped flowers with light green throats and brown spots at the ends of the stems in early summer. The flowers are excellent for cutting. Its narrow leaves remain green in color throughout the season.
            </div>
        </div>
        <div class="image-item">
            <img src="rose.jpg" alt="Flower 2">
            <div class="description">The vibrant red color, velvety texture, and enchanting fragrance of red roses evoke powerful emotions and evoke the essence of love, desire, respect, admiration, courage, sacrifice, and commitment..</div>
        </div>
        <div class="image-item">
            <img src="tulip.jpg" alt="Flower 3">
            <div class="description">An elegant combination of glowing pink with contrasting markings in deepest green, this fantastic tulip "Parrot Pink Vision" has huge blooms that open fully in the sunshine; a guaranteed winner in sunny beds and borders..</div>
        </div>
        <div class="image-item">
            <img src="orchid.jpg" alt="Flower 4">
            <div class="description">The Dendrobium flower is a stunning orchid known for its vibrant colors and elegant appearance. With slender, upright stems adorned with clusters of delicate blooms, it symbolizes beauty and strength. Dendrobiums are popular in floral arrangements and can be found in shades ranging from white and yellow to deep purple. They thrive in warm climates and are appreciated for their long-lasting flowers and fragrant scent, making them a favorite among flower enthusiasts.</div>
        </div>
    </div>
</body>
</html>
