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
<html>
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="images\keyboard.ico" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>cozytypes</title>
        <link rel="stylesheet" type="text/css" href="style.php">
        <script type = "text/javascript" src="script.js " defer ></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    </head>
    <body>
    <nav>
            <li>CozyTypes</li>
            <li><a id = "play" href="index.php">play</a></li>
            <li><a href="login.php">profile</a></li>
            <li><a href="preferences.php">preferences</a></li>
            <li><a href="learn.php">learn</a></li>
    </nav>
        <div id = "cursor"></div>
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
        </div>
        <div id="testText"></div>
        <div id="typingArea">
            <div id="testText">
            <div id="wordsWrapper"></div>
            </div>
            <div id="testRow">
                <textarea class = "row" id="textInput" spellcheck="false" maxlength = "10" autofocus></textarea>
                <div class = "row" id="wpmDisplay">0 WPM</div>
                <div class = "row" id="time"></div>
                <img class = "row" id="restartTest" onclick="restart()"src="images/refresh-button.png">
            </div>
        </div>
    </body>
</html>
