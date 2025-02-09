<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$mysqli = require __DIR__ . "/config.php";
$userId = $_SESSION["user_id"];

// Fetch user data
$sql = "SELECT * FROM user WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$font = htmlspecialchars($user["fontSize"]);
$theme = htmlspecialchars($user["theme"]);
$wpmPR = htmlspecialchars($user["wpm"]);
$totalTests = htmlspecialchars($user["testsTaken"]);
$dateCreated = new DateTime($user["dateCreated"]);
$formattedDate = $dateCreated->format('F j, Y');

// Query to get daily stats (number of tests per day)
$sqlDaily = "SELECT DATE(testTime) AS date, COUNT(*) AS daily_tests FROM typingtest WHERE id = ? GROUP BY DATE(testTime) ORDER BY DATE(testTime) DESC";
$stmt = $mysqli->prepare($sqlDaily);
$stmt->bind_param("i", $userId);
$stmt->execute();
$dailyResults = $stmt->get_result();

// Prepare data for the graph (Date and Tests Taken)
$dates = [];
$testsTakenPerDay = [];
while ($daily = $dailyResults->fetch_assoc()) {
    $dates[] = $daily['date'];
    $testsTakenPerDay[] = $daily['daily_tests'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Typing Stats</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        .chart-container {
            width: 100%;
            max-width: 800px;
            margin: auto;
        }
    </style>
</head>
<body>
    <h1>Your Typing Stats</h1>

    <!-- User Info -->
    <p><strong>User since:</strong> <?= $formattedDate ?></p>
    <p><strong>Total Typing Tests: </strong><?= $totalTests ?></p>
    <p><strong>Average WPM: </strong><?= number_format($wpmPR, 2) ?></p>

    <!-- Daily Stats Table -->
    <h2>Daily Stats</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Tests Taken</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($daily = $dailyResults->fetch_assoc()) { ?>
                <tr>
                    <td><?= htmlspecialchars($daily['date']) ?></td>
                    <td><?= $daily['daily_tests'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Graph: Number of Typing Tests per Day -->
    <div class="chart-container">
        <canvas id="testsChart"></canvas>
    </div>

    <script>
        // Data for the graph
        const dates = <?php echo json_encode($dates); ?>;
        const testsTakenPerDay = <?php echo json_encode($testsTakenPerDay); ?>;

        // Create the chart
        const ctx = document.getElementById('testsChart').getContext('2d');
        const testsChart = new Chart(ctx, {
            type: 'line', // Choose 'line' or 'bar' for the chart type
            data: {
                labels: dates,
                datasets: [{
                    label: 'Tests Taken Per Day',
                    data: testsTakenPerDay,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true, // Filling under the line
                    tension: 0.4, // Smoothing the line
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.raw + ' tests';
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
