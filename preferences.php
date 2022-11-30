<?php
session_start();
?>
<!DOCTYPE html>
<html>

<?php include "./head.php" ?>

<body>
    <?php include "./nav.php" ?>
    <form id="preferencesArea" method="POST" action="preferences.php">
        <div class="preferences">
            <div class="horizontalAlign">
                <div id="sizesContainer" class="rowContainer" style="width: 30%">
                    <h1 class="notSignedIn" id="preferenceHeader">Size <i class="fa-solid fa-text-height"></i> </h1>
                    <h1 class="description">Change the size of the words in the test.</h1>
                    <a class="preference" onclick="setPreference('fontSize', 1)">1</a>
                    <a class="preference" onclick="setPreference('fontSize', 1.5)">2</a>
                    <a class="preference" onclick="setPreference('fontSize', 2)">2</a>
                    <a class="preference" onclick="setPreference('fontSize', 2.5)">4</a>
                    <a class="preference" onclick="setPreference('fontSize', 3)">5</a>
                </div>
                <div id="fontsContainer" class="rowContainer" style="width: 70%">
                    <h1 class="notSignedIn" id="preferenceHeader">Font <i class="fa-solid fa-font"></i></h1>
                    <h1 class="description">Choose from various styles to change the font family across the site.</h1>
                    <a class="preference" style="font-family: 'LexendDeca', serif;" onclick="setPreference('fontFamily', 'lexenddeca')">lexend deca</a>
                    <a class="preference" style="font-family: Arial;" onclick="setPreference('fontFamily', 'arial')">arial</a>
                    <a class="preference" style="font-family: 'IBM Plex Sans', sans-serif;" onclick="setPreference('fontFamily', 'ibmplexsans')">IBM Plex Sans</a>
                    <a class="preference" style="font-family: 'Comfortaa', cursive;" onclick="setPreference('fontFamily', 'comfortaa')">comfortaa</a>
                    <a class="preference" style="font-family: 'Courier Prime', monospace;" onclick="setPreference('fontFamily', 'courier')">courier</a>
                    <a class="preference" style="font-family: 'Nunito', sans-serif;" onclick="setPreference('fontFamily', 'Nunito')">Nunito</a>
                    <a class="preference" style="font-family: 'Source Code Pro', monospace;" onclick="setPreference('fontFamily', 'sourceCodePro')">source code pro</a>
                    <a class="preference" style="font-family: 'Raleway', sans-serif;" onclick="setPreference('fontFamily', 'raleway')">raleway</a>
                    <a class="preference" style="font-family: 'Titillium Web', sans-serif;" onclick="setPreference('fontFamily', 'titilliumWeb')">titillium Web</a>
                    <a class="preference" style="font-family: 'Lora', serif;" onclick="setPreference('fontFamily', 'lora')">lora</a>
                    <a class="preference" style="font-family: 'Merriweather', serif;" onclick="setPreference('fontFamily', 'merriweather')">merriweather</a>
                </div>
            </div>
            <div class="horizontalAlign">
                <div id="caretsContainer" class="rowContainer" style="width: 40%">
                    <h1 class="notSignedIn" id="preferenceHeader">Caret <i class="fa-solid fa-arrow-pointer"></i></h1>
                    <h1 class="description">When enabled, the caret will move along the page as you type. Change the style for different typing experiences.</h1>
                    <a class="preference" onclick="setPreference('caret', 'none')">none</a>
                    <a class="preference" onclick="setPreference('caret', 'caret')">caret</a>
                    <a class="preference" onclick="setPreference('caret', 'underlineLetter')">underline letter</a>
                    <a class="preference" onclick="setPreference('caret', 'underlineWord')">underline word</a>
                    <a class="preference" onclick="setPreference('caret', 'highlightWord')">highlight word</a>
                </div>
                <div id="linesContainer" class="rowContainer" style="width: 35%">
                    <h1 class="notSignedIn" id="preferenceHeader">Amount of lines <i class="fa-solid fa-align-left"></i></h1>
                    <h1 class="description">Show a different number of lines on the screen; More lines on the page will allow to see you what is coming next.</h1>
                    <a class="preference" onclick="setPreference('lineCount', 2)">2</a>
                    <a class="preference" onclick="setPreference('lineCount', 3)">3</a>
                    <a class="preference" onclick="setPreference('lineCount', 4)">4</a>
                    <a class="preference" onclick="setPreference('lineCount', 5)">5</a>
                </div>
                <div id="blurContainer" class="rowContainer" style="width: 25%">
                    <h1 class="notSignedIn" id="preferenceHeader">Blur Text <i class="fa-solid fa-eye"></i></h1>
                    <h1 class="description">Enabling blur will cause a gradient to be placed over the test, allowing you to rely less on memorization.</h1>
                    <a class="preference" onclick="setPreference('blur', 'on')">on</a>
                    <a class="preference" onclick="setPreference('blur', 'off')">off</a>
                </div>
            </div>
        </div>
        <div id="themesContainer" class="rowContainer">
            <h1 id="preferenceHeader">Theme <i class="fa-solid fa-palette"></i></h1>
            <a title="light" class = "color-theme light" onclick="setTheme(currentTheme, 'light')">light</a>
            <a title="9009" class = "color-theme theme-9009" onclick="setTheme(currentTheme, 'theme-9009')">9009</a>
            <a title="mizu" class = "color-theme mizu" onclick="setTheme(currentTheme, 'mizu')">mizu</a>
            <a title="blueberry" class = "color-theme blueberry" onclick="setTheme(currentTheme, 'blueberry')">blueberry</a>
            <a title="striker" class = "color-theme striker" onclick="setTheme(currentTheme, 'striker')">striker</a>
            <a title="sakura" class = "color-theme sakura" onclick="setTheme(currentTheme, 'sakura')">sakura</a>
            <a title="creamsicle" class = "color-theme creamsicle" onclick="setTheme(currentTheme, 'creamsicle')">creamsicle</a>
            <a title="botanical" class = "color-theme botanical" onclick="setTheme(currentTheme, 'botanical')">botanical</a>
            <a title="8008" class = "color-theme theme-8008" onclick="setTheme(currentTheme, 'theme-8008')">8008</a>
            <a title="amethyst" class = "color-theme amethyst" onclick="setTheme(currentTheme, 'amethyst')">amethyst</a>
            <a title="dracula" class = "color-theme dracula" onclick="setTheme(currentTheme, 'dracula')">dracula</a>
            <a title="olivia" class = "color-theme olivia" onclick="setTheme(currentTheme, 'olivia')">olivia</a>
            <a title="dark" class = "color-theme dark" onclick="setTheme(currentTheme, 'dark')">dark</a>
        </div>
    </form>
</body>
</html>
