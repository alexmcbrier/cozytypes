<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/config.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}
else //if not logged in but somehow managed to get to this page (Neccesary)
{
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="images\keyboard.ico" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>cozytype</title>
        <link rel="stylesheet" href="style.php">
        <script src="script.js" defer></script>
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
        <form id="profileTypingArea">
                    <h1 id = "showUsername" >Hello, <?= htmlspecialchars($user["username"]) ?></h1>
                    <a id = "logoutButton" href="logout.php">logout</a>
        </form>
    </body>
</html>