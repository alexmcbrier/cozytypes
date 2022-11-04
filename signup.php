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
        
        <link rel="shortcut icon" type="image/x-icon" href="images\panda.ico" />
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
    <form id="mainContent" action = "process-signup.php" method ="post">
        <nav>
                <img width="55" height="55" display = "block" src="images/panda2.png">
                <li style="padding-left: .5rem; padding-right: 2rem">CozyTypes</li>
                <li ><a id = "play" href="index.php"><img width="45" height="45" display = "block" src="images/keyboard.png"></a></li>
                <li><a href="login.php"><img width="35" height="35" display = "block" src="images/person.png"></a></li>
                <li><a href="preferences.php"><img width="35" height="35" display = "block" src="images/setting.png"></a></li>
        </nav>
            <div id = "middle" style="width:40%;">
                <h1 id = "loginHeader">sign up</h1>
                <input type="text" autocomplete = "off" placeholder="username" id="username" name = "username">
                <input type="text" autocomplete = "off" placeholder="email" id="email"  name = "email">
                <input type="text" autocomplete = "off" placeholder="password" id="password" name = "password">
                <input type="text" autocomplete = "off" placeholder="confirm password" id="confirm"  name = "confirm">
                <button id = "loginButton1" type="submit" value="submit" name="register">Create account</button>
            </div>
            <div id="bottom"></div>
        </form>  
    </body>
</html>
