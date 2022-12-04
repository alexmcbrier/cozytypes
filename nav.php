<?php
if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/config.php";
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
} ?>
<nav>
    <a id = "logo" href="index.php" style="text-decoration: none;">
        <li>cozytypes</li>
    </a>
    <a class = "navIcon" href="https://cozytypes.com"><i class="fa-solid fa-house"></i></a>
    <a class = "navIcon" href="/preferences"><i class="fa-solid fa-gear"></i></a>
    <a href="/login" id = "showUsername">
        <i class="fa-regular fa-user"></i>
        <div><?= htmlspecialchars($user["username"]) ?></div>
    </a>
</nav>