<?php
//if user already logged in then go to the profile page
session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/config.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    header("Location: profile.php");
    exit;
}






$is_invalid = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //make sure email in database
    $mysqli = require __DIR__ . "/config.php";
    $sql = sprintf("SELECT * FROM user 
                    WHERE email = '%s'", 
                    $mysqli->real_escape_string($_POST["email"]));

    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    //verify password matches email
    if ($user) {
        if (password_verify($_POST["password"], $user["password_hash"]))
        {
            //keep username in the session for reference
            session_start();
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            //succesfully registered an account
            header("location: profile.php");
            exit;
        }
    }
    //if wrong password
    $is_invalid = true;
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
        <link rel="stylesheet" href="style.css">
        <script src="login.js" defer></script>
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
    <form id="loginContainer" method = "post">
        <div id = "topContainer">
            <h1 id = "loginHeader">Hello there, welcome back</h1>
            <?php if ($is_invalid): ?>
                <div id="invalid">Invalid login</div>
            <?php endif; ?>
            <input type="text" placeholder="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
            <input type="text" placeholder="password" name="password"id="password">
        </div>
        <div id = "middleContainer">
            <label id = "check">Remember me</label> 
            <input type="checkbox" id="myCheck" checked = "checked" onclick="myFunction()">
        </div>
        <a id = "passwordForget" href = "profile.html">forgot Password?</a>             
        <button id = "loginButton" type="submit" value="submit">login</button>\
        <div id = "accountCreate">Not registered yet? <a href="signup.html">Create an Account</a></div>
    </form>  
    </body>
</html>