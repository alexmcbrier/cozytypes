<?php
session_start();
//grabbing user session information (neccesary for staying signed in etc.)
if(isset($_COOKIE["email"]))
{
    $mysqli = require __DIR__ . "/config.php";
    $name = $_COOKIE["email"];
    //change to whatever
    $sql = "SELECT id FROM user WHERE email = '$name'";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    $_SESSION["user_id"] = $user["id"];
}
//executes when typing test has concluded
if (isset($_GET["finish"]))
{
    $_SESSION['wpm'] = $_GET["wpm"];
    $_SESSION['accuracy'] = $_GET["accuracy"];
    $_SESSION['testTime'] = $_GET["testTime"];
    header("Location: testFinished.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=TAG_ID"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments)};
          gtag('js', new Date());
          gtag('config', 'G-9W2ZHHJ7P5');
        </script>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5JMV592"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        
        <link rel="shortcut icon" type="image/x-icon" href="images\keyboard.ico" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>cozytypes</title>
        <meta name="description" content="A website designed to help and teach people to type. Play with friends, customize preferences, and improve your typing speed.">
        <meta name="author" content="alexmcbrier">
        <meta name="keywords" content="typing speed test, typing speedtest, typing test, speedtest, speed test, typing, test, typing-test, typing test, cozytypes, cozytype, cozy types, alex mcbrier, cosytypes, types, cozy, type, alexmcbrier, wpm, words per minute, typing website, minimalistic, custom typing test, customizable, asthetic, themes, new, learn to type, learn typing, practice, new typing site, new typing website, minimalist typing website, minimalistic typing website, minimalist typing test">
        <link rel="stylesheet" type="text/css" href="style.php">
        <script type = "text/javascript" src="script.js " defer ></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    </head>
    <body>
            <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5JMV592"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id ="mainContent">
        <div id = "top">
            <nav>
                    <li>CozyTypes</li>
                    <li><a id = "play" href="index.php">play</a></li>
                    <li><a href="login.php">profile</a></li>
                    <li><a href="preferences.php">preferences</a></li>
            </nav>
        </div>
        <div id = "cursor"></div>
        <div id = "middle">
            <div id = "typingmode">
                <div class = "modeStack">
                    <div class="modeHeader">time</div>
                    <div class = "individualMode">
                        <a class = "typingModes" onclick="changeTime(15)">15</a>
                        <div class = "typingModes" onclick="changeTime(30)">30</div>
                        <div class = "typingModes" onclick="changeTime(60)">60</div>
                        <div class = "typingModes" onclick="changeTime(120)">120</div>
                    </div>
                </div>
                <div class = "modeStack"> 
                    <div class="modeHeader">words</div>
                    <div class = "individualMode">
                        <div class = "typingModes" onclick="changeWords(10)">10</div>
                        <div class = "typingModes" onclick="changeWords(25)">25</div>
                        <div class = "typingModes" onclick="changeWords(50)">50</div>
                        <div class = "typingModes" onclick="changeWords(100)">100</div>
                    </div>
                </div>
                <div class = "modeStack"> 
                    <div class="modeHeader">difficulty</div>
                    <div class = "individualMode">
                        <div class = "typingModes" onclick="changeMode('easy')">easy</div>
                        <div class = "typingModes" onclick="changeMode('hard')">hard</div>
                    </div>
                </div>
            </div>
            <div id="typingArea">
                <div id="testText">
                <div id="wordsWrapper"></div>
            </div>
                <div id="testRow">
                    <textarea class = "row" id="textInput" spellcheck="false" maxlength = "16" autofocus></textarea>
                    <div class = "row" id="wpmDisplay">0 WPM</div>
                    <div class = "row" id="time"></div>
                    <img class = "row" id="restartTest" onclick="restart()"src="images/refresh-button.png">
                </div>
            </div>
        </div>
        </div>
    </body>
</html>
