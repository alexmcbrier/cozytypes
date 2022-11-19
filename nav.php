<?php
//grabbing user session information (neccesary for staying signed in etc.)
if (isset($_COOKIE["email"])) {
    $mysqli = require __DIR__ . "/config.php";
    $name = $_COOKIE["email"];
    //change to whatever
    $sql = "SELECT username FROM user WHERE email = '$name'";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    $username= $user["username"];
}
?>
<nav>
    <a href="index.php" style="text-decoration: none;">
        <img alt="logo" width="55" height="55" display="block" src="images/panda2.png">
        <li style="padding-left: .5rem; padding-right: 2rem;">CozyTypes</li>
    </a>
    <a href="/index.php"><i class="fa-solid fa-house"></i></a>
    <a href="/preferences.php"><i class="fa-solid fa-gear"></i></a>
    <a href="/login.php"><i class="fa-regular fa-user"></i></a>
    <h1 id = "showName"><?php echo $username; ?></h1>
</nav>
