<?php
session_start();
if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/config.php";
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    $font = htmlspecialchars($user["fontSize"]);
    $id = htmlspecialchars($user["id"]);
    $font = htmlspecialchars($user["fontSize"]);
    $theme = htmlspecialchars($user["theme"]);
}
?>
<div id="footer">
    <a class = "footerLinks tooltip" href="https://github.com/alexmcbrier/cozytypes">github<span class="tooltiptext">Support Us!</span>
        <i class="fa-solid fa-code fa-sm"></i>
    </a>
    <div class = "linkDivider">/</div>
    <a class = "footerLinks tooltip" href="/preferences.php">theme <?= $theme ?><span class="tooltiptext"><?= $theme ?></span>
        <i class="fa-solid fa-palette fa-sm"></i>
    </a>
    <p><?=$font?></p>
    <div class = "linkDivider">/</div>
    <a class = "footerLinks tooltip" href="/preferences.php">font<span class="tooltiptext"><?= $font ?></span>
        <i class="fa-solid fa-font fa-sm"></i>
    </a>
</div>
