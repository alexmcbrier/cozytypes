<?php
session_start();
//grabbing user session information (neccesary for staying signed in etc.)
if (isset($_COOKIE["id"])) {
    $mysqli = require __DIR__ . "/config.php";
    $hash = $_COOKIE["id"];
    //change to whatever
    $sql = "SELECT id FROM user WHERE password_hash = '$hash'";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    $_SESSION["user_id"] = $user["id"];
}
if (isset($_GET["finish"]))
{
    $wpm = $_GET["wpm"];
    $accuracy = $_GET["accuracy"];
    $mode = $_GET["mode"];
    $testTime = $_GET["testTime"];
    //update the typingtests completed
    $mysqli = require __DIR__ . "/config.php";
    $sql = "INSERT INTO typingtest (id, wpm, accuracy, mode, testTime) 
                VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $mysqli->stmt_init();
        if (!$stmt->prepare($sql)) {
            die("SQL error: " . $mysqli->error);
        }
        $id = 12;
        $stmt->bind_param("iiisi", $_SESSION["user_id"], $wpm, $accuracy, $mode, $testTime);   
        $stmt->execute();
        $stmt->close();

    $sql = "INSERT INTO typingtest (wpm) 
    VALUES ('$wpm')";
    if (isset($_SESSION["user_id"])) {
        $mysqli = require __DIR__ . "/config.php";
        $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();
        $wpmPR = htmlspecialchars($user["wpm"]);
        $id = ($user["id"]);
        //if the wpm is higher update
        if ($wpm > $wpmPR)
        {
            $sql = "UPDATE user SET wpm='$wpm' WHERE id=$id";
            if ($mysqli->query($sql) === TRUE) {
            } else {
            }
        }
        //
        //update total tests taken
        $testsTaken  = $user["testsTaken"] + 1;
        $sql = "UPDATE user SET testsTaken ='$testsTaken' WHERE id=$id";
        if ($mysqli->query($sql) === TRUE) {
        } else {
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include "./head.php" ?>
<head>
<title>cozytypes | a minimal typing test</title>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9923722164132738"
crossorigin="anonymous"></script>
</head>
<body class="main-body">
    <?php if (!isset($_GET["finish"])) { ?> <!-- only show if taking test, not complete -->
        <div id="cursor"></div>
    <?php } ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5JMV592" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
        <?xml version="1.0" encoding="UTF-8"?>
        <svg class = "spinner"id="_ëÎÓÈ_1" data-name="ëÎÓÈ 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1273.85 1247.54">
        <defs>
            <style>
            .cls-1 {
                fill: #1d1d1b;
            }
            </style>
        </defs>
        <polygon class="cls-1" points="1172.01 941.05 1120.1 941.05 1120.1 941.06 1070.19 941.06 1069.19 941.06 1019.27 941.06 1018.27 941.06 968.36 941.06 967.36 941.06 917.44 941.06 916.44 941.06 865.52 941.06 865.52 992.97 916.44 992.97 917.44 992.97 967.36 992.97 968.36 992.97 1018.27 992.97 1018.27 992.97 1018.27 1042.88 967.36 1042.88 967.36 1093.79 967.36 1093.8 916.44 1093.8 916.44 1144.71 866.54 1144.71 866.54 1144.71 815.63 1144.71 814.63 1144.71 763.71 1144.71 763.71 1195.62 763.71 1195.63 713.79 1195.63 712.79 1195.63 662.88 1195.63 662.88 1195.63 611.97 1195.63 610.97 1195.63 561.05 1195.63 560.05 1195.63 510.14 1195.63 509.14 1195.63 459.22 1195.63 458.22 1195.63 408.31 1195.63 408.31 1195.62 408.31 1144.71 357.4 1144.71 357.4 1093.8 306.48 1093.8 305.48 1093.8 255.57 1093.8 255.57 1043.88 255.57 1042.88 255.57 991.96 203.66 991.96 203.66 991.97 153.74 991.97 153.74 942.06 153.74 941.06 153.74 890.14 102.83 890.14 102.83 840.23 102.83 839.23 102.83 788.32 51.92 788.32 51.92 738.4 51.92 737.4 51.92 687.49 51.92 686.49 51.92 636.58 51.92 635.58 51.92 585.66 51.92 584.66 51.92 534.75 51.92 533.75 51.92 483.84 51.92 483.84 102.83 483.84 102.83 432.91 102.83 431.91 102.83 381 50.92 381 50.92 431.91 50.92 431.92 .01 431.92 .01 482.84 .01 483.84 .01 533.75 0 533.75 0 584.66 0 585.66 0 635.58 0 636.58 0 686.49 0 687.49 0 737.4 0 738.4 0 789.32 .01 789.32 .01 840.24 50.92 840.24 50.92 890.14 50.92 891.14 50.92 942.06 101.83 942.06 101.83 991.97 101.82 991.97 101.82 1043.88 152.74 1043.88 153.74 1043.88 203.66 1043.88 203.66 1043.88 203.66 1093.8 203.66 1094.8 203.66 1145.71 254.57 1145.71 255.57 1145.71 305.48 1145.71 305.48 1196.63 356.4 1196.63 356.4 1247.54 408.31 1247.54 408.31 1247.54 458.22 1247.54 459.22 1247.54 509.14 1247.54 510.14 1247.54 560.05 1247.54 561.05 1247.54 610.97 1247.54 611.97 1247.54 661.88 1247.54 661.88 1247.54 712.79 1247.54 713.79 1247.54 764.71 1247.54 764.71 1247.54 815.63 1247.54 815.63 1196.62 865.52 1196.62 865.52 1196.63 916.44 1196.63 917.44 1196.63 968.36 1196.63 968.36 1145.72 968.36 1145.71 1019.27 1145.71 1019.27 1094.8 1070.18 1094.8 1070.18 1043.89 1070.19 1043.89 1070.19 1043.88 1120.1 1043.88 1120.1 1093.8 1120.1 1094.8 1120.1 1144.71 1120.1 1145.71 1120.1 1196.62 1172.01 1196.62 1172.01 1145.71 1172.01 1144.71 1172.01 1094.8 1172.01 1093.8 1172.01 1043.88 1172.01 1042.88 1172.01 991.97 1172.01 991.97 1172.01 941.05"/>
        <polygon class="cls-1" points="1273.84 458.22 1273.84 407.3 1222.93 407.3 1222.93 357.41 1222.93 356.41 1222.93 305.49 1172.02 305.49 1172.02 255.58 1172.03 255.58 1172.03 203.66 1121.11 203.66 1120.11 203.66 1070.19 203.66 1070.19 203.66 1070.19 153.75 1070.19 152.75 1070.19 101.84 1019.28 101.84 1018.28 101.84 968.37 101.84 968.37 50.91 917.45 50.91 917.45 0 865.54 0 865.54 0 815.63 0 814.63 0 764.71 0 763.71 0 713.8 0 712.8 0 662.88 0 661.88 0 611.97 0 611.97 0 561.06 0 560.06 0 509.14 0 509.14 0 458.22 0 458.22 50.92 408.33 50.92 408.33 50.91 357.41 50.91 356.41 50.91 305.5 50.91 305.5 101.83 305.5 101.83 254.58 101.83 254.58 152.74 254.58 152.74 254.58 152.75 203.67 152.75 203.67 203.66 153.76 203.66 153.75 203.66 153.75 153.74 153.75 152.74 153.75 102.84 153.75 101.83 153.75 50.92 101.84 50.92 101.84 101.83 101.84 102.84 101.84 152.74 101.84 153.74 101.84 204.66 101.85 204.66 101.85 254.57 101.85 255.57 101.85 306.49 153.76 306.49 153.76 306.48 203.67 306.48 204.67 306.48 254.58 306.48 255.58 306.48 305.5 306.48 306.5 306.48 356.41 306.48 357.41 306.48 408.33 306.48 408.33 254.57 357.41 254.57 356.41 254.57 306.5 254.57 305.5 254.57 255.58 254.57 255.58 254.57 255.58 204.66 255.58 204.66 306.5 204.66 306.5 153.75 357.41 153.75 357.41 102.83 407.31 102.83 407.31 102.84 458.22 102.84 459.22 102.84 510.14 102.84 510.14 51.92 510.14 51.91 560.06 51.91 561.06 51.91 610.97 51.91 610.97 51.91 661.88 51.91 662.88 51.91 712.8 51.91 713.8 51.91 763.71 51.91 764.71 51.91 814.63 51.91 815.63 51.91 865.54 51.91 865.54 51.92 865.54 102.84 916.45 102.84 916.45 153.75 967.37 153.75 968.37 153.75 1018.28 153.75 1018.28 203.66 1018.28 204.66 1018.28 255.58 1070.19 255.58 1070.19 255.58 1120.11 255.58 1120.11 305.49 1120.11 306.49 1120.11 357.41 1171.02 357.41 1171.02 407.32 1171.02 408.32 1171.02 459.22 1221.93 459.22 1221.93 509.15 1221.93 510.15 1221.93 560.05 1221.93 561.05 1221.93 610.96 1221.93 611.96 1221.93 661.88 1221.93 662.88 1221.93 712.79 1221.93 713.79 1221.93 763.71 1171.02 763.71 1171.02 814.62 1171.02 815.62 1171.02 866.54 1222.93 866.54 1222.93 815.62 1273.84 815.62 1273.84 764.71 1273.84 763.71 1273.84 713.79 1273.85 713.79 1273.85 662.88 1273.85 661.88 1273.85 611.96 1273.85 610.96 1273.85 561.05 1273.85 560.05 1273.85 510.15 1273.85 509.15 1273.85 458.22 1273.84 458.22"/>
        </svg>
    <div id="mainContent">
        <?php include "./nav.php" ?>
        <script type="text/javascript">
        function fadeOut(id)
        {
            document.getElementById(id).style.opacity = 0;
            document.getElementById(id).style.display = 'none';
            document.getElementById('middle').style.opacity = '100%';
            document.getElementById('footer').style.opacity = '100%';
            document.getElementById('middle').style.filter = 'none';
            document.getElementById('footer').style.filter = 'none';
        }
        window.addEventListener('load', function() {
            setTimeout(function() {
            // Page is loaded, fade out the loading animation
            fadeOut('loadingIcon');
            newQuote();
            zoomwait();
            }, 100); // Wait for one tenth of second (100 milliseconds)
        });
        
    </script>
        <!-- Display if test not complete -->
        <div id="middle" class = "blur">
        <?php if (!isset($_GET["finish"])) { ?>
            <div id="typingmode">
            <div class="modeStack">
                <div>time</div>
                <div id = "timesContainer" style="display: flex">
                    <div class="typingModes click" onclick="setPreference('typingMode', 'time'); setPreference('time', 15); restart();">15</div>
                    <div class="typingModes click" onclick="setPreference('typingMode', 'time'); setPreference('time', 30); restart();">30</div>
                    <div class="typingModes click" onclick="setPreference('typingMode', 'time'); setPreference('time', 60); restart();">60</div>
                    <div class="typingModes click" onclick="setPreference('typingMode', 'time'); setPreference('time', 120); restart();">120</div>
                </div>
            </div>
            <div class="modeStack">
                <div>words</div>
                <div id = "wordsContainer" style="display: flex">
                    <div class="typingModes click" onclick="setPreference('typingMode', 'words'); setPreference('words', 10); restart();">10</div>
                    <div class="typingModes click" onclick="setPreference('typingMode', 'words'); setPreference('words', 25); restart();">25</div>
                    <div class="typingModes click" onclick="setPreference('typingMode', 'words'); setPreference('words', 50); restart();">50</div>
                    <div class="typingModes click" onclick="setPreference('typingMode', 'words'); setPreference('words', 100); restart();">100</div>
                </div>
            </div>
            <div class="modeStack">
                <div>difficulty</div>
                <div id = "modesContainer" style="display: flex">
                    <div class="typingModes click" onclick="setPreference('mode', 'easy'); restart()">easy</div>
                    <div class="typingModes click" onclick="setPreference('mode', 'hard'); restart()">hard</div>
                </div>
            </div>
        </div>
        <div id="time" class = "testItem" ></div>
        <div id="testText">
            <textarea id="textInput" spellcheck="false" autofocus></textarea>
            <div id="wordsWrapper"></div>
        </div>
        <div class="testRow">
            <div id ="resetBox" class = "testItem"><i id="restartTest"class="fa-solid fa-rotate" onclick="restart()"></i></div>
        </div>
        <div class="testRow">
            <div id="wpmDisplay" class = "testItem" >0 wpm</div>
        </div>
        </div>
        <?php } else if (isset($_GET["finish"])) { ?>
        <!-- Display if test IS complete -->
        <script type="text/javascript">
            window.addEventListener('keydown', function (event) {
                // Check if the pressed key is the 'Tab' key (key code 9)
                if (event.key === 'Tab' || event.keyCode === 9) {
                    // Prevent the default tab key behavior
                    event.preventDefault();

                    // restart typing test
                    window.location.href = "https://cozytypes.com";
                }
            });
        </script>
        <!-- 
        <div class="keyboardPromo" style="display: flex; align-items: center; background-color: var(--rowBackground); padding: 1.5rem; margin: 1rem; gap: 1.5rem; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 250px; text-align: left;">
                <h1 class="notSignedIn" id="preferenceHeader" style="white-space: normal;">
                    <a href="https://www.melgeek.com/?ref=cozytypes" style="text-decoration: none; color: var(--textColor);">
                    Shop Keyboards and Accessories
                    </a>
                </h1>
                
                <div style = "font-size: 2rem; color: var(--row); padding: 0rem 2rem;">
                    Use code COZYTYPES for 8% off keyboards, switches, and keycaps at MelGeek.
                </div>
                <a id = "shopnow" class="preference" style = "width: 90%" href="https://www.melgeek.com/?ref=cozytypes">Shop Now</a>
            </div>

            <div style="flex: 1; min-width: 250px;">
                <a id="affiliateProductLink" href="https://www.melgeek.com/?ref=cozytypes">
                    <img id="affiliateImage" class="keyboardPromo" src="" alt="MelGeek Mechanical Keyboard" style="width: 100%; border-radius: 1rem;">
                </a>
            </div>
            <script type="text/javascript">
                // List of image filenames
                const images = [
                    { filename: "airbar", url: "https://www.melgeek.com/products/airbar-purple-wrist-rest?ref=cozytypes" },
                    { filename: "cablepurple", url: "https://www.melgeek.com/products/melgeek-themed-cable?ref=cozytypes" },
                    { filename: "case", url: "https://www.melgeek.com/products/anodized-aluminium-case?ref=cozytypes" },
                    { filename: "made86air", url: "https://www.melgeek.com/?ref=cozytypes" },
                    { filename: "made86air", url: "https://www.melgeek.com/?ref=cozytypes" },
                    { filename: "made86smoke", url: "https://www.melgeek.com/?ref=cozytypes" },
                    { filename: "made86smoke", url: "https://www.melgeek.com/?ref=cozytypes" }
                ];
                // Randomly pick an image object
                const randomImage = images[Math.floor(Math.random() * images.length)];

                const img = new Image();
                img.src = `images/melgeek/${randomImage.filename}.png`;
                
                // Once the image loads, update the DOM and fade it in
                img.onload = function() {
                    const affiliateImage = document.getElementById("affiliateImage");
                    const affiliateProductLink = document.getElementById("affiliateProductLink");
                    
                    affiliateImage.src = img.src;
                    affiliateProductLink.href = randomImage.url;
                    
                    // Fade in the image
                    affiliateImage.style.opacity = "1";
                }
            </script>

        </div>
        -->
        <div id="testStats" style = "background-color: var(--background); margin: 1rem 0rem">
            <div class="statsContainer" style = "background-color: var(--rowBackground);">
                <h1 class="notSignedIn" id="preferenceHeader">Words Per Minute<i class="fa-solid fa-clock-rotate-left"></i></h1>
                <a class="results"><?= $_GET["wpm"] ?></a>
            </div>
            <div class="statsContainer" style = "background-color: var(--rowBackground);">
                <h1 class="notSignedIn" id="preferenceHeader">Accuracy<i class="fa-solid fa-crosshairs"></i></h1>
                <a class="results"><?= $_GET["accuracy"] ?>%</a>
            </div>
            <div class="statsContainer" style = "background-color: var(--rowBackground);">
                <h1 class="notSignedIn" id="preferenceHeader"><?= $_GET["mode"] ?><i class="fa-regular fa-hourglass-half"></i></h1>
                <a class="results"><?= $_GET["testTime"] ?></a>
            </div>
        </div>

            <a id="showRestart" href="https://cozytypes.com/">play again<i class="fa-solid fa-backward"></i></a>
            <?php if (isset($_SESSION["user_id"])) { ?>
                <a id="showRestart" href="signup">view progress<i class="fa-solid fa-medal"></i></a>
            <?php } else { ?>
                <a id="showSignIn" href="signup"><span id="saveProgress">login to save progress<i class="fa-solid fa-medal"></i></a>
            <?php } ?>

        </div>
        <?php } ?>
        <?php include "./footer.php"?>
    </div>
</body>

</html>
