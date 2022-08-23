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
        <form id="signupContainer" action = "process-signup.php" method ="post">
            <div id = "topContainer">
                <h1 id = "loginHeader">sign up</h1>
                <input type="text" autocomplete = "off" placeholder="username" id="username" name = "username">
                <input type="text" autocomplete = "off" placeholder="email" id="email"  name = "email">
                <input type="text" autocomplete = "off" placeholder="password" id="password" name = "password">
                <input type="text" autocomplete = "off" placeholder="confirm password" id="confirm"  name = "confirm">
                <button id = "loginButton" type="submit" value="submit" name="register">Create account</button>
            </div>
        </form>  
    </body>
</html>