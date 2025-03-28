<?php
session_start();
?>
<!DOCTYPE html>
<html>

<?php include "./head.php" ?>
<head>
<title>catalog | cozytypes</title>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9923722164132738"
     crossorigin="anonymous"></script>
</head>
<body>
    <form id="mainContent" method="POST" action="preferences.php">
        <?php include "./nav.php" ?>


        <div id="themesContainer" class="theme-row-container">
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
        <div id="displayStats" style = "background-color: var(--background); margin: 1rem 0rem">
            <div class="statsContainer" style = "background-color: var(--rowBackground);">
                <h1 class="notSignedIn" id="preferenceHeader">keyboards<i class="fa-solid fa-keyboard"></i></h1>
                <a class="results">hello</a>
            </div>
            <div class="statsContainer" style = "background-color: var(--rowBackground);">
                <h1 class="notSignedIn" id="preferenceHeader">keycaps<i class="fa-solid fa-square-h"></i></h1>
                <a class="results">hello</a>
            </div>
            <div class="statsContainer" style = "background-color: var(--rowBackground);">
                <h1 class="notSignedIn" id="preferenceHeader">switches<i class="fa-solid fa-inbox"></i></h1>
                <a class="results">hello</a>
            </div>
            
        </div>
        <div id="displayStats" style = "background-color: var(--background); margin: 1rem 0rem">
            <div class="statsContainer" style = "background-color: var(--rowBackground);">
                <h1 class="notSignedIn" id="preferenceHeader">accesories<i class="fa-solid fa-wand-magic-sparkles"></i></h1>
                <a class="results">hello</a>
            </div>
            <div class="statsContainer" style = "background-color: var(--rowBackground);">
                <h1 class="notSignedIn" id="preferenceHeader">diy & customization<i class="fa-solid fa-pen"></i></h1>
                <a class="results">hello</a>
            </div>
        </div>  
        <?php include "./footer.php" ?>
    </form>
</body>

</html>

