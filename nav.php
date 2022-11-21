<?php
if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/config.php";
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
} ?>
<nav>
    <a id = "logo" href="index.php" style="text-decoration: none;">
        <img alt="logo" width="55" height="55" display="block" src="images/panda2.png">
        <li style="padding-left: .5rem; padding-right: 2rem;">CozyTypes</li>
    </a>
    <a class = "navIcon" href="/index"><i class="fa-solid fa-house"></i></a>
    <a class = "navIcon" href="/preferences"><i class="fa-solid fa-gear"></i></a>
    <a href="/login" id = "showUsername">
        <i class="fa-regular fa-user" style = "padding: 0 .5rem;" ></i>
        <div><?= htmlspecialchars($user["username"]) ?></div>
    </a>
</nav>