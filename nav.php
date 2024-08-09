<?php
if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/config.php";
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
} ?>
<nav> 
    <a id = "logo" href="https://cozytypes.com" style="text-decoration: none;">
        <h1>cozytypes</h1>
    </a>
    <a class = "navIcon" href="https://cozytypes.com" >
        <i class="fa-solid fa-house"></i>
        <span class="hoverText">Example</span>
    </a>
    <a class = "navIcon" href="/preferences">
        <i class="fa-solid fa-gear"></i>
        <span class="hoverText">Example</span>
    </a>
    <a class = "navIcon" href="/leaderboard">
        <i class="fa-solid fa-crown"></i>
        <span class="hoverText">Example</span>
    </a>
    <a class = "navIcon" href="/about">
        <i class="fa-solid fa-info"></i>
        <span class="hoverText">Example</span>
    </a>
    <a href="/signup" id = "showUsername">
        <i class="fa-regular fa-user"></i>
        <div><?= htmlspecialchars($user["username"]) ?></div>
    </a>
</nav>