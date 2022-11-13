<!DOCTYPE html>
<html>
    <?php include "./head.php" ?>
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
