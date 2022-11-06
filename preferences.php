<!DOCTYPE html>
<html>

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=TAG_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments)
        };
        gtag('js', new Date());
        gtag('config', 'G-9W2ZHHJ7P5');
    </script>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5JMV592" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <link rel="shortcut icon" type="image/x-icon" href="images\panda.ico" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cozytypes</title>
    <link rel="stylesheet" href="style.php">
    <script type="text/javascript" src="script.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Courier+Prime&family=IBM+Plex+Sans&family=Lexend+Deca&family=Lora&family=Merriweather&family=Nunito&family=PT+Serif&family=Raleway&family=Source+Code+Pro&family=Titillium+Web&display=swap" rel="stylesheet">
</head>

<body>
    <?php include "./nav.php" ?>
    <form id="preferencesArea" method="POST" action="preferences.php">
        <div class="preferences">
            <div class="horizontalAlign">
                <div class="rowContainer" style="width: 30%">
                    <h1 class="notSignedIn" id="preferenceHeader">Size</h1>
                    <a onclick="setCookie('fontSize', 1, 30)">1</a>
                    <a onclick="setCookie('fontSize', 2, 30)">2</a>
                    <a onclick="setCookie('fontSize', 3, 30)">3</a>
                    <a onclick="setCookie('fontSize', 4, 30)">4</a>
                    <a onclick="setCookie('fontSize', 5, 30)">5</a>
                </div>
                <div class="rowContainer" style="width: 70%">
                    <h1 class="notSignedIn" id="preferenceHeader">Font</h1>
                    <a style="font-family: Arial;" onclick="setCookie('fontFamily', 'arial', 30)">arial</a>
                    <a style="font-family: 'IBM Plex Sans', sans-serif;" onclick="setCookie('fontFamily', 'ibmplexsans', 30)">IBM Plex Sans</a>
                    <a style="font-family: 'Comfortaa', cursive;" onclick="setCookie('fontFamily', 'comfortaa', 30)">comfortaa</a>
                    <a style="font-family: 'Courier Prime', monospace;" onclick="setCookie('fontFamily', 'courier', 30)">courier</a>
                    <a style="font-family: 'Nunito', sans-serif;" onclick="setCookie('fontFamily', 'nutino', 30)">Nunito</a>
                    <a style="font-family: 'Source Code Pro', monospace;" onclick="setCookie('fontFamily', 'sourcecodepro', 30)">source code pro</a>
                    <a style="font-family: 'Raleway', sans-serif;" onclick="setCookie('fontFamily', 'raleway', 30)">raleway</a>
                    <a style="font-family: 'Titillium Web', sans-serif;" onclick="setCookie('fontFamily', 'titilliumweb', 30)">titillium Web</a>
                    <a style="font-family: 'Lora', serif;" onclick="setCookie('fontFamily', 'lora', 30)">lora</a>
                    <a style="font-family: 'Merriweather', serif;" onclick="setCookie('fontFamily', 'merrieweather', 30)">merriweather</a>
                </div>
            </div>
            <div class="horizontalAlign">
                <div class="rowContainer" style="width: 40%">
                    <h1 class="notSignedIn" id="preferenceHeader">Caret</h1>
                    <a onclick="setCookie('caret', 'none', 30)">none</a>
                    <a onclick="setCookie('caret', 'underline', 30)">underline</a>
                    <a onclick="setCookie('caret', 'highlight', 30)">highlight</a>
                </div>
                <div class="rowContainer" style="width: 35%">
                    <h1 class="notSignedIn" id="preferenceHeader">Amount of lines</h1>
                    <a onclick="setCookie('lineCount', 1, 30)">1</a>
                    <a onclick="setCookie('lineCount', 2, 30)">2</a>
                    <a onclick="setCookie('lineCount', 3, 30)">3</a>
                    <a onclick="setCookie('lineCount', 4, 30)">4</a>
                </div>
                <div class="rowContainer" style="width: 25%">
                    <h1 class="notSignedIn" id="preferenceHeader">Blur Text</h1>
                    <a onclick="setCookie('blur', 'on', 30)">on</a>
                    <a onclick="setCookie('blur', 'off', 30)">off</a>
                </div>
            </div>
        </div>
        <div id="themesContainer" class="rowContainer">
            <h1 id="preferenceHeader">Theme</h1>
            <a id="theme-light" onclick="setCookie('theme', 'light', 30)">light</a>
            <a id="theme-dark" onclick="setCookie('theme', 'dark', 30)">dark</a>
            <a id="theme-olivia" onclick="setCookie('theme', 'olivia', 30)">olivia</a>
            <a id="theme-dracula" onclick="setCookie('theme', 'dracula', 30)">dracula</a>
            <a id="theme-olivia" onclick="setCookie('theme', 'olivia', 30)">olivia</a>
            <a id="theme-8008" onclick="setCookie('theme', '8008', 30)">8008</a>
            <a id="theme-mizu" onclick="setCookie('theme', 'mizu', 30)">mizu</a>
            <a id="theme-striker" onclick="setCookie('theme', 'striker', 30)">striker</a>
            <a id="theme-blueberry" onclick="setCookie('theme', 'blueberry', 30)">blueberry</a>
            <a id="theme-creamsicle" onclick="setCookie('theme', 'creamsicle', 30)">creamsicle</a>
            <a id="theme-botanical" onclick="setCookie('theme', 'botanical', 30)">botanical</a>
            <a id="theme-luna" onclick="setCookie('theme', 'luna', 30)">luna</a>
            <a id="theme-sakura" onclick="setCookie('theme', 'sakura', 30)">sakura</a>
            <a id="theme-8008" onclick="setCookie('theme', '8008', 30)">8008</a>
            <a id="theme-9009" onclick="setCookie('theme', '9009', 30)">9009</a>
        </div>
    </form>
</body>

</html>
