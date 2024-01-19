<?php
session_start();
//grabbing user session information (neccesary for staying signed in etc.)
if (isset($_COOKIE["id"])) {
    $mysqli = require __DIR__ . "/config.php";
    $hash = $_COOKIE["id"];
    //change to whatever
    $sql = "SELECT id FROM user WHERE password_hash = '$hash'";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    $_SESSION["user_id"] = $user["id"];
}
if (isset($_GET["finish"]))
{
    $wpm = $_GET["wpm"];
    if (isset($_SESSION["user_id"])) {
        $mysqli = require __DIR__ . "/config.php";
        $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();
        $wpmPR = htmlspecialchars($user["wpm"]);
        $id = ($user["id"]);
        //if the wpm is higher update
        if ($wpm > $wpmPR)
        {
            $sql = "UPDATE user SET wpm='$wpm' WHERE id=$id";
            if ($mysqli->query($sql) === TRUE) {
            } else {
            }
        }
        //update total tests taken
        $testsTaken  = $user["testsTaken"] + 1;
        $sql = "UPDATE user SET testsTaken ='$testsTaken' WHERE id=$id";
        if ($mysqli->query($sql) === TRUE) {
        } else {
        }
    }
    $mysqli = require __DIR__ . "/config.php";
    $sql = "INSERT INTO TypingTest (date, mode, duration, account_id, session_id, wpm) 
                VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->stmt_init();
    if (! $stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error);
    }
    $date = '2011-03-14 17:00:01';
    $mode = 'time';
    $duration = 12;
    $account_id = 234;
    $session_id = 2345;
    $wpm = 120;
    $stmt->bind_param("ssiiii", $date, $mode, $duration, $account_id, $session_id, $wpm);
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include "./head.php" ?>
<script src="script.js"></script>
<body class="main-body">
    <?php if (!isset($_GET["finish"])) { ?> <!-- only show if taking test, not complete -->
        <div id="cursor"></div>
    <?php } ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5JMV592" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <i class="fa-solid fa-circle-notch" id="loadingIcon"></i>
    <div id="mainContent">
        <?php include "./nav.php" ?>
        <script type="text/javascript">
        function fadeOut(id)
        {
            document.getElementById(id).style.opacity = 0;
            document.getElementById(id).style.display = 'none';
            document.getElementById('middle').style.opacity = '100%';
            document.getElementById('footer').style.opacity = '100%';
            document.getElementById('middle').style.filter = 'none';
            document.getElementById('footer').style.filter = 'none';
        }
        $(window).load(function(){
            // Page is loaded, fade out the loading animation
            fadeOut('loadingIcon');
            loadPreferences();
            newQuote();
            zoomwait()
        });
        document.body.onLoad = refresh();
        document.body.onresize = function() { zoomwait() };
    </script>
        <!-- Display if test not complete -->
        <div id="middle" class = "blur">
        <?php if (!isset($_GET["finish"])) { ?>
            <div id="typingmode">
            <div class="modeStack">
                <div>time</div>
                <div id = "timesContainer" style="display: flex">
                    <div class="typingModes" onclick="setPreference('typingMode', 'time'); setPreference('time', 15); restart();">15</div>
                    <div class="typingModes" onclick="setPreference('typingMode', 'time'); setPreference('time', 30); restart();">30</div>
                    <div class="typingModes" onclick="setPreference('typingMode', 'time'); setPreference('time', 60); restart();">60</div>
                    <div class="typingModes" onclick="setPreference('typingMode', 'time'); setPreference('time', 120); restart();">120</div>
                </div>
            </div>
            <div class="modeStack">
                <div>words</div>
                <div id = "wordsContainer" style="display: flex">
                    <div class="typingModes" onclick="setPreference('typingMode', 'words'); setPreference('words', 10); restart();">10</div>
                    <div class="typingModes" onclick="setPreference('typingMode', 'words'); setPreference('words', 25); restart();">25</div>
                    <div class="typingModes" onclick="setPreference('typingMode', 'words'); setPreference('words', 50); restart();">50</div>
                    <div class="typingModes" onclick="setPreference('typingMode', 'words'); setPreference('words', 100); restart();">100</div>
                </div>
            </div>
            <div class="modeStack">
                <div>difficulty</div>
                <div id = "modesContainer" style="display: flex">
                    <div class="typingModes" onclick="setPreference('mode', 'easy'); restart()">easy</div>
                    <div class="typingModes" onclick="setPreference('mode', 'hard'); restart()">hard</div>
                </div>
            </div>
        </div>
        <div id="time" class = "testItem" ></div>
        <div id="testText">
            <textarea id="textInput" spellcheck="false" autofocus></textarea>
            <div id="wordsWrapper"></div>
        </div>
        <div class="testRow">
            <div id ="resetBox" class = "testItem"><i id="restartTest"class="fa-solid fa-rotate" onclick="restart()"></i></div>
        </div>
        <div class="testRow">
            <div id="wpmDisplay" class = "testItem" >0 wpm</div>
        </div>
        </div>
        <?php } else if (isset($_GET["finish"])) { ?>
        <!-- Display if test IS complete -->
        <div id="displayStats">
            <div class="statsContainer">
                <h1 class="notSignedIn" id="preferenceHeader">Words Per Minute<i class="fa-solid fa-clock-rotate-left"></i></h1>
                <a class="results"><?= $_GET["wpm"] ?></a>
            </div>
            <div class="statsContainer">
                <h1 class="notSignedIn" id="preferenceHeader">Accuracy<i class="fa-solid fa-crosshairs"></i></h1>
                <a class="results"><?= $_GET["accuracy"] ?>%</a>
            </div>
            <div class="statsContainer">
                <h1 class="notSignedIn" id="preferenceHeader"><?= $_GET["mode"] ?><i class="fa-regular fa-hourglass-half"></i></h1>
                <a class="results"><?= $_GET["testTime"] ?></a>
            </div>
        </div>
        <a id = "showRestart" href="https://cozytypes.com/">play again<i class="fa-solid fa-backward"></i></a>
        <a id = "showRestart" href="login">track progress<i class="fa-solid fa-medal"></i></a>
        </div>
        <?php } ?>
        <?php include "./footer.php"?>
    </div>
</body>

</html>
