<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$mysqli = require __DIR__ . "/config.php";
$userId = $_SESSION["user_id"];

// Get total typing tests completed by the user
$sql = "SELECT COUNT(*) AS total_tests, AVG(wpm) AS avg_wpm, AVG(accuracy) AS avg_accuracy FROM typingtest WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$userStats = $result->fetch_assoc();

// Get the stats for the past month (last 30 days) along with the number of distinct users typing on each day
$sqlDaily = "SELECT 
        DATE(testTime) AS date, 
        COUNT(*) AS daily_tests, 
        AVG(wpm) AS daily_avg_wpm, 
        AVG(accuracy) AS daily_avg_accuracy, 
        COUNT(DISTINCT id) AS daily_users
    FROM typingtest 
    WHERE testTime >= NOW() - INTERVAL 30 DAY 
    GROUP BY DATE(testTime) 
    ORDER BY DATE(testTime) DESC
";
$stmt = $mysqli->prepare($sqlDaily);
$stmt->execute();
$dailyResults = $stmt->get_result();
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
    <p>Total Typing Tests: <?= $userStats['total_tests'] ?></p>
    <p>Average WPM: <?= number_format($userStats['avg_wpm'], 2) ?></p>
    <p>Average Accuracy: <?= number_format($userStats['avg_accuracy'], 2) ?>%</p>

    <!-- Daily stats table for the past month -->
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
            <?php while ($daily = $dailyResults->fetch_assoc()) { ?>
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
