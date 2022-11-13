<!DOCTYPE html>
<html>
<?php include "./head.php" ?>
    <body>
    <?php include "./nav.php" ?>
    <form id="mainContent" action = "process-signup.php" method ="post">
        <h1 id = "loginHeader">sign up</h1>
        <input type="text" autocomplete = "off" placeholder="username" id="username" name = "username">
        <input type="text" autocomplete = "off" placeholder="email" id="email"  name = "email">
        <input type="text" autocomplete = "off" placeholder="password" id="password" name = "password">
        <input type="text" autocomplete = "off" placeholder="confirm password" id="confirm"  name = "confirm">
        <button class = "loginBtn" id = "loginButton1" type="submit" value="submit" name="register">Create account</button>
    </form>  
    </body>
</html>
