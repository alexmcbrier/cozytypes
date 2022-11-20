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
                    <a title="1" class="preference" onclick="setCookie('fontSize', 1, 30)">1</a>
                    <a title="2" class="preference" onclick="setCookie('fontSize', 2, 30)">2</a>
                    <a title="3" class="preference" onclick="setCookie('fontSize', 3, 30)">3</a>
                    <a title="4" class="preference" onclick="setCookie('fontSize', 4, 30)">4</a>
                    <a title="5" class="preference" onclick="setCookie('fontSize', 5, 30)">5</a>
                </div>
                <div id="fontsContainer" class="rowContainer" style="width: 70%">
                    <h1 class="notSignedIn" id="preferenceHeader">Font <i class="fa-solid fa-font"></i></h1>
                    <a title="lexenddeca" class="preference" style="font-family: 'LexendDeca', serif;" onclick="setCookie('fontFamily', 'lexenddeca', 30)">lexend deca</a>
                    <a title="arial" class="preference" style="font-family: Arial;" onclick="setCookie('fontFamily', 'arial', 30)">arial</a>
                    <a title="ibmplexsans" class="preference" style="font-family: 'IBM Plex Sans', sans-serif;" onclick="setCookie('fontFamily', 'ibmplexsans', 30)">IBM Plex Sans</a>
                    <a title="comfortaa" class="preference" style="font-family: 'Comfortaa', cursive;" onclick="setCookie('fontFamily', 'comfortaa', 30)">comfortaa</a>
                    <a title="courier" class="preference" style="font-family: 'Courier Prime', monospace;" onclick="setCookie('fontFamily', 'courier', 30)">courier</a>
                    <a title="nutino" class="preference" style="font-family: 'Nunito', sans-serif;" onclick="setCookie('fontFamily', 'nutino', 30)">Nunito</a>
                    <a title="sourcecodepro" class="preference" style="font-family: 'Source Code Pro', monospace;" onclick="setCookie('fontFamily', 'sourcecodepro', 30)">source code pro</a>
                    <a title="raleway" class="preference" style="font-family: 'Raleway', sans-serif;" onclick="setCookie('fontFamily', 'raleway', 30)">raleway</a>
                    <a title="titilliumweb" class="preference" style="font-family: 'Titillium Web', sans-serif;" onclick="setCookie('fontFamily', 'titilliumweb', 30)">titillium Web</a>
                    <a title="lora" class="preference" style="font-family: 'Lora', serif;" onclick="setCookie('fontFamily', 'lora', 30)">lora</a>
                    <a title="merrieweather" class="preference" style="font-family: 'Merriweather', serif;" onclick="setCookie('fontFamily', 'merrieweather', 30)">merriweather</a>
                </div>
            </div>
            <div class="horizontalAlign">
                <div id="caretsContainer" class="rowContainer" style="width: 40%">
                    <h1 class="notSignedIn" id="preferenceHeader">Caret <i class="fa-solid fa-arrow-pointer"></i></h1>
                    <a title="none" class="preference" onclick="setCookie('caret', 'none', 30)">none</a>
                    <a title="caret" class="preference" onclick="setCookie('caret', 'caret', 30)">caret</a>
                    <a title="underlineLetter" class="preference" onclick="setCookie('caret', 'underlineLetter', 30)">underline letter</a>
                    <a title="underlineWord" class="preference" onclick="setCookie('caret', 'underlineWord', 30)">underline word</a>
                    <a title="highlightWord" class="preference" onclick="setCookie('caret', 'highlightWord', 30)">highlight word</a>
                </div>
                <div id="linesContainer" class="rowContainer" style="width: 35%">
                    <h1 class="notSignedIn" id="preferenceHeader">Amount of lines <i class="fa-solid fa-align-left"></i></h1>
                    <a title="1" class="preference" onclick="setCookie('lineCount', 1, 30)">1</a>
                    <a title="2" class="preference" onclick="setCookie('lineCount', 2, 30)">2</a>
                    <a title="3" class="preference" onclick="setCookie('lineCount', 3, 30)">3</a>
                    <a title="4" class="preference" onclick="setCookie('lineCount', 4, 30)">4</a>
                </div>
                <div id="blurContainer" class="rowContainer" style="width: 25%">
                    <h1 class="notSignedIn" id="preferenceHeader">Blur Text <i class="fa-solid fa-eye"></i></h1>
                    <a title="on" class="preference" onclick="setCookie('blur', 'on', 30)">on</a>
                    <a title="off" class="preference" onclick="setCookie('blur', 'off', 30)">off</a>
                </div>
            </div>
        </div>
        <div id="themesContainer" class="rowContainer">
            <h1 id="preferenceHeader">Theme <i class="fa-solid fa-palette"></i></h1>
            <a title="light" id="theme-light" onclick="setCookie('theme', 'light', 30)">light</a>
            <a title="dark" id="theme-dark" onclick="setCookie('theme', 'dark', 30)">dark</a>
            <a title="dracula" id="theme-dracula" onclick="setCookie('theme', 'dracula', 30)">dracula</a>
            <a title="olivia" id="theme-olivia" onclick="setCookie('theme', 'olivia', 30)">olivia</a>
            <a title="mizu" id="theme-mizu" onclick="setCookie('theme', 'mizu', 30)">mizu</a>
            <a title="striker" id="theme-striker" onclick="setCookie('theme', 'striker', 30)">striker</a>
            <a title="blueberry" id="theme-blueberry" onclick="setCookie('theme', 'blueberry', 30)">blueberry</a>
            <a title="creamsicle" id="theme-creamsicle" onclick="setCookie('theme', 'creamsicle', 30)">creamsicle</a>
            <a title="botanical" id="theme-botanical" onclick="setCookie('theme', 'botanical', 30)">botanical</a>
            <a title="luna" id="theme-luna" onclick="setCookie('theme', 'luna', 30)">luna</a>
            <a title="sakura" id="theme-sakura" onclick="setCookie('theme', 'sakura', 30)">sakura</a>
            <a title="8008" id="theme-8008" onclick="setCookie('theme', '8008', 30)">8008</a>
            <a title="9009" id="theme-9009" onclick="setCookie('theme', '9009', 30)">9009</a>
        </div>
    </form>
</body>

</html>
