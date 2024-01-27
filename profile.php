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
    $query = "SELECT * FROM typingtest WHERE id = {$_SESSION["user_id"]}" AND mode = "time";
    $result = $mysqli->query($query);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    //15s
    $sumWpm = 0;
    $sumAccuracy = 0;
    $count = 0;
    $maxWpm = 0;
    $accuracyForMaxWpm = 0;
    foreach ($rows as $row) {
        if ($row['wpm'] > $maxWpm) {
            $maxWpm = $row['wpm'];
            $accuracyForMaxWpm = $row['accuracy'];
        }
        $count++;
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

<body class="main-body">
    <div id="sidebar">
        <i style="cursor: pointer" onclick="openSidebar()" id = "sidebarIcon" class="fa-solid fa-chevron-left"></i>
    </div>
    <div id="mainContent">
        <?php include "./nav.php" ?>
        <div id="middle">
            <div id="displayStats">
                <div class="statsContainer"> 
                    <h1 class="notSignedIn" id="preferenceHeader"><?= htmlspecialchars($user["username"]) ?><i class="fa-regular fa-user"></i></h1>
                </div>
                <div class="statsContainer">
                    <h1 class="notSignedIn" id="preferenceHeader">total tests completed<i class="fa-solid fa-chart-line"></i></h1>
                    <a class="results"><?= $totalTests ?> tests</a>
                </div>
                <div class="statsContainer">
                    <h1 class="notSignedIn" id="preferenceHeader">highest wpm<i class="fa-solid fa-crown"></i></h1>
                    <a class="results"><?= $wpmPR ?> wpm</a>
                </div>
            </div>
            <div id = "logo">personal bests</div>
            <div id="displayStats">
                <div class="statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">15s</div>
                    <div class = "results">wpm <span style = "color: var(--testText)"><?= $maxWpm ?></span></div>
                    <div class = "results">accuracy <span style = "color: var(--testText)"><?= $accuracyForMaxWpm ?></span></div>
                    <div class = "results">tests <span style = "color: var(--testText)"><?= $count ?></span></div>
                </div>
            </div>
            <a id = "showRestart" class="notSignedIn" href="logout.php">logout<i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
        <?php include "./footer.php" ?>
    </div>
</body>

</html>
