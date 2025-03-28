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
        <div id = "showSignIn" style = "padding:0rem 2rem;" >Catalog<i class="fa-solid fa-crown"></i></div>
        <div class = "profileValues" style = "padding: 0 1rem">some links help support the site, but all picks are based on what the typing community reccomends.</div>
        
        <div class="preferences">
            <div class="catalogContainer">
                <div>
                    <h1 id="preferenceHeader">keyboards<i class="fa-solid fa-keyboard"></i></h1>
                </div>
                <div class="theme-row-container">
                    <a class = "color-theme click light " onclick="setTheme(currentTheme, 'light')">light</a>
                    <a class = "color-theme click theme-9009" onclick="setTheme(currentTheme, 'theme-9009')">9009</a>
                    <a class = "color-theme click godspeed" onclick="setTheme(currentTheme, 'godspeed')">godspeed</a>
                </div>
            </div>
            <div class="catalogContainer">
                <div>
                    <h1 id="preferenceHeader">keycaps<i class="fa-solid fa-square-h"></i></h1>
                </div>
                <div class="theme-row-container">
                    <a class = "color-theme click light " onclick="setTheme(currentTheme, 'light')">light</a>
                    <a class = "color-theme click theme-9009" onclick="setTheme(currentTheme, 'theme-9009')">9009</a>
                    <a class = "color-theme click godspeed" onclick="setTheme(currentTheme, 'godspeed')">godspeed</a>
                </div>
            </div>
            <div class="catalogContainer">
                    <div>
                        <h1 id="preferenceHeader">switches<i class="fa-solid fa-inbox"></i></h1>
                    </div>
                    <div class="theme-row-container">
                        <a class = "color-theme click light " onclick="setTheme(currentTheme, 'light')">light</a>
                        <a class = "color-theme click theme-9009" onclick="setTheme(currentTheme, 'theme-9009')">9009</a>
                        <a class = "color-theme click godspeed" onclick="setTheme(currentTheme, 'godspeed')">godspeed</a>
                    </div>
            </div>
            <div class="catalogContainer">
                <div>
                    <h1 id="preferenceHeader">accesories<i class="fa-solid fa-wand-magic-sparkles"></i></h1>
                </div>
                <div class="theme-row-container">
                    <a class = "color-theme click light " onclick="setTheme(currentTheme, 'light')">light</a>
                    <a class = "color-theme click theme-9009" onclick="setTheme(currentTheme, 'theme-9009')">9009</a>
                    <a class = "color-theme click godspeed" onclick="setTheme(currentTheme, 'godspeed')">godspeed</a>
                </div>
            </div>
            <div class="catalogContainer">
                <div>
                    <h1 id="preferenceHeader">diy & customization<i class="fa-solid fa-pen"></i></h1>
                </div>
                <div class="theme-row-container">
                    <a class = "color-theme click light " onclick="setTheme(currentTheme, 'light')">light</a>
                    <a class = "color-theme click theme-9009" onclick="setTheme(currentTheme, 'theme-9009')">9009</a>
                    <a class = "color-theme click godspeed" onclick="setTheme(currentTheme, 'godspeed')">godspeed</a>
                </div>
            </div>
        </div>
        <?php include "./footer.php" ?>
    </form>
</body>

</html>

