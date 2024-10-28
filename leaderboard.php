<?php
session_start();
$mysqli = require __DIR__ . "/config.php";

?>
<!DOCTYPE html>
<html>
<?php include "./head2.php" ?>
<head>
<title>leaderboard | cozytypes</title>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9923722164132738"
     crossorigin="anonymous"></script>
</head>
<body>    <!-- class main body makes no scroll bar-->
    <form id="mainContent" method="POST" action="preferences">
        <?php include "./nav.php" ?>
        <div id="middle" style = "width: 100%">
            <div id = "showSignIn" style = "font-weight: bold; padding:0rem 2rem;" >Leaderboard<i class="fa-solid fa-crown"></i></div>
            <div class = "profileValues" style = "padding: 0 1rem">must have an account to be on the leaderboard</div>
            <div class = "profileValues" style = "padding: 0 1rem">All Time</div>
            <div id = "displayStats">
                <div class = "statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">15 seconds </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'time' AND testTime = 15 ORDER BY wpm DESC LIMIT 5";
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
                            $username = ($user !== null) ? $user['username'] : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
                <div class = "statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">30 seconds  </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'time' AND testTime = 30 ORDER BY wpm DESC LIMIT 5";
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
                            $username = ($user !== null) ? $user['username'] : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
                <div class = "statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">60 seconds  </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'time' AND testTime = 60 ORDER BY wpm DESC LIMIT 5";
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
                            $username = ($user !== null) ? $user['username'] : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
                <div class = "statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">120 seconds  </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'time' AND testTime = 120 ORDER BY wpm DESC LIMIT 5";
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
                            $username = ($user !== null) ? $user['username'] : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
            </div>

            <div id = "displayStats">
                <div class = "statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">10 words </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'words' AND testTime = 10 ORDER BY wpm DESC LIMIT 5";
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
                            $username = ($user !== null) ? $user['username'] : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
                <div class = "statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">25 words  </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'words' AND testTime = 25 ORDER BY wpm DESC LIMIT 5";
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
                            $username = ($user !== null) ? $user['username'] : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
                <div class = "statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">50 words  </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'words' AND testTime = 50 ORDER BY wpm DESC LIMIT 5";
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
                            $username = ($user !== null) ? $user['username'] : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
                <div class = "statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">100 words  </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'words' AND testTime = 100 ORDER BY wpm DESC LIMIT 5";
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
                            $username = ($user !== null) ? $user['username'] : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
            </div>


            <div class = "profileValues" style = "padding: 0 1rem">This Week</div>
            <div id = "displayStats">
                <div class = "statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">15 seconds </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'time' AND testTime = 15 ORDER BY wpm DESC LIMIT 5";
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
                            $username = ($user !== null) ? $user['username'] : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
                <div class = "statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">30 seconds  </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'time' AND testTime = 30 ORDER BY wpm DESC LIMIT 5";
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
                            $username = ($user !== null) ? $user['username'] : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
                <div class = "statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">60 seconds  </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'time' AND testTime = 60 ORDER BY wpm DESC LIMIT 5";
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
                            $username = ($user !== null) ? $user['username'] : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
                <div class = "statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">120 seconds  </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'time' AND testTime = 120 ORDER BY wpm DESC LIMIT 5";
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
                            $username = ($user !== null) ? $user['username'] : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
            </div>

            <div id = "displayStats">
                <div class = "statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">10 words </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'words' AND testTime = 10 ORDER BY wpm DESC LIMIT 5";
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
                            $username = ($user !== null) ? $user['username'] : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
                <div class = "statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">25 words  </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'words' AND testTime = 25 ORDER BY wpm DESC LIMIT 5";
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
                            $username = ($user !== null) ? $user['username'] : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
                <div class = "statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">50 words  </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'words' AND testTime = 50 ORDER BY wpm DESC LIMIT 5";
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
                            $username = ($user !== null) ? $user['username'] : '---';
                        }

                        $wpm = ($row['wpm'] !== null) ? $row['wpm']: '---';
                        echo '<div class="profileValues">' . $count . '. ' . $username . ' | ' . $wpm . '</div>';
                        $count++;
                    }
                    ?>
                </div>
                <div class = "statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">100 words  </div>
                    <?php
                    $query = "SELECT * FROM typingtest WHERE id IS NOT NULL AND mode = 'words' AND testTime = 100 ORDER BY wpm DESC LIMIT 5";
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
                            $username = ($user !== null) ? $user['username'] : '---';
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