<?php
session_start();
if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/config.php";
    //user table
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    $font = htmlspecialchars($user["fontSize"]);
    $id = htmlspecialchars($user["id"]);
    $font = htmlspecialchars($user["fontSize"]);
    $theme = htmlspecialchars($user["theme"]);
    $wpmPR = htmlspecialchars($user["wpm"]);
    $totalTests = htmlspecialchars($user["testsTaken"]);
    //typingtest table
    // Fetch user data from the database

    //find total tests and find highest wpm
    $query = "SELECT * FROM typingtest WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($query);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $totalMaxWpm = 0;
    $totalCount = 0;
    foreach ($rows as $row) {
        if ($row['wpm'] > $totalMaxWpm) {
            $totalMaxWpm = $row['wpm'];
        }
        $totalCount++;
        // Update for additional columns as needed
    }
    //get User account created created
    $query = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($query);
    $user = $result->fetch_assoc();
    $dateCreated = new DateTime($user["dateCreated"]);
    // Format the date as "F j, Y"
    $formattedDate = $dateCreated->format('F j, Y');
    //15s stats
    $query = "SELECT * FROM typingtest WHERE id = {$_SESSION["user_id"]} AND mode = 'time' AND testTime = 15";
    $result = $mysqli->query($query);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $count15s = 0;
    $maxWpm15s = 0;
    $accuracyForMaxWpm15s = 0;
    foreach ($rows as $row) {
        if ($row['wpm'] > $maxWpm15s) {
            $maxWpm15s = $row['wpm'];
            $accuracyForMaxWpm15s = $row['accuracy'];
        }
        $count15s++;
        // Update for additional columns as needed
    }

    //30s stats
    $query = "SELECT * FROM typingtest WHERE id = {$_SESSION["user_id"]} AND mode = 'time' AND testTime = 30";
    $result = $mysqli->query($query);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $count30s = 0;
    $maxWpm30s = 0;
    $accuracyForMaxWpm30s = 0;
    foreach ($rows as $row) {
        if ($row['wpm'] > $maxWpm30s) {
            $maxWpm30s = $row['wpm'];
            $accuracyForMaxWpm30s = $row['accuracy'];
        }
        $count30s++;
        // Update for additional columns as needed
    }

    //60s stats
    $query = "SELECT * FROM typingtest WHERE id = {$_SESSION["user_id"]} AND mode = 'time' AND testTime = 60";
    $result = $mysqli->query($query);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $count60s = 0;
    $maxWpm60s = 0;
    $accuracyForMaxWpm60s = 0;
    foreach ($rows as $row) {
        if ($row['wpm'] > $maxWpm60s) {
            $maxWpm60s = $row['wpm'];
            $accuracyForMaxWpm60s = $row['accuracy'];
        }
        $count60s++;
        // Update for additional columns as needed
    }
    
    //120s stats
    $query = "SELECT * FROM typingtest WHERE id = {$_SESSION["user_id"]} AND mode = 'time' AND testTime = 120";
    $result = $mysqli->query($query);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $count120s = 0;
    $maxWpm120s = 0;
    $accuracyForMaxWpm120s = 0;
    foreach ($rows as $row) {
        if ($row['wpm'] > $maxWpm120s) {
            $maxWpm120s = $row['wpm'];
            $accuracyForMaxWpm120s = $row['accuracy'];
        }
        $count120s++;
        // Update for additional columns as needed
    }

    //10w stats
    $query = "SELECT * FROM typingtest WHERE id = {$_SESSION["user_id"]} AND mode = 'words' AND testTime = 10";
    $result = $mysqli->query($query);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $count10w = 0;
    $maxWpm10w = 0;
    $accuracyForMaxWpm10w = 0;
    foreach ($rows as $row) {
        if ($row['wpm'] > $maxWpm10w) {
            $maxWpm10w = $row['wpm'];
            $accuracyForMaxWpm10w = $row['accuracy'];
        }
        $count10w++;
        // Update for additional columns as needed
    }

    //25w stats
    $query = "SELECT * FROM typingtest WHERE id = {$_SESSION["user_id"]} AND mode = 'words' AND testTime = 25";
    $result = $mysqli->query($query);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $count25w = 0;
    $maxWpm25w = 0;
    $accuracyForMaxWpm25w = 0;
    foreach ($rows as $row) {
        if ($row['wpm'] > $maxWpm25w) {
            $maxWpm25w = $row['wpm'];
            $accuracyForMaxWpm25w = $row['accuracy'];
        }
        $count25w++;
        // Update for additional columns as needed
    }

    //50w stats
    $query = "SELECT * FROM typingtest WHERE id = {$_SESSION["user_id"]} AND mode = 'words' AND testTime = 50";
    $result = $mysqli->query($query);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $count50w = 0;
    $maxWpm50w = 0;
    $accuracyForMaxWpm50w = 0;
    foreach ($rows as $row) {
        if ($row['wpm'] > $maxWpm50w) {
            $maxWpm50w = $row['wpm'];
            $accuracyForMaxWpm50w = $row['accuracy'];
        }
        $count50w++;
        // Update for additional columns as needed
    }
    
    //100w stats
    $query = "SELECT * FROM typingtest WHERE id = {$_SESSION["user_id"]} AND mode = 'words' AND testTime = 100";
    $result = $mysqli->query($query);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $count100w = 0;
    $maxWpm50w = 0;
    $accuracyForMaxWpm100w = 0;
    foreach ($rows as $row) {
        if ($row['wpm'] > $maxWpm100w) {
            $maxWpm100w = $row['wpm'];
            $accuracyForMaxWpm50w = $row['accuracy'];
        }
        $count100w++;
        // Update for additional columns as needed
    }


} else //if not logged in but somehow managed to get to this page (Neccesary)
{
    header("Location: login");
}
?>
<!DOCTYPE html>
<html>
<?php include "./head2.php" ?>
<head>
<title>profile | cozytypes</title>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9923722164132738"
     crossorigin="anonymous"></script>
