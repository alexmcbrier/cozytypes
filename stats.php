<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$mysqli = require __DIR__ . "/config.php";
$userId = $_SESSION["user_id"];

// Fetch user info (date created, etc.)
$query = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
$result = $mysqli->query($query);
$user = $result->fetch_assoc();
$dateCreated = new DateTime($user["dateCreated"]);
$formattedDate = $dateCreated->format('F j, Y');

// Fetch daily stats for the last 7 days with improved SQL query
$sqlDaily = "SELECT 
        DATE(testTime) AS date, 
        COUNT(*) AS total_tests, 
        COUNT(DISTINCT CASE WHEN id IS NOT NULL THEN id END) AS distinct_users
    FROM typingtest 
    WHERE testTime >= NOW() - INTERVAL 7 DAY
    AND mode = 'time'
    AND wpm < 250
    GROUP BY DATE(testTime)
    ORDER BY DATE(testTime) DESC
";

// Debug: output the SQL query to check if it's correct
echo "SQL Query: $sqlDaily<br>";

$resultDaily = $mysqli->query($sqlDaily);

if (!$resultDaily) {
    echo "Query failed: " . $mysqli->error;
    exit();
}

$dailyResults = $resultDaily->fetch_all(MYSQLI_ASSOC);

// Check if we have results
if (empty($dailyResults)) {
    echo "No results found for the last 7 days.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Stats</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        h1 {
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Your Typing Stats</h1>

    <!-- User stats summary -->
    <h2>Overall Stats</h2>
    <p>Date Created: <?= $formattedDate ?></p>

    <!-- Daily stats table for the past 7 days -->
    <h2>Daily Stats (Past 7 Days)</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Total Tests</th>
                <th>Distinct Users</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dailyResults as $daily) { ?>
                <tr>
                    <td><?= htmlspecialchars($daily['date']) ?></td>
                    <td><?= $daily['total_tests'] ?></td>
                    <td><?= $daily['distinct_users'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
