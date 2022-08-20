<?php
session_start();
if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/config.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    $id = ($user["id"]);
    //for some reason the id is not working for the WHERE
    
}

function changeFontSize($size) 
{
  //if signed in
  if (isset($_SESSION["user_id"])) {
    $id = ($user["id"]);
    $link = mysqli_connect("localhost", "alexmcbrier", "AMcB0807", "cozytypes");
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());

    }
    $sql = "UPDATE user SET fontSize=$size WHERE id=19";
    if(mysqli_query($link, $sql)){
        echo "Record was updated successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " 
                                . mysqli_error($link);

    } 

    mysqli_close($link);
    header("location: index.php");
}
  else
  {
    header("location: index.php");

  }
}
  if (isset($_GET['size1'])) {
    $size = 1;
    changeFontSize($size);
  }
  if (isset($_GET['size2'])) {
    $size = 1.5;
    changeFontSize($size);
  }
  if (isset($_GET['size3'])) {
    $size = 2;
    changeFontSize($size);
  }
  if (isset($_GET['size4'])) {
    $size = 2.5;
    changeFontSize($size);
  }
  if (isset($_GET['size5'])) {
    $size = 3;
    changeFontSize($size);
  }
  if (isset($_GET['lexendDeca'])) {
    $font = 3;
    changeFontSize($size);
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
        <form id="typingArea" method="POST" action="preferences.php">
            <h1 id="preferenceHeader">size</h1>
            <div class ="rowContainer">
                <a class = "preferencesRow" href="preferences.php?size1=true">1</a>
                <a class = "preferencesRow" href="preferences.php?size2=true">1.5</a>
                <a class = "preferencesRow" href="preferences.php?size3=true">2</a>
                <a class = "preferencesRow" href="preferences.php?size4=true">2.5</a>
                <a class = "preferencesRow" href="preferences.php?size5=true">3</a>
            </div>
            <h1 id="preferenceHeader">fonts</h1>
            <div class ="rowContainer">
                <div class = "preferencesRow">arial</div>
                <div class = "preferencesRow">times new roman</div>
                <div class = "preferencesRow">lexend deca</div>
            </div>
</form>
    </body>
</html>
