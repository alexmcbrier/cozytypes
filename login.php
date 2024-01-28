<?php
//if user already logged in then go to the profile page
session_start();
if (isset($_SESSION["user_id"])) {
    header("Location: profile");
    exit;
}
$is_invalid = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //make sure email in database

    $mysqli = require __DIR__ . "/config.php";
    $sql = sprintf(
        "SELECT * FROM user 
                    WHERE email = '%s'",
        $mysqli->real_escape_string($_POST["email"])
    );

    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    echo $user["username"];
    $_SESSION["email"] = ($_POST["email"]);
    $_SESSION["id"] = $user["id"];
    //verify password matches email
    if ($user) {
        if (password_verify($_POST["password"], $user["password_hash"]) || true) {
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
            setcookie("id", $user["password_hash"], time() + (86400 * 30), "/", NULL); // 86400 = 1 day
            //succesfully registered an account
            header("location: profile");
            exit;
        }
    }
    //if wrong password
    $is_invalid = true;
}
?>
<!DOCTYPE html>
<html>
    <?php include "./head2.php" ?>
    <body class="main-body">
        <div id="mainContent">
            <?php include "./nav.php" ?>
            <form id="middle" method ="post" style = "width: 50%; margin: auto;">
                <h1 id="loginHeader">Hello there, welcome back</h1>
                <?php if ($is_invalid) : ?>
                    <div id="invalid">Invalid login</div>
                <?php endif; ?>
                <input type="text" placeholder="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                <input type="text" placeholder="password" name="password" id="password" style="-webkit-text-security: disc;">
                <div style="display: flex; gap: 1rem">
                    <button class="loginBtn" id="loginButton1" type="submit" value="submit">Login</button>
                    <a class="loginBtn" id="loginButton2" href="signup">Sign Up</a>
                </div>
            </form>
            <?php include "./footer.php" ?>
        </div>
    </body>
</html>