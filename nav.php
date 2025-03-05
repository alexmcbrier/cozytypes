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
    <a class = "navIcon" href="/" ><i class="fa-solid fa-house"></i></a>
    <a class = "navIcon" href="/preferences"><i class="fa-solid fa-gear"></i></a>
    <a class = "navIcon" href="/leaderboard"><i class="fa-solid fa-crown"></i></a>
    <a class = "navIcon" href="/about"><i class="fa-solid fa-info"></i></a>
    <a class = "navIcon" href="https://imissmycafe.com/"><<i class="fa-solid fa-mug-hot"></i></a>
    <a href="/signup" id = "showUsername">
        <i class="fa-regular fa-user"></i>
        <div><?= htmlspecialchars($user["username"]) ?></div>
    </a>
</nav>