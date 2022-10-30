<?php
//if user already logged in then go to the profile page
session_start();
if (isset($_SESSION["user_id"])) {
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
    $_SESSION["email"] = ($_POST["email"]);
    $_SESSION["id"] = $user["id"];
    //verify password matches email
    if ($user) {
        if (password_verify($_POST["password"], $user["password_hash"]))
        {
            //keep username in the session for reference
            session_start();
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            //setting cookies
            $mysqli = require __DIR__ . "/config.php";
            $sql = "SELECT * FROM user
                    WHERE id = {$_SESSION["user_id"]}";
            $result = $mysqli->query($sql);
            $user = $result->fetch_assoc();
            //change
            $id = ($user["id"]);
            setcookie("rememberMe", $user["email"], time() + (86400 * 30), "/", NULL); // 86400 = 1 day
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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>cozytype</title>
        <link rel="stylesheet" href="style.php">
        <script src="script.js" defer></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    </head>
    <body> 
    <nav>
                    <img width="45" height="45" display = "block" src="images/night.png">
                    <li style="padding-left: .5rem; padding-right: 2rem">CozyTypes</li>
                    <li ><a id = "play" href="index.php"><img width="45" height="45" display = "block" src="images/keyboard.png"></a></li>
                    <li><a href="login.php"><img width="35" height="35" display = "block" src="images/person.png"></a></li>
                    <li><a href="preferences.php"><img width="35" height="35" display = "block" src="images/setting.png"></a></li>
            </nav>
    <form id="loginContainer" method = "post">
        <div id = "topContainer">
            <h1 id = "loginHeader">Hello there, welcome back</h1>
            <?php if ($is_invalid): ?>
                <div id="invalid">Invalid login</div>
            <?php endif; ?>
            <input type="text" placeholder="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
            <input type="text" placeholder="password" name="password"id="password" style="-webkit-text-security: disc;">
        </div>
        <div id = "middleContainer">
            <label id = "check">Remember me</label> 
            <input type="checkbox" id="myCheck" checked = "checked" onclick="myFunction()">
        </div>
        <a id = "passwordForget" href = "profile.html">forgot Password?</a>             
        <button id = "loginButton" type="submit" value="submit">login</button>
        <div id = "accountCreate">Not registered yet? <a href="signup.php">Create an Account</a></div>
    </form>  
    </body>
</html>
