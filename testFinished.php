<?php
session_start();
$wpm = $_SESSION['wpm'];
$accuracy = $_SESSION['accuracy'];
$testTime = $_SESSION['testTime'];
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="images\keyboard.ico" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>cozytypes</title>
        <link rel="stylesheet" href="style.css">
        <script type = "text/javascript" src="script.js" defer ></script>
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
        <div id="typingArea">
            <div class ="rowContainer">
                <div class = "statsHeader" >wpm</div>
                <div class = "row" ><?= $wpm ?> wpm</div>
                <div class = "statsHeader" >accuracy</div>
                <div class = "row" ><?= $accuracy ?>%</div>
                <div class = "statsHeader" >Time</div>
                <div class = "row" ><?= $testTime ?>s</div>
            </div>
        </div>
    </body>
</html>