
<?php
session_start();
function changePreference($type, $value)
{
   if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/config.php";
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    $id = ($user["id"]);
    $link = require __DIR__ . "/config.php";
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $sql = "UPDATE user SET $type='$value' WHERE id=$id";
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
  if (isset($_GET['change'])) {
    $type = htmlspecialchars($_GET["type"]);
    $value = htmlspecialchars($_GET["value"]);
    changePreference($type, $value);
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
          <div class = "horizontalAlign">
            <div class ="rowContainer" style="width: 40%">
              <h1 class = "notSignedIn" id="preferenceHeader">size</h1>
              <a class = "preferencesRow" href="preferences.php?change=true&type=fontSize&value=1">1</a>
              <a class = "preferencesRow" href="preferences.php?change=true&type=fontSize&value=2">2</a>
              <a class = "preferencesRow" href="preferences.php?change=true&type=fontSize&value=3">3</a>
              <a class = "preferencesRow" href="preferences.php?change=true&type=fontSize&value=4">4</a>
              <a class = "preferencesRow" href="preferences.php?change=true&type=fontSize&value=5">5</a>
            </div>
            <div class ="rowContainer" style="width: 60%">
              <h1 class = "notSignedIn" id="preferenceHeader">font</h1>
                <a class = "preferencesRow" href="preferences.php?change=true&type=fontSize&value=1">arial</a>
                <a class = "preferencesRow" href="preferences.php?change=true&type=fontSize&value=1">helvetica</a>
                <a class = "preferencesRow" href="preferences.php?change=true&type=fontSize&value=1">futura</a>
                <a class = "preferencesRow" href="preferences.php?change=true&type=fontSize&value=1">lexendDeca</a>
                <a class = "preferencesRow" href="preferences.php?change=true&type=fontSize&value=1">verdana</a>
            </div>
          </div>
          <div class = "horizontalAlign">
            <div class ="rowContainer" style="width: 40%">
              <h1 class = "notSignedIn" id="preferenceHeader">caret</h1>
              <a class = "preferencesRow" href="preferences.php?change=true&type=caret&value=none">none</a>
              <a class = "preferencesRow" href="preferences.php?change=true&type=caret&value=underline">underline</a>
              <a class = "preferencesRow" href="preferences.php?change=true&type=caret&value=highlight">highlight</a>
            </div>
            <div class ="rowContainer" style="width: 35%">
              <h1 class = "notSignedIn" id="preferenceHeader"># of lines</h1>
                <a class = "preferencesRow" href="preferences.php?change=true&type=lineCount&value=1">1</a>
                <a class = "preferencesRow" href="preferences.php?change=true&type=lineCount&value=2">2</a>
                <a class = "preferencesRow" href="preferences.php?change=true&type=lineCount&value=3">3</a>
                <a class = "preferencesRow" href="preferences.php?change=true&type=lineCount&value=4">4</a>
            </div>
            <div class ="rowContainer" style="width: 25%">
              <h1 class = "notSignedIn" id="preferenceHeader">blur text</h1>
                <a class = "preferencesRow" href="preferences.php?change=true&type=textBlur&value=on">on</a>
                <a class = "preferencesRow" href="preferences.php?change=true&type=textBlur&value=off">off</a>
            </div>
          </div>
            <div class ="rowContainer">
            <h1 id="preferenceHeader">theme</h1>
                <a class = "themesRow" id = "theme-olivia" href="preferences.php?change=true&type=theme&value=olivia">olivia</a>
                <a class = "themesRow" id = "theme-dracula" href="preferences.php?change=true&type=theme&value=dracula">dracula</a>
                <a class = "themesRow" id = "theme-8008" href="preferences.php?change=true&type=theme&value=8008">8008</a>
                <a class = "themesRow" id = "theme-mizu" href="preferences.php?change=true&type=theme&value=mizu">mizu</a>
                <a class = "themesRow" id = "theme-striker" href="preferences.php?change=true&type=theme&value=striker">striker</a>
                <a class = "themesRow" id = "theme-9009" href="preferences.php?change=true&type=theme&value=9009">9009</a>
                <a class = "themesRow" id = "theme-blueberry" href="preferences.php?change=true&type=theme&value=blueberry">blueberry</a>
                <a class = "themesRow" id = "theme-creamsicle" href="preferences.php?change=true&type=theme&value=creamsicle">creamsicle</a>
                <a class = "themesRow" id = "theme-botanical" href="preferences.php?change=true&type=theme&value=botanical">botanical</a>
                <a class = "themesRow" id = "theme-luna" href="preferences.php?change=true&type=theme&value=luna">luna</a>
            </div>
            
</form>
    </body>
</html>
 
