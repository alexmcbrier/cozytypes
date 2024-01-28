<?php
session_start();
//if user already logged in then go to the profile page
session_start();
if (isset($_SESSION["user_id"])) {
    header("Location: profile");
    exit;
}
$is_invalid = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) { //if name empty
        $is_invalid = true;
    }
    else if (empty($_POST["password"])) { //if passowrd empty
        $is_invalid = true;
    }
    else if  (strlen($_POST["password"]) < 8) { //at least 8 characters
        $is_invalid = true;
    }
    if (!$is_invalid)
    {
        //Credentials are accurate, create a password hash (encrypt)
        $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $dateCreated = date("Y-m-d H:i:s"); // Get current date and time
        $mysqli = require __DIR__ . "/config.php";
        $sql = "INSERT INTO user (username, email, password_hash, dateCreated) 
                VALUES (?, ?, ?, ?)";
        
        $stmt = $mysqli->stmt_init();
        if (!$stmt->prepare($sql)) {
            die("SQL error: " . $mysqli->error);
        }
    
        $stmt->bind_param("ssss", $_POST["username"], $_POST["email"], $password_hash, $dateCreated);    
        if ($stmt->execute()) {
            $mysqli = require __DIR__ . "/config.php";
            $sql = sprintf("SELECT * FROM user 
                            WHERE email = '%s'", 
                            $mysqli->real_escape_string($_POST["email"]));
            $result = $mysqli->query($sql);
            $user = $result->fetch_assoc();
            //succesfully registered an account
            session_start();
            session_regenerate_id();

            $_SESSION["user_id"] = $user["id"];
            //succesfully registered an account
            //set cookie as the password hash, then decrypt to sign back in on page reload (rememberme)
            setcookie("id", $password_hash, time() + (86400 * 30), "/", NULL); // 86400 = 1 day
            header("location: profile");
            exit;
        } else {
            die($mysqli->error . " " . $mysqli->errno);
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <?php include "./head2.php" ?>
    <body class="main-body">
        <div id="mainContent">
            <?php include "./nav.php" ?>
            <form id="middle" method ="post" style = "width: 70%; margin: auto;">
                <h1 id = "loginHeader">sign up</h1>
                <?php if ($is_invalid) : ?>
                    <div id="invalid">Invalid Credentials</div>
                <?php endif; ?>
                <input type="text" autocomplete = "off" placeholder="username" id="username" name = "username">
                <input type="text" autocomplete = "off" placeholder="email" id="email"  name = "email">
                <input type="text" autocomplete = "off" placeholder="password" id="password" name = "password">
                <button class = "loginBtn" id = "loginButton1" type="submit" value="submit" name="register">Create account</button>
            </form>  
            <div style="align-self: center; display: flex; color: var(--rowBackground)">Already have an account?<a class = "footerLinks" href="login">Login</a></div>
            <?php include "./footer.php" ?>
        </div>
    </body>
</html>
