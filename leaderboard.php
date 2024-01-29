<?php
session_start();
$mysqli = require __DIR__ . "/config.php";

?>
<!DOCTYPE html>
<html>
<?php include "./head2.php" ?>

<body class="main-body">
    <div id="mainContent">
        <?php include "./nav.php" ?>
        <div id="middle">
        <div id = "displayStats">
            <div id = "statsContainer">
                <?php
                $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'time' AND testTime = 15 ORDER BY wpm DESC LIMIT 5";
                $result = $mysqli->query($query);
                $rows = $result->fetch_all(MYSQLI_ASSOC);            
                foreach ($rows as $row) {
                    //now to get the username from the id
                    $query = "SELECT * FROM user WHERE id = {$row['id']}";
                    $result = $mysqli->query($query);
                    $user = $result->fetch_assoc();
                    echo '<div>' . $user['username'] . ' = ' . $row['wpm'] . ' WPM</div>';
                    }
                ?>
            </div>
            <div id = "statsContainer">
                <?php
                $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'time' AND testTime = 30 ORDER BY wpm DESC LIMIT 5";
                $result = $mysqli->query($query);
                $rows = $result->fetch_all(MYSQLI_ASSOC);            
                foreach ($rows as $row) {
                    //now to get the username from the id
                    $query = "SELECT * FROM user WHERE id = {$row['id']}";
                    $result = $mysqli->query($query);
                    $user = $result->fetch_assoc();
                    echo '<div>' . $user['username'] . ' = ' . $row['wpm'] . ' WPM</div>';
                    }
                ?>
            </div>
            <div id = "statsContainer">
                <?php
                $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'time' AND testTime = 60 ORDER BY wpm DESC LIMIT 5";
                $result = $mysqli->query($query);
                $rows = $result->fetch_all(MYSQLI_ASSOC);            
                foreach ($rows as $row) {
                    //now to get the username from the id
                    $query = "SELECT * FROM user WHERE id = {$row['id']}";
                    $result = $mysqli->query($query);
                    $user = $result->fetch_assoc();
                    echo '<div>' . $user['username'] . ' = ' . $row['wpm'] . ' WPM</div>';
                    }
                ?>
            </div>
        </div>
        </div>
        <?php include "./footer.php" ?>
    </div>
</body>

</html>