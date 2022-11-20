<?php
if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/config.php";
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
} ?>
<nav>
    <a href="index.php" style="text-decoration: none;">
        <img alt="logo" width="55" height="55" display="block" src="images/panda2.png">
        <li style="padding-left: .5rem; padding-right: 2rem;">CozyTypes</li>
    </a>
    <a href="/index.php"><i class="fa-solid fa-house"></i></a>
    <a href="/preferences.php"><i class="fa-solid fa-gear"></i></a>
    <div id ="showUsername" >
        <a href="/login.php"><i class="fa-regular fa-user"></i><?= htmlspecialchars($user["username"]) ?></a>
    </div>
</nav>