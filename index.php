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
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include "./head.php" ?>

<body class="main-body">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5JMV592" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div id="mainContent" style = "align-items: center;">
        <?php include "./nav.php" ?>

            <!-- Display if test not complete -->
          <div id="middle">
            <?php if (!isset($_GET["finish"])) { ?>
                <div id="cursor"></div>
                <div id="typingmode">
                <div class="modeStack">
                    <div>time</div>
                    <div id = "timesContainer" style="display: flex">
                        <div title = "15" class="typingModes" onclick="setCookie('typingMode', 'time', 30); changeTime(15)">15</div>
                        <div title = "30" class="typingModes" onclick="setCookie('typingMode', 'time', 30); changeTime(30)">30</div>
                        <div title = "60" class="typingModes" onclick="setCookie('typingMode', 'time', 30); changeTime(60)">60</div>
                        <div title = "120" class="typingModes" onclick="setCookie('typingMode', 'time', 30); changeTime(120)">120</div>
                    </div>
                </div>
                <div class="modeStack">
                    <div>words</div>
                    <div id = "wordsContainer" style="display: flex">
                        <div title = "10" class="typingModes" onclick="setCookie('typingMode', 'words', 30); changeWords(10)">10</div>
                        <div title = "25" class="typingModes" onclick="setCookie('typingMode', 'words', 30); changeWords(25)">25</div>
                        <div title = "50" class="typingModes" onclick="setCookie('typingMode', 'words', 30); changeWords(50)">50</div>
                        <div title = "100" class="typingModes" onclick="setCookie('typingMode', 'words', 30); changeWords(100)">100</div>
                    </div>
                </div>
                <div class="modeStack">
                    <div>difficulty</div>
                    <div id = "modesContainer" style="display: flex">
                        <div title = "easy" class="typingModes" onclick="changeMode('easy')">easy</div>
                        <div title = "hard" class="typingModes" onclick="changeMode('hard')">hard</div>
                    </div>
                </div>
            </div>
            <div id="testText">
                <div id="wordsWrapper"></div>
            </div>
            <div class="testRow">
                <textarea id="textInput" spellcheck="false" maxlength="16" autofocus></textarea>
                <div id="wpmDisplay">0 WPM</div>
                <div id="time"></div>
                <div id ="resetBox"><i id="restartTest"class="fa-solid fa-rotate" onclick="restart()"></i></div>
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
                    <h1 class="notSignedIn" id="preferenceHeader">Time<i class="fa-regular fa-hourglass-half"></i></i></i></h1>
                    <a class="results"><?= $_GET["testTime"] ?>s</a>
                </div>
            </div>
            <a id = "showRestart" href="index.php">play again<i class="fa-solid fa-backward"></i></a>
            <a id = "showRestart" href="login.php">track progress<i class="fa-solid fa-medal"></i></a>
            </div>
            <?php } ?>
        <?php include "./footer.php" ?>
    </div>
</body>

</html>
