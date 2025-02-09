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

// Fetch 15s typing stats
$query15s = "SELECT * FROM typingtest WHERE id = {$_SESSION["user_id"]} AND mode = 'time' AND testTime = 15";
$result15s = $mysqli->query($query15s);
$rows15s = $result15s->fetch_all(MYSQLI_ASSOC);
$count15s = 0;
$maxWpm15s = 0;
$accuracyForMaxWpm15s = 0;
foreach ($rows15s as $row) {
    if ($row['wpm'] > $maxWpm15s) {
        $maxWpm15s = $row['wpm'];
        $accuracyForMaxWpm15s = $row['accuracy'];
    }
    $count15s++;
}

// Fetch 30s typing stats
$query30s = "SELECT * FROM typingtest WHERE id = {$_SESSION["user_id"]} AND mode = 'time' AND testTime = 30";
$result30s = $mysqli->query($query30s);
$rows30s = $result30s->fetch_all(MYSQLI_ASSOC);
$count30s = 0;
$maxWpm30s = 0;
$accuracyForMaxWpm30s = 0;
foreach ($rows30s as $row) {
    if ($row['wpm'] > $maxWpm30s) {
        $maxWpm30s = $row['wpm'];
        $accuracyForMaxWpm30s = $row['accuracy'];
    }
    $count30s++;
}

// Fetch daily stats for the last 30 days
$sqlDaily = "SELECT 
        DATE(FROM_UNIXTIME(testTime)) AS date, 
        COUNT(*) AS daily_tests, 
        AVG(wpm) AS daily_avg_wpm, 
        AVG(accuracy) AS daily_avg_accuracy, 
        COUNT(DISTINCT id) AS daily_users
    FROM typingtest 
    WHERE testTime >= UNIX_TIMESTAMP(NOW() - INTERVAL 30 DAY) 
    GROUP BY DATE(FROM_UNIXTIME(testTime)) 
    ORDER BY DATE(FROM_UNIXTIME(testTime)) DESC";

$resultDaily = $mysqli->query($sqlDaily);
$dailyResults = $resultDaily->fetch_all(MYSQLI_ASSOC);
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
    <p>Total 15s Tests: <?= $count15s ?>, Max WPM: <?= $maxWpm15s ?>, Accuracy: <?= $accuracyForMaxWpm15s ?>%</p>
    <p>Total 30s Tests: <?= $count30s ?>, Max WPM: <?= $maxWpm30s ?>, Accuracy: <?= $accuracyForMaxWpm30s ?>%</p>

    <!-- Daily stats table for the past 30 days -->
    <h2>Daily Stats (Past 30 Days)</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Tests Taken</th>
                <th>Average WPM</th>
                <th>Average Accuracy</th>
                <th>Users Typed</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dailyResults as $daily) { ?>
                <tr>
                    <td><?= htmlspecialchars($daily['date']) ?></td>
                    <td><?= $daily['daily_tests'] ?></td>
                    <td><?= number_format($daily['daily_avg_wpm'], 2) ?></td>
                    <td><?= number_format($daily['daily_avg_accuracy'], 2) ?>%</td>
                    <td><?= $daily['daily_users'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
