<?php
session_start();
//grabbing user session information (neccesary for staying signed in etc.)
if (isset($_COOKIE["email"])) {
    $mysqli = require __DIR__ . "/config.php";
    $name = $_COOKIE["email"];
    //change to whatever
    $sql = "SELECT id FROM user WHERE email = '$name'";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    $_SESSION["user_id"] = $user["id"];
}
//executes when typing test has concluded
?>
<!DOCTYPE html>
<html lang="en">

<?php include "./head.php" ?>

<body class="main-body">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5JMV592" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="cursor"></div>
    <div id="mainContent">
        <?php include "./nav.php" ?>
        <?php if (!isset($_GET["finish"])) { ?>
            <!-- Display if test not complete -->

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
                <img id="restartTest" onclick="restart()" src="images/refresh-button.png">
            </div>

            <a id="footer" href="https://github.com/alexmcbrier/cozytypes">
                <&sol;> github
            </a>
        <?php } else if (isset($_GET["finish"])) { ?>
            <!-- Display if test IS complete -->
            <div id="middle">
                <div id="displayStats">
                    <div class="statsRow"><?= $_GET["wpm"] ?>wpm</div>
                    <div class="statsRow"><?= $_GET["accuracy"] ?>% accuracy</div>
                    <div class="statsRow"><?= $_GET["testTime"] ?>s</div>
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>