</head>
<body class="main-body">
    <div id="sidebar">
        <i style="cursor: pointer" onclick="openSidebar()" id = "sidebarIcon" class="fa-solid fa-chevron-left"></i>
    </div>
    <form id="mainContent" method="POST" action="preferences">
        <?php include "./nav.php" ?>
        <div id="middle" style = "width: 100%">
            <div id="displayStats">
                <div class="statsContainer"> 
                    <h1 class="notSignedIn" id="preferenceHeader"><?= htmlspecialchars($user["username"]) ?><i class="fa-regular fa-user"></i></h1>
                    <a class="profileValues">member since <?= $formattedDate ?></a>
                </div>
                <div class="statsContainer">
                    <h1 class="notSignedIn" id="preferenceHeader">total tests completed<i class="fa-solid fa-chart-line"></i></h1>
                    <a class="profileValues"><?= $totalCount ?> tests</a>
                </div>
                <div class="statsContainer">
                    <h1 class="notSignedIn" id="preferenceHeader">highest wpm<i class="fa-solid fa-crown"></i></h1>
                    <a class="profileValues"><?= $totalMaxWpm ?> wpm</a>
                </div>
            </div>
            <div id = "showSignIn" style = "font-weight: bold; padding:0rem 2rem;" >personal bests<i class="fa-solid fa-medal"></i></div>
            <div id="displayStats">
                <div class="statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">15 seconds  </div>
                    <div class = "profileValues">wpm | <span style = "color: var(--testText)"><?= $maxWpm15s ?></span></div>
                    <div class = "profileValues">accuracy | <span style = "color: var(--testText)"><?= $accuracyForMaxWpm15s ?></span></div>
                    <div class = "profileValues">tests | <span style = "color: var(--testText)"><?= $count15s ?></span></div>
                </div>
                <div class="statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">30 seconds  </div>
                    <div class = "profileValues">wpm | <span style = "color: var(--testText)"><?= $maxWpm30s ?></span></div>
                    <div class = "profileValues">accuracy | <span style = "color: var(--testText)"><?= $accuracyForMaxWpm30s ?></span></div>
                    <div class = "profileValues">tests | <span style = "color: var(--testText)"><?= $count30s ?></span></div>
                </div>
                <div class="statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">60 seconds  </div>
                    <div class = "profileValues">wpm | <span style = "color: var(--testText)"><?= $maxWpm60s ?></span></div>
                    <div class = "profileValues">accuracy | <span style = "color: var(--testText)"><?= $accuracyForMaxWpm60s ?></span></div>
                    <div class = "profileValues">tests | <span style = "color: var(--testText)"><?= $count60s ?></span></div>
                </div>
                <div class="statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">120 seconds </div>
                    <div class = "profileValues">wpm | <span style = "color: var(--testText)"><?= $maxWpm120s ?></span></div>
                    <div class = "profileValues">accuracy | <span style = "color: var(--testText)"><?= $accuracyForMaxWpm120s ?></span></div>
                    <div class = "profileValues">tests | <span style = "color: var(--testText)"><?= $count120s ?></span></div>
                </div>
            </div>
            <div id="displayStats">
                <div class="statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">10 words    </div>
                    <div class = "profileValues">wpm | <span style = "color: var(--testText)"><?= $maxWpm10w ?></span></div>
                    <div class = "profileValues">accuracy | <span style = "color: var(--testText)"><?= $accuracyForMaxWpm10w ?></span></div>
                    <div class = "profileValues">tests | <span style = "color: var(--testText)"><?= $count10w ?></span></div>
                </div>
                <div class="statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">25 words    </div>
                    <div class = "profileValues">wpm | <span style = "color: var(--testText)"><?= $maxWpm25w ?></span></div>
                    <div class = "profileValues">accuracy | <span style = "color: var(--testText)"><?= $accuracyForMaxWpm25w ?></span></div>
                    <div class = "profileValues">tests | <span style = "color: var(--testText)"><?= $count25w ?></span></div>
                </div>
                <div class="statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">50 words    </div>
                    <div class = "profileValues">wpm | <span style = "color: var(--testText)"><?= $maxWpm50w ?></span></div>
                    <div class = "profileValues">accuracy | <span style = "color: var(--testText)"><?= $accuracyForMaxWpm50w ?></span></div>
                    <div class = "profileValues">tests | <span style = "color: var(--testText)"><?= $count50w ?></span></div>
                </div>
                <div class="statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">100 words   </div>
                    <div class = "profileValues">wpm | <span style = "color: var(--testText)"><?= $maxWpm100w ?></span></div>
                    <div class = "profileValues">accuracy | <span style = "color: var(--testText)"><?= $accuracyForMaxWpm100w ?></span></div>
                    <div class = "profileValues">tests | <span style = "color: var(--testText)"><?= $count100w ?></span></div>
                </div>
            </div>
            <a id = "showRestart" class="notSignedIn" href="logout.php" style = "font-weight: bold; padding:0rem 2rem;">logout<i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
        <?php include "./footer.php" ?>
    </form>
</body>

</html>
