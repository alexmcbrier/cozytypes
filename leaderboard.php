<?php
session_start();
$mysqli = require __DIR__ . "/config.php";
$query = "SELECT * FROM typingtest ORDER BY wpm DESC LIMIT 5";
$result = $mysqli->query($query);
$rows = $result->fetch_all(MYSQLI_ASSOC);

// Now $rows contains the top 5 highest WPM scores
// You can access individual records using $rows[0], $rows[1], ..., $rows[4]
// Each record is an associative array with column names as keys
?>
<!DOCTYPE html>
<html>
<?php include "./head2.php" ?>

<body class="main-body">
    <div id="mainContent">
        <?php include "./nav.php" ?>
        <div id="middle">
        <?php
        foreach ($rows as $row) {
            echo "<li>{$row['username']} - {$row['wpm']} WPM</li>";
        }
        ?>
        </div>
        <?php include "./footer.php" ?>
    </div>
</body>

</html>
