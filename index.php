<?php
session_start();
if(isset($_COOKIE["rememberMe"]))
{
    $mysqli = require __DIR__ . "/config.php";
    $name = $_COOKIE["rememberMe"];
    //change to whatever
    $sql = "SELECT id FROM user WHERE email = '$name'";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    $_SESSION["user_id"] = $user["id"];
}
if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/config.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    $font = htmlspecialchars($user["fontSize"]);
    $id = htmlspecialchars($user["id"]);
    $font = htmlspecialchars($user["fontSize"]);
    $theme = htmlspecialchars($user["theme"]);
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
        <div id="typingArea">
            <div id="testText" style="font-size:<?php echo $font; ?>rem;"></div>
            <div id="testRow">
                <textarea class = "row" id="textInput" autofocus></textarea>
                <div class = "row" id="wpmDisplay">0 WPM</div>
                <div class = "row" id="time"></div>
                <img class = "row" id="restartTest" onclick="restart()"src="images/refresh-button.png">
            </div>
        </div>
    </body>
</html>