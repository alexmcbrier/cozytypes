<?php
if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/config.php";
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
} ?>
<nav> 
    <a id = "logo" href="/" style="text-decoration: none;">
        <p id = "title">cozytypes</p>
    </a>
    <a class = "navIcon" href="/" >home</a>
    <a class = "navIcon" href="/preferences">settings</a>
    <a class = "navIcon" href="/leaderboard">leaderboard</a>
    <a class = "navIcon" href="/about">about</a>
    <a href="/signup" id = "showUsername">
        <i class="fa-regular fa-user"></i>
        <div><?= htmlspecialchars($user["username"]) ?></div>
    </a>
</nav>