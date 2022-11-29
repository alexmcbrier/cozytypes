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
    <div id ="hotkey">
        <div><kbd>Tab</kbd> to restart</div>
    </div>
    <div id = "footerDiv">
        <a class = "footerLinks tooltip" href="https://github.com/alexmcbrier/cozytypes">github</span>
            <i class="fa-solid fa-code fa-sm"></i>
        </a>
        <div class = "linkDivider">/</div>
        <a class = "footerLinks tooltip" href="/preferences.php">theme</span>
            <i class="fa-solid fa-palette fa-sm"></i>
        </a>
        <div class = "linkDivider">/</div>
        <a class = "footerLinks tooltip" href="/preferences.php">font</span>
            <i class="fa-solid fa-font fa-sm"></i>
        </a>
    </div>
</div>

