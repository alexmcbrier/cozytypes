<?php
session_start();
?>
<!DOCTYPE html>
<html>

<?php include "./head.php" ?>
<head>
<title>preferences | cozytypes</title>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9923722164132738"
     crossorigin="anonymous"></script>
</head>
<body>

    <div id="notifications"></div>
    <form id="mainContent" method="POST" action="preferences" style = "gap: 0">
        <?php include "./nav.php" ?>
        <div class="preferences">
            <div id="sizesContainer" class="rowContainer lvl1">
                <h1 class="notSignedIn" id="preferenceHeader">font size<i class="fa-solid fa-text-height"></h1></i>
                <h1 class="description">Change the size of the words in the test.</h1>
                <a data-value="2" class="preference click" onclick="setPreference('fontSize', 2), addNotification('font size','small');">small</a>
                <a data-value="3"class="preference click" onclick="setPreference('fontSize', 3), addNotification('font size','medium');">medium</a>
                <a data-value="4"class="preference click" onclick="setPreference('fontSize', 4), addNotification('font size','large');">large</a>
            </div>
            <div id="switchesContainer" class="rowContainer lvl1">
                <h1 class="notSignedIn" id="preferenceHeader">keyboard switch sounds<i class="fa-solid fa-volume-low"></i></h1>
                <h1 class="description">choose from these switches, each offering a unique sound profile.</h1>
                <a data-value="none" class="preference click" onclick="setPreference('keyboardswitch', 'none'), addNotification('switch sound','none');">none</a>
                <a data-value="holypandas" class="preference click" onclick="setPreference('keyboardswitch', 'holypandas'), addNotification('switch sound','holy pandas');">holy pandas</a>
                <a data-value="nkcreams" class="preference click" onclick="setPreference('keyboardswitch', 'nkcreams'), addNotification('switch sound','novelkey creams');">novelkey creams</a>
            </div>
            <div id="themesContainer" class="theme-row-container lvl1">
                <div>
                    <h1 id="preferenceHeader">color theme<i class="fa-solid fa-palette"></i></h1>
                </div>
                <div class="theme-row-container">
                    <a class = "color-theme click light " onclick="setTheme(currentTheme, 'light')">light</a>
                    <a class = "color-theme click theme-9009" onclick="setTheme(currentTheme, 'theme-9009')">9009</a>
                    <a class = "color-theme click godspeed" onclick="setTheme(currentTheme, 'godspeed')">godspeed</a>
                    <a class = "color-theme click blueberryLight" onclick="setTheme(currentTheme, 'blueberryLight')">blueberry light</a>
                    <a class = "color-theme click mizu" onclick="setTheme(currentTheme, 'mizu')">mizu</a>
                    <a class = "color-theme click botanical" onclick="setTheme(currentTheme, 'botanical')">botanical</a>
                    <a class = "color-theme click darling" onclick="setTheme(currentTheme, 'darling')">darling</a>
                    <a class = "color-theme click amethyst" onclick="setTheme(currentTheme, 'amethyst')">amethyst</a>
                    <a class = "color-theme click strawberry" onclick="setTheme(currentTheme, 'strawberry')">strawberry</a>
                    <a class = "color-theme click striker" onclick="setTheme(currentTheme, 'striker')">striker</a>
                    <a class = "color-theme click alpine" onclick="setTheme(currentTheme, 'alpine')">alpine</a>
                    <a class = "color-theme click theme-8008" onclick="setTheme(currentTheme, 'theme-8008')">8008</a>
                    <a class = "color-theme click blueberry" onclick="setTheme(currentTheme, 'blueberry')">blueberry dark</a>
                    <a class = "color-theme click nord" onclick="setTheme(currentTheme, 'nord')">nord</a>
                    <a class = "color-theme click bliss" onclick="setTheme(currentTheme, 'bliss')">bliss</a>
                    <a class = "color-theme click olivia" onclick="setTheme(currentTheme, 'olivia')">olivia</a>
                    <a class = "color-theme click dracula" onclick="setTheme(currentTheme, 'dracula')">dracula</a>
                    <a class = "color-theme click dark" onclick="setTheme(currentTheme, 'dark')">dark</a>
                </div>
            </div>
            <div id="caretsContainer" class="rowContainer lvl1">
                <h1 class="notSignedIn" id="preferenceHeader">pace caret <i class="fa-solid fa-i-cursor"></i></h1>
                <h1 class="description">When enabled, the caret will move along the page as you type. Change the style for different typing experiences.</h1>
                <a data-value="caret" class="preference click" onclick="setPreference('caret', 'caret'), addNotification('caret style','classic');">caret</a>
                <a data-value="underlineLetter" class="preference click" onclick="setPreference('caret', 'underlineLetter'), addNotification('caret style','underline letter');">underline letter</a>
                <a data-value="underlineWord" class="preference click" onclick="setPreference('caret', 'underlineWord'), addNotification('caret style','underline word');">underline word</a>
                <a data-value="highlightWord" class="preference click" onclick="setPreference('caret', 'highlightWord'), addNotification('caret style','highlight');">highlight word</a>
            </div>
            <div id="linesContainer" class="rowContainer lvl1">
                <h1 class="notSignedIn" id="preferenceHeader">lines <i class="fa-solid fa-align-left"></i></h1>
                <h1 class="description">Show a different number of lines on the screen; More lines on the page will allow to see you what is coming next.</h1>
                <a data-value="2" class="preference click" onclick="setPreference('lineCount', 2), addNotification('line count','2');">2</a>
                <a data-value="3" class="preference click" onclick="setPreference('lineCount', 3), addNotification('line count','3');">3</a>
                <a data-value="4" class="preference click" onclick="setPreference('lineCount', 4), addNotification('line count','4');">4</a>
            </div>
        </div>
    </form>
</body>
</html>
