<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch student records
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

$students = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}

// Selection Sort Algorithm
for ($i = 0; $i < count($students) - 1; $i++) {
    $minIndex = $i;
    for ($j = $i + 1; $j < count($students); $j++) {
        if ($students[$j]['marks'] < $students[$minIndex]['marks']) {
            $minIndex = $j;
        }
    }
    // Swap the records
    $temp = $students[$i];
    $students[$i] = $students[$minIndex];
    $students[$minIndex] = $temp;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorted Student Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(227, 207, 157);
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #E3F0AF;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #131010;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color:rgb(21, 145, 85);
            color: white;
        }
        tr {
            background-color: #F0BB78;
        }
        tr:hover {
            background-color:rgb(203, 148, 148);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sorted Student Records</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Marks</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                <tr>
                    <td><?php echo $student['id']; ?></td>
                    <td><?php echo $student['name']; ?></td>
                    <td><?php echo $student['marks']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>