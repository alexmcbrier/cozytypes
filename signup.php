<?php
$is_invalid = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $is_invalid = true;
    if (empty($_POST["username"])) { //if name empty
        $is_invalid = true;
    }

    else if (empty($_POST["password"])) { //if passowrd empty
        $is_invalid = true;
    }

    else if  (empty($_POST["confirm"])) { //if confirm passowrd empty
        $is_invalid = true;
    }

    else if  (strlen($_POST["password"]) < 8) { //at least 8 characters
        $is_invalid = true;
    }

    else if  (! preg_match("/[a-z]/i", $_POST["password"])) { //at least 1 character
        $is_invalid = true;
    }

    else if  (! preg_match("/[0-9]/i", $_POST["password"])) { //at least 1 number
        $is_invalid = true;
    }

    else if  ($_POST["password"] !== $_POST["confirm"]) { //make sure confirmation matches
        $is_invalid = true;
    }
    if ($is_invalid = false)
    {
        //Credentials are accurate, create a password hash (encrypt)
        $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $mysqli = require __DIR__ . "/config.php";
        $sql = "INSERT INTO user (username, email, password_hash) 
                VALUES (?, ?, ?)";
        $stmt = $mysqli->stmt_init();
        if (! $stmt->prepare($sql)) {
            die("SQL error: " . $mysqli->error);
        }
        $stmt->bind_param("sss", $_POST["username"], $_POST["email"], $password_hash);
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
            header("location: profile.php");
            exit;
        } else {
            die($mysqli->error . " " . $mysqli->errno);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<?php include "./head.php" ?>
    <body class="main-body">
    <?php include "./nav.php" ?>
    <form id="mainContent" method ="post" style = "width: 60%;">
        <h1 id = "loginHeader">sign up</h1>
        <?php if ($is_invalid) : ?>
            <div id="invalid">Invalid Credentials</div>
        <?php endif; ?>
        <input type="text" autocomplete = "off" placeholder="username" id="username" name = "username">
        <input type="text" autocomplete = "off" placeholder="email" id="email"  name = "email">
        <input type="text" autocomplete = "off" placeholder="password" id="password" name = "password">
        <input type="text" autocomplete = "off" placeholder="confirm password" id="confirm"  name = "confirm">
        <button class = "loginBtn" id = "loginButton1" type="submit" value="submit" name="register">Create account</button>
    </form>  
    </body>
</html>
