<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Counter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #62d4bd;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .counter-container {
            text-align: center;
            background: #fff;
            padding: 100px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .counter-container h1 {
            margin: 0 0 10px;
        }
        .counter-container p {
            font-size: 1.2em;
            margin: 10px 0 0;
        }
    </style>
</head>
<body>
    <div class="counter-container">
        <h1>Welcome to My Website</h1>
        <?php
            // Path to the file storing the visitor count
            $file = "visitor_count.txt";

            // Check if the file exists, create it if not
            if (!file_exists(filename: $file)) {
                file_put_contents($file, "0");
            }

            // Read the current visitor count from the file
            $count = (int) file_get_contents($file);

            // Increment the visitor count
            $count++;

            // Write the updated count back to the file
            file_put_contents($file, $count);

            // Display the visitor count
            echo "<p>Total Visitors: <strong>$count</strong></p>";
        ?>
    </div>
</body>
</html>
