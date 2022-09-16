
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
    //neccessary to setup
    $mysqli = require __DIR__ . "/config.php";
   
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
           
    $result = $mysqli->query($sql);
   
    $user = $result->fetch_assoc();
 
    //change
    $id = ($user["id"]);
    $link = require __DIR__ . "/config.php";
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
 
    }
    $sql = "UPDATE user SET fontSize=$size WHERE id=$id";
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
function changeTheme($theme)
{
   //if signed in
   if (isset($_SESSION["user_id"])) {
    //neccessary to setup
    $mysqli = require __DIR__ . "/config.php";
 
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
           
    $result = $mysqli->query($sql);
   
    $user = $result->fetch_assoc();
 
    //theme changing
    $id = ($user["id"]);
    $link = require __DIR__ . "/config.php";
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
 
    }
    $sql = "UPDATE user SET theme='$theme' WHERE id=$id";
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
  //themes
  if (isset($_GET['theme-olivia'])) {
    $theme = "olivia";
    changeTheme($theme);
  }
  if (isset($_GET['theme-dracula'])) {
    $theme = "dracula";
    changeTheme($theme);
  }
  if (isset($_GET['theme-8008'])) {
    $theme = "8008";
    changeTheme($theme);
  }
  if (isset($_GET['theme-mizu'])) {
    $theme = "mizu";
    changeTheme($theme);
  }
  if (isset($_GET['theme-striker'])) {
    $theme = "striker";
    changeTheme($theme);
  }
  if (isset($_GET['theme-blueberry'])) {
    $theme = "blueberry";
    changeTheme($theme);
  }
  if (isset($_GET['theme-creamsicle'])) {
    $theme = "creamsicle";
    changeTheme($theme);
  }
  if (isset($_GET['theme-botanical'])) {
    $theme = "botanical";
    changeTheme($theme);
  }
  if (isset($_GET['theme-luna'])) {
    $theme = "luna";
    changeTheme($theme);
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
        <script type = "text/javascript" src="themeChange.js" defer ></script>
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
        <form id="preferencesArea" method="POST" action="preferences.php">
            <h1 class = "notSignedIn" id="preferenceHeader">size</h1>
            <div class ="rowContainer">
                <a class = "preferencesRow" href="preferences.php?size1=true">1</a>
                <a class = "preferencesRow" href="preferences.php?size2=true">1.5</a>
                <a class = "preferencesRow" href="preferences.php?size3=true">2</a>
                <a class = "preferencesRow" href="preferences.php?size4=true">2.5</a>
                <a class = "preferencesRow" href="preferences.php?size5=true">3</a>
            </div>
            <h1 class = "notSignedIn" id="preferenceHeader">font</h1>
            <div class ="rowContainer">
                <a class = "preferencesRow" href="preferences.php?size1=true">arial</a>
                <a class = "preferencesRow" href="preferences.php?size2=true">helvetica</a>
                <a class = "preferencesRow" href="preferences.php?size3=true">futura</a>
                <a class = "preferencesRow" href="preferences.php?size4=true">lexendDeca</a>
                <a class = "preferencesRow" href="preferences.php?size5=true">verdana</a>
            </div>
            <h1 id="preferenceHeader">theme</h1>
            <div class ="rowContainer">
                <a class = "themesRow" id = "theme-olivia" href="preferences.php?theme-olivia=true">olivia</a>
                <a class = "themesRow" id = "theme-dracula" href="preferences.php?theme-dracula=true">dracula</a>
                <a class = "themesRow" id = "theme-8008" href="preferences.php?theme-8008=true">8008</a>
                <a class = "themesRow" id = "theme-mizu" href="preferences.php?theme-mizu=true">mizu</a>
                <a class = "themesRow" id = "theme-striker" href="preferences.php?theme-striker=true">striker</a>
                <a class = "themesRow" id = "theme-blueberry" href="preferences.php?theme-blueberry=true">blueberry</a>
                <a class = "themesRow" id = "theme-creamsicle" href="preferences.php?theme-creamsicle=true">creamsicle</a>
                <a class = "themesRow" id = "theme-botanical" href="preferences.php?theme-botanical=true">botanical</a>
                <a class = "themesRow" id = "theme-luna" href="preferences.php?theme-luna=true">luna</a>
            </div>
            
</form>
    </body>
</html>
 
