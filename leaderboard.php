<?php
session_start();
$mysqli = require __DIR__ . "/config.php";

?>
<!DOCTYPE html>
<html>
<?php include "./head.php" ?>
<head>
<title>leaderboard | cozytypes</title>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9923722164132738"
     crossorigin="anonymous"></script>
</head>
<body>    <!-- class main body makes no scroll bar-->
    <form id="mainContent" method="POST" action="preferences">
        <?php include "./nav.php" ?>
        <div id="middle" style = "width: 100%">
        <div id = "showSignIn" style = "padding:0rem 2rem;" >Leaderboard</div>
            <div class = "profileValues" style = "padding: 0 1rem; margin-bottom: 2rem;">must have an account to be on the leaderboard</div>
            <div class = "results" style = "padding: 0 1rem">All Time</div>
            <div id = "displayStats" style= "margin: 3rem;">
                <div class = "statsContainer" style = "padding: 0">
                    <div id = "leaderboardheader" class = "notSignedIn">15 seconds </div>
                    <?php
                    $query = "SELECT id, MAX(wpm) AS best_wpm
                    FROM typingtest
                    WHERE id IS NOT NULL AND mode = 'time' AND wpm < 250 AND testTime = 15
                    GROUP BY id
                    ORDER BY best_wpm DESC
                    LIMIT 5;";
                    $result = $mysqli->query($query);
                    $rows = $result->fetch_all(MYSQLI_ASSOC);            
                    
                    // Ensure there are at least 5 rows, adding empty rows if necessary
                    while (count($rows) < 5) {
                        $rows[] = ['id' => null, 'best_wpm' => null]; // Use 'best_wpm' here
                    }
                    
                    $count = 1;
                    foreach ($rows as $row) {
                        $username = 'xxx';
                        if ($row['id'] !== null) {
                            $userId = (int)$row['id']; // sanitize
                            $userQuery = "SELECT username FROM user WHERE id = $userId";
                            $userResult = $mysqli->query($userQuery);
                            $user = $userResult->fetch_assoc();
                            $username = ($user !== null) ? substr($user['username'], 0, 13) : '---';
                        }
                    
                        $wpm = ($row['best_wpm'] !== null) ? $row['best_wpm'] : '---';
                        echo '<div class="profileValues">' . $count . '. ' . htmlspecialchars($username) . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
                <div class = "statsContainer" style = "padding: 0">
                    <div id = "leaderboardheader" class = "notSignedIn">30 seconds  </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'time' AND wpm < 250 AND testTime = 30 ORDER BY wpm DESC LIMIT 5";
                    $result = $mysqli->query($query);
                    $rows = $result->fetch_all(MYSQLI_ASSOC);            
                    // Ensure there are at least 5 rows, adding empty rows if necessary
                    while (count($rows) < 5) {
                        $rows[] = ['id' => null, 'wpm' => null]; // Add an empty row
                    }
                    $count = 1;
                    foreach ($rows as $row) {
                        // Now to get the username from the id
                        $username = 'xxx';
                        if ($row['id'] !== null) {
                            $query = "SELECT * FROM user WHERE id = {$row['id']}";
                            $result = $mysqli->query($query);
                            $user = $result->fetch_assoc();
                            $username = ($user !== null) ? substr($user['username'], 0, 13) : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
                <div class = "statsContainer" style = "padding: 0">
                    <div id = "leaderboardheader" class = "notSignedIn">60 seconds  </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'time' AND wpm < 250 AND testTime = 60 ORDER BY wpm DESC LIMIT 5";
                    $result = $mysqli->query($query);
                    $rows = $result->fetch_all(MYSQLI_ASSOC);            
                    // Ensure there are at least 5 rows, adding empty rows if necessary
                    while (count($rows) < 5) {
                        $rows[] = ['id' => null, 'wpm' => null]; // Add an empty row
                    }
                    $count = 1;
                    foreach ($rows as $row) {
                        // Now to get the username from the id
                        $username = 'xxx';
                        if ($row['id'] !== null) {
                            $query = "SELECT * FROM user WHERE id = {$row['id']}";
                            $result = $mysqli->query($query);
                            $user = $result->fetch_assoc();
                            $username = ($user !== null) ? substr($user['username'], 0, 13) : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
                <div class = "statsContainer" style = "padding: 0">
                    <div id = "leaderboardheader" class = "notSignedIn">120 seconds  </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'time' AND wpm < 250 AND testTime = 120 ORDER BY wpm DESC LIMIT 5";
                    $result = $mysqli->query($query);
                    $rows = $result->fetch_all(MYSQLI_ASSOC);            
                    // Ensure there are at least 5 rows, adding empty rows if necessary
                    while (count($rows) < 5) {
                        $rows[] = ['id' => null, 'wpm' => null]; // Add an empty row
                    }
                    $count = 1;
                    foreach ($rows as $row) {
                        // Now to get the username from the id
                        $username = 'xxx';
                        if ($row['id'] !== null) {
                            $query = "SELECT * FROM user WHERE id = {$row['id']}";
                            $result = $mysqli->query($query);
                            $user = $result->fetch_assoc();
                            $username = ($user !== null) ? substr($user['username'], 0, 13) : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
            </div>

            <div id = "displayStats" style= "margin: 3rem; padding 0;">
                <div class = "statsContainer" style = "padding: 0; margin: 0">
                    <div id = "leaderboardheader" class = "notSignedIn">10 words </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'words' AND wpm < 250 AND testTime = 10 ORDER BY wpm DESC LIMIT 5";
                    $result = $mysqli->query($query);
                    $rows = $result->fetch_all(MYSQLI_ASSOC);            
                    // Ensure there are at least 5 rows, adding empty rows if necessary
                    while (count($rows) < 5) {
                        $rows[] = ['id' => null, 'wpm' => null]; // Add an empty row
                    }
                    $count = 1;
                    foreach ($rows as $row) {
                        // Now to get the username from the id
                        $username = 'xxx';
                        if ($row['id'] !== null) {
                            $query = "SELECT * FROM user WHERE id = {$row['id']}";
                            $result = $mysqli->query($query);
                            $user = $result->fetch_assoc();
                            $username = ($user !== null) ? substr($user['username'], 0, 13) : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
                <div class = "statsContainer" style = "padding: 0; margin: 0">
                    <div id = "leaderboardheader" class = "notSignedIn">25 words  </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'words' AND wpm < 250 AND testTime = 25 ORDER BY wpm DESC LIMIT 5";
                    $result = $mysqli->query($query);
                    $rows = $result->fetch_all(MYSQLI_ASSOC);            
                    // Ensure there are at least 5 rows, adding empty rows if necessary
                    while (count($rows) < 5) {
                        $rows[] = ['id' => null, 'wpm' => null]; // Add an empty row
                    }
                    $count = 1;
                    foreach ($rows as $row) {
                        // Now to get the username from the id
                        $username = 'xxx';
                        if ($row['id'] !== null) {
                            $query = "SELECT * FROM user WHERE id = {$row['id']}";
                            $result = $mysqli->query($query);
                            $user = $result->fetch_assoc();
                            $username = ($user !== null) ? substr($user['username'], 0, 13) : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
                <div class = "statsContainer" style = "padding: 0; margin: 0">
                    <div id = "leaderboardheader" class = "notSignedIn">50 words  </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'words' AND wpm < 250 AND testTime = 50 ORDER BY wpm DESC LIMIT 5";
                    $result = $mysqli->query($query);
                    $rows = $result->fetch_all(MYSQLI_ASSOC);            
                    // Ensure there are at least 5 rows, adding empty rows if necessary
                    while (count($rows) < 5) {
                        $rows[] = ['id' => null, 'wpm' => null]; // Add an empty row
                    }
                    $count = 1;
                    foreach ($rows as $row) {
                        // Now to get the username from the id
                        $username = 'xxx';
                        if ($row['id'] !== null) {
                            $query = "SELECT * FROM user WHERE id = {$row['id']}";
                            $result = $mysqli->query($query);
                            $user = $result->fetch_assoc();
                            $username = ($user !== null) ? substr($user['username'], 0, 13) : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
                <div class = "statsContainer" style = "padding: 0; margin: 0">
                    <div id = "leaderboardheader" class = "notSignedIn">100 words  </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'words' AND wpm < 250 AND testTime = 100 ORDER BY wpm DESC LIMIT 5";
                    $result = $mysqli->query($query);
                    $rows = $result->fetch_all(MYSQLI_ASSOC);            
                    // Ensure there are at least 5 rows, adding empty rows if necessary
                    while (count($rows) < 5) {
                        $rows[] = ['id' => null, 'wpm' => null]; // Add an empty row
                    }
                    $count = 1;
                    foreach ($rows as $row) {
                        // Now to get the username from the id
                        $username = 'xxx';
                        if ($row['id'] !== null) {
                            $query = "SELECT * FROM user WHERE id = {$row['id']}";
                            $result = $mysqli->query($query);
                            $user = $result->fetch_assoc();
                            $username = ($user !== null) ? substr($user['username'], 0, 13) : '---';

                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
            </div>


            <div class = "results" style = "padding: 0 1rem">This Week</div>
            <div id = "displayStats" style= "margin: 3rem; padding 0;">
                <div class = "statsContainer" style = "padding: 0; margin: 0">
                    <div id = "leaderboardheader" class = "notSignedIn">15 seconds </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'time' AND wpm < 250 AND testTime = 15 AND date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ORDER BY wpm DESC LIMIT 5";
                    $result = $mysqli->query($query);
                    $rows = $result->fetch_all(MYSQLI_ASSOC);            
                    // Ensure there are at least 5 rows, adding empty rows if necessary
                    while (count($rows) < 5) {
                        $rows[] = ['id' => null, 'wpm' => null]; // Add an empty row
                    }
                    $count = 1;
                    foreach ($rows as $row) {
                        // Now to get the username from the id
                        $username = 'xxx';
                        if ($row['id'] !== null) {
                            $query = "SELECT * FROM user WHERE id = {$row['id']}";
                            $result = $mysqli->query($query);
                            $user = $result->fetch_assoc();
                            $username = ($user !== null) ? substr($user['username'], 0, 13) : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
                <div class = "statsContainer" style = "padding: 0; margin: 0">
                    <div id = "leaderboardheader" class = "notSignedIn">30 seconds  </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'time' AND wpm < 250 AND testTime = 30 AND date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ORDER BY wpm DESC LIMIT 5";
                    $result = $mysqli->query($query);
                    $rows = $result->fetch_all(MYSQLI_ASSOC);            
                    // Ensure there are at least 5 rows, adding empty rows if necessary
                    while (count($rows) < 5) {
                        $rows[] = ['id' => null, 'wpm' => null]; // Add an empty row
                    }
                    $count = 1;
                    foreach ($rows as $row) {
                        // Now to get the username from the id
                        $username = 'xxx';
                        if ($row['id'] !== null) {
                            $query = "SELECT * FROM user WHERE id = {$row['id']}";
                            $result = $mysqli->query($query);
                            $user = $result->fetch_assoc();
                            $username = ($user !== null) ? substr($user['username'], 0, 13) : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
                <div class = "statsContainer" style = "padding: 0; margin: 0">
                    <div id = "leaderboardheader" class = "notSignedIn">60 seconds  </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'time' AND wpm < 250 AND testTime = 60 AND date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ORDER BY wpm DESC LIMIT 5";
                    $result = $mysqli->query($query);
                    $rows = $result->fetch_all(MYSQLI_ASSOC);            
                    // Ensure there are at least 5 rows, adding empty rows if necessary
                    while (count($rows) < 5) {
                        $rows[] = ['id' => null, 'wpm' => null]; // Add an empty row
                    }
                    $count = 1;
                    foreach ($rows as $row) {
                        // Now to get the username from the id
                        $username = 'xxx';
                        if ($row['id'] !== null) {
                            $query = "SELECT * FROM user WHERE id = {$row['id']}";
                            $result = $mysqli->query($query);
                            $user = $result->fetch_assoc();
                            $username = ($user !== null) ? substr($user['username'], 0, 13) : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
                <div class = "statsContainer" style = "padding: 0; margin: 0">
                    <div id = "leaderboardheader" class = "notSignedIn">120 seconds  </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'time' AND wpm < 250 AND testTime = 120 AND date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ORDER BY wpm DESC LIMIT 5";
                    $result = $mysqli->query($query);
                    $rows = $result->fetch_all(MYSQLI_ASSOC);            
                    // Ensure there are at least 5 rows, adding empty rows if necessary
                    while (count($rows) < 5) {
                        $rows[] = ['id' => null, 'wpm' => null]; // Add an empty row
                    }
                    $count = 1;
                    foreach ($rows as $row) {
                        // Now to get the username from the id
                        $username = 'xxx';
                        if ($row['id'] !== null) {
                            $query = "SELECT * FROM user WHERE id = {$row['id']}";
                            $result = $mysqli->query($query);
                            $user = $result->fetch_assoc();
                            $username = ($user !== null) ? substr($user['username'], 0, 13) : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
            </div>
            <div id = "displayStats" style= "margin: 3rem; padding 0;"> 
                <div class = "statsContainer" style = "padding: 0; margin: 0">
                    <div id = "leaderboardheader" class = "notSignedIn">10 words </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'words' AND wpm < 250 AND testTime = 10 AND date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ORDER BY wpm DESC LIMIT 5";
                    $result = $mysqli->query($query);
                    $rows = $result->fetch_all(MYSQLI_ASSOC);            
                    // Ensure there are at least 5 rows, adding empty rows if necessary
                    while (count($rows) < 5) {
                        $rows[] = ['id' => null, 'wpm' => null]; // Add an empty row
                    }
                    $count = 1;
                    foreach ($rows as $row) {
                        // Now to get the username from the id
                        $username = 'xxx';
                        if ($row['id'] !== null) {
                            $query = "SELECT * FROM user WHERE id = {$row['id']}";
                            $result = $mysqli->query($query);
                            $user = $result->fetch_assoc();
                            $username = ($user !== null) ? substr($user['username'], 0, 13) : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
                <div class = "statsContainer" style = "padding: 0; margin: 0">
                    <div id = "leaderboardheader" class = "notSignedIn">25 words  </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'words' AND wpm < 250 AND testTime = 25 AND date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ORDER BY wpm DESC LIMIT 5";
                    $result = $mysqli->query($query);
                    $rows = $result->fetch_all(MYSQLI_ASSOC);            
                    // Ensure there are at least 5 rows, adding empty rows if necessary
                    while (count($rows) < 5) {
                        $rows[] = ['id' => null, 'wpm' => null]; // Add an empty row
                    }
                    $count = 1;
                    foreach ($rows as $row) {
                        // Now to get the username from the id
                        $username = 'xxx';
                        if ($row['id'] !== null) {
                            $query = "SELECT * FROM user WHERE id = {$row['id']}";
                            $result = $mysqli->query($query);
                            $user = $result->fetch_assoc();
                            $username = ($user !== null) ? substr($user['username'], 0, 13) : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
                <div class = "statsContainer" style = "padding: 0; margin: 0">
                    <div id = "leaderboardheader" class = "notSignedIn">50 words  </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'words' AND wpm < 250 AND testTime = 50 AND date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ORDER BY wpm DESC LIMIT 5";
                    $result = $mysqli->query($query);
                    $rows = $result->fetch_all(MYSQLI_ASSOC);            
                    // Ensure there are at least 5 rows, adding empty rows if necessary
                    while (count($rows) < 5) {
                        $rows[] = ['id' => null, 'wpm' => null]; // Add an empty row
                    }
                    $count = 1;
                    foreach ($rows as $row) {
                        // Now to get the username from the id
                        $username = 'xxx';
                        if ($row['id'] !== null) {
                            $query = "SELECT * FROM user WHERE id = {$row['id']}";
                            $result = $mysqli->query($query);
                            $user = $result->fetch_assoc();
                            $username = ($user !== null) ? substr($user['username'], 0, 13) : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
                <div class = "statsContainer" style = "padding: 0; margin: 0">
                    <div id = "leaderboardheader" class = "notSignedIn">100 words  </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'words' AND wpm < 250 AND testTime = 100 AND date >= DATE_SUB(NOW(), INTERVAL 7 DAY) ORDER BY wpm DESC LIMIT 5";
                    $result = $mysqli->query($query);
                    $rows = $result->fetch_all(MYSQLI_ASSOC);            
                    // Ensure there are at least 5 rows, adding empty rows if necessary
                    while (count($rows) < 5) {
                        $rows[] = ['id' => null, 'wpm' => null]; // Add an empty row
                    }
                    $count = 1;
                    foreach ($rows as $row) {
                        // Now to get the username from the id
                        $username = 'xxx';
                        if ($row['id'] !== null) {
                            $query = "SELECT * FROM user WHERE id = {$row['id']}";
                            $result = $mysqli->query($query);
                            $user = $result->fetch_assoc();
                            $username = ($user !== null) ? substr($user['username'], 0, 13) : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php include "./footer.php" ?>
    </form>
</body>

</html>