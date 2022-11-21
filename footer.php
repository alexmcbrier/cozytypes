<?php
session_start();
if (isset($_COOKIE["theme"])) {
    $theme = $_COOKIE["theme"];
}
if (isset($_COOKIE["fontFamily"])) {
    $font = $_COOKIE["fontFamily"];
}
?>
<div id="footer">
    <a class = "footerLinks tooltip" href="https://github.com/alexmcbrier/cozytypes">github<span class="tooltiptext">Support Us!</span>
        <i class="fa-solid fa-code fa-sm"></i>
    </a>
    <div class = "linkDivider">/</div>
    <a class = "footerLinks tooltip" href="/preferences.php">theme<span class="tooltiptext"><?= $theme ?></span>
        <i class="fa-solid fa-palette fa-sm"></i>
    </a>
    <div class = "linkDivider">/</div>
    <a class = "footerLinks tooltip" href="/preferences.php">font<span class="tooltiptext"><?= $font ?></span>
        <i class="fa-solid fa-font fa-sm"></i>
    </a>
</div>
