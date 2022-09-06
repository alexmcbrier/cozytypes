<?php
session_start();
$wpm = $_SESSION['wpm'];
$accuracy = $_SESSION['accuracy'];
$testTime = $_SESSION['testTime'];
if (isset($_SESSION["user_id"])) {
    //neccessary to setup
    $mysqli = require __DIR__ . "/config.php";
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
    
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
        <link rel="stylesheet" href="style.php">
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
        <div id="displayStats">
                <div class = "statsRow" ><?= $wpm ?> wpm</div>
                <div class = "statsRow" ><?= $accuracy ?>% accuracy</div>
                <div class = "statsRow" ><?= $testTime ?> s</div>
        </div>
    </body>
</html>