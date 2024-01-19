<?php
if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/config.php";
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
} ?>
<script src="loadPage.js"></script>
<script src="script.js"></script>
<nav> 
    <a id = "logo" href="#" onClick = "loadPage('index.php'); restart;" style="text-decoration: none;">
        <li>cozytypes</li>
    </a>
    <a class = "navIcon" href="#" onClick = "loadPage('index.php'); restart;"><i class="fa-solid fa-house"></i></a>
    <a class = "navIcon" href="#" onClick = "loadPage('preferences.php')"><i class="fa-solid fa-gear"></i></a>
    <a href="#" onClick = "loadPage('login.php')" id = "showUsername">
        <i class="fa-regular fa-user"></i>
        <div><?= htmlspecialchars($user["username"]) ?></div>
    </a>
</nav>