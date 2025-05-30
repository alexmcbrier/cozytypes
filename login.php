<?php
session_start();
if (isset($_SESSION["user_id"])) {
    header("Location: profile");
    exit;
}

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . "/config.php";

    $sql = sprintf(
        "SELECT * FROM user WHERE email = '%s'",
        $mysqli->real_escape_string($_POST["email"])
    );

    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

    if ($user && password_verify($_POST["password"], $user["password_hash"])) {
        session_regenerate_id();
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["email"] = $user["email"];

        // You can echo username *after* successful login if you want to
        // echo $user["username"];

        // Set cookie if needed
        setcookie("id", $user["id"], time() + (86400 * 30), "/", NULL);

        header("Location: profile");
        exit;
    } else {
        $is_invalid = true;
    }
}
?>
<!DOCTYPE html>
<html>
    <?php include "./head.php" ?><head>
    <title>login | cozytypes</title>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9923722164132738"
     crossorigin="anonymous"></script>
    </head>
    <body class="main-body">
        <div id="mainContent">
            <?php include "./nav.php" ?>
            <form id="middle" method ="post" style = "width: 50%; margin: auto;">
                <h1 id="loginHeader">hello there, welcome back</h1>
                <?php if ($is_invalid) : ?>
                    <div id="invalid">Invalid login</div>
                <?php endif; ?>
                <input type="text" placeholder="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                <input type="text" placeholder="password" name="password" id="password" style="-webkit-text-security: disc;">
                <button class="loginBtn" id="loginButton1" type="submit" value="submit">Login</button>
                <div id = "signInText">Don't have an account? <a id = "signInLink" href="signup"> Sign up</a></div>
            </form>
            <?php include "./footer.php" ?>
        </div>
    </body>
</html>