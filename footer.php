<?php
session_start();
if (isset($_COOKIE["theme"])) {
    $theme = $_COOKIE["theme"];
}
if (isset($_COOKIE["fontFamily"])) {
    $font = $_COOKIE["fontFamily"];
}
?>

<div id="footer" class = "invisible">
    <h2 id ="hotkey">
        <div><kbd>Tab</kbd> to restart</div>
    </h2>
    <div id = "footerDiv">
        <!-- 
        <a class = "footerLinks tooltip" href="https://github.com/alexmcbrier/cozytypes">github</span>
             <i class="fa-brands fa-github"></i>
        </a>
        -->
        <div class = "linkDivider"> </div>
        <a class = "footerLinks tooltip" href="/preferences">theme</span>
             <!-- <i class="fa-solid fa-palette fa-sm"></i> -->
        </a>

        <div class = "linkDivider"> </div>
        <a class = "footerLinks tooltip" href="/preferences">font</span>
             <!-- <i class="fa-solid fa-font fa-sm"></i> -->
        </a>

        <div class = "linkDivider"> </div>
        <a class = "footerLinks tooltip" href="/cookiePolicy.html">cookies</span>
             <!-- <i class="fa-solid fa-cookie-bite"></i> -->
        </a>

        <div class = "linkDivider"> </div>
        <a class = "footerLinks tooltip" href="/privacyPolicy.html">privacy</span>
             <!--  <i class="fa-solid fa-lock"></i> -->
        </a>
        <div class = "linkDivider"> </div>
        <a class = "footerLinks tooltip" href="https://kbdcraft.store?source_type=sales_plugin_af&slt=sales_plugin_af&referral_code=2UZEGET8XD2L">keyboards</span>
        </a>
    </div>
</div>

