<?php
session_start();
?>
<!DOCTYPE html>
<html>

<?php include "./head2.php" ?>
<head>
<title>preferences | cozytypes</title>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9923722164132738"
     crossorigin="anonymous"></script>
</head>
<body>

    <div id="notifications"></div>
    <form id="mainContent" method="POST" action="preferences">
        <?php include "./nav.php" ?>
        <div class="preferences">
            <div id="sizesContainer" class="rowContainer">
                <h1 class="notSignedIn" id="preferenceHeader">size <i class="fa-solid fa-text-height"></i> </h1>
                <h1 class="description">Change the size of the words in the test.</h1>
                <a class="preference" onclick="setPreference('fontSize', 1), addNotification('font size','1');">1</a>
                <a class="preference" onclick="setPreference('fontSize', 2), addNotification('font size','2');">2</a>
                <a class="preference" onclick="setPreference('fontSize', 3), addNotification('font size','3');">3</a>
                <a class="preference" onclick="setPreference('fontSize', 4), addNotification('font size','4');">4</a>
                <a class="preference" onclick="setPreference('fontSize', 5), addNotification('font size','5');">5</a>
            </div>
            <div id="fontsContainer" class="rowContainer">
                <h1 class="notSignedIn" id="preferenceHeader">font <i class="fa-solid fa-font"></i></h1>
                <h1 class="description">Choose from various styles to change the font family across the site.</h1>
                <div class="theme-row-container">
                    <a class="preference" style="font-family: 'LexendDeca', serif;" onclick="setPreference('fontFamily', 'lexenddeca'), addNotification('font family','lexend deca');">lexend deca</a>
                    <a class="preference" style="font-family: Arial;" onclick="setPreference('fontFamily', 'arial'), addNotification('font family','arial');">arial</a>
                    <a class="preference" style="font-family: 'IBM Plex Sans', sans-serif;" onclick="setPreference('fontFamily', 'ibmplexsans'), addNotification('font family','IBM Plex Sans');">IBM Plex Sans</a>
                    <a class="preference" style="font-family: 'Comfortaa', cursive;" onclick="setPreference('fontFamily', 'comfortaa'), addNotification('font family','comfortaa');">comfortaa</a>
                    <a class="preference" style="font-family: 'Courier Prime', monospace;" onclick="setPreference('fontFamily', 'courier'), addNotification('font family','courier');">courier</a>
                    <a class="preference" style="font-family: 'Nunito', sans-serif;" onclick="setPreference('fontFamily', 'Nunito'), addNotification('font family','Nunito');">Nunito</a>
                    <a class="preference" style="font-family: 'Source Code Pro', monospace;" onclick="setPreference('fontFamily', 'sourceCodePro'), addNotification('font family','source code pro');">source code pro</a>
                    <a class="preference" style="font-family: 'Raleway', sans-serif;" onclick="setPreference('fontFamily', 'raleway'), addNotification('font family','raleway');">raleway</a>
                    <a class="preference" style="font-family: 'Titillium Web', sans-serif;" onclick="setPreference('fontFamily', 'titilliumWeb'), addNotification('font family','titillium Web');">titillium Web</a>
                    <a class="preference" style="font-family: 'Lora', serif;" onclick="setPreference('fontFamily', 'lora'), addNotification('font family','lora');">lora</a>
                    <a class="preference" style="font-family: 'Merriweather', serif;" onclick="setPreference('fontFamily', 'merriweather'), addNotification('font family','merriweather');">merriweather</a>
                    <a class="preference" style="font-family: 'robotoMono', serif;" onclick="setPreference('fontFamily', 'robotoMono'), addNotification('font family','robotoMono');">roboto mono</a>
                    <a class="preference" style="font-family: 'montserrat', serif;" onclick="setPreference('fontFamily', 'montserrat'), addNotification('font family','montserrat');">montserrat</a>
                    <a class="preference" style="font-family: 'karla', serif;" onclick="setPreference('fontFamily', 'karla'), addNotification('font family','karla');">karla</a>
                    <a class="preference" style="font-family: 'josefinSans', serif;" onclick="setPreference('fontFamily', 'josefinSans'), addNotification('font family','josefinSans');">josefinSans</a>
                </div>
            </div>
            <div id="themesContainer" class="theme-row-container">
                <div>
                    <h1 id="preferenceHeader">color theme <i class="fa-solid fa-palette"></i></h1>
                </div>
                <div class="theme-row-container">
                    <a class = "color-theme light" onclick="setTheme(currentTheme, 'light')">light</a>
                    <a class = "color-theme theme-9009" onclick="setTheme(currentTheme, 'theme-9009')">9009</a>
                    <a class = "color-theme blueberryLight" onclick="setTheme(currentTheme, 'blueberryLight')">blueberry light</a>
                    <a class = "color-theme mizu" onclick="setTheme(currentTheme, 'mizu')">mizu</a>
                    <a class = "color-theme botanical" onclick="setTheme(currentTheme, 'botanical')">botanical</a>
                    <a class = "color-theme amethyst" onclick="setTheme(currentTheme, 'amethyst')">amethyst</a>
                    <a class = "color-theme creamsicle" onclick="setTheme(currentTheme, 'creamsicle')">creamsicle</a>
                    <a class = "color-theme strawberry" onclick="setTheme(currentTheme, 'strawberry')">strawberry</a>
                    <a class = "color-theme striker" onclick="setTheme(currentTheme, 'striker')">striker</a>
                    <a class = "color-theme alpine" onclick="setTheme(currentTheme, 'alpine')">alpine</a>
                    <a class = "color-theme theme-8008" onclick="setTheme(currentTheme, 'theme-8008')">8008</a>
                    <a class = "color-theme blueberry" onclick="setTheme(currentTheme, 'blueberry')">blueberry dark</a>
                    <a class = "color-theme bliss" onclick="setTheme(currentTheme, 'bliss')">bliss</a>
                    <a class = "color-theme olivia" onclick="setTheme(currentTheme, 'olivia')">olivia</a>
                    <a class = "color-theme dracula" onclick="setTheme(currentTheme, 'dracula')">dracula</a>
                    <a class = "color-theme dark" onclick="setTheme(currentTheme, 'dark')">dark</a>
                </div>
            </div>
            <div id="caretsContainer" class="rowContainer">
                <h1 class="notSignedIn" id="preferenceHeader">pace caret <i class="fa-solid fa-arrow-pointer"></i></h1>
                <h1 class="description">When enabled, the caret will move along the page as you type. Change the style for different typing experiences.</h1>
                <a class="preference" onclick="setPreference('caret', 'none'), addNotification('caret style','none');">none</a>
                <a class="preference" onclick="setPreference('caret', 'caret'), addNotification('caret style','classic');">caret</a>
                <a class="preference" onclick="setPreference('caret', 'underlineLetter'), addNotification('caret style','underline letter');">underline letter</a>
                <a class="preference" onclick="setPreference('caret', 'underlineWord'), addNotification('caret style','underline word');">underline word</a>
                <a class="preference" onclick="setPreference('caret', 'highlightWord'), addNotification('caret style','highlight');">highlight word</a>
            </div>
            <div id="linesContainer" class="rowContainer">
                <h1 class="notSignedIn" id="preferenceHeader">lines <i class="fa-solid fa-align-left"></i></h1>
                <h1 class="description">Show a different number of lines on the screen; More lines on the page will allow to see you what is coming next.</h1>
                <a class="preference" onclick="setPreference('lineCount', 2), addNotification('line count','2');">2</a>
                <a class="preference" onclick="setPreference('lineCount', 3), addNotification('line count','3');">3</a>
                <a class="preference" onclick="setPreference('lineCount', 4), addNotification('line count','4');">4</a>
                <a class="preference" onclick="setPreference('lineCount', 5), addNotification('line count','5');">5</a>
            </div>
        </div>
    </form>
</body>
</html>
