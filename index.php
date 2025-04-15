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
    <svg id="loadingBar" data-name="Layer 3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 556.54 171.88">
    <g>
        <g>
        <g>
            <rect x="296.64" width="7.88" height="7.88"/>
            <rect x="288.76" width="7.88" height="7.88"/>
            <rect x="304.51" width="7.88" height="7.88"/>
            <rect x="296.64" y="7.88" width="7.88" height="7.88"/>
            <rect x="296.64" y="15.75" width="7.88" height="7.88"/>
            <rect x="296.64" y="23.63" width="7.88" height="7.88"/>
            <rect x="296.64" y="31.51" width="7.88" height="7.88"/>
            <rect x="296.64" y="39.38" width="7.88" height="7.88"/>
            <rect x="296.64" y="47.26" width="7.88" height="7.88"/>
            <rect x="304.51" y="47.26" width="7.88" height="7.88"/>
            <rect x="288.76" y="47.26" width="7.88" height="7.88"/>
        </g>
        <g>
            <rect x="146.38" width="7.88" height="7.88"/>
            <rect x="154.25" width="7.88" height="7.88"/>
            <rect x="162.13" width="7.88" height="7.88"/>
            <rect x="170.01" y="7.88" width="7.88" height="7.88"/>
            <rect x="138.5" y="7.88" width="7.88" height="7.88"/>
            <rect x="170.01" y="15.75" width="7.88" height="7.88"/>
            <rect x="138.5" y="15.75" width="7.88" height="7.88"/>
            <rect x="170.01" y="23.63" width="7.88" height="7.88"/>
            <rect x="138.5" y="23.63" width="7.88" height="7.88"/>
            <rect x="170.01" y="31.51" width="7.88" height="7.88"/>
            <rect x="138.5" y="31.51" width="7.88" height="7.88"/>
            <rect x="170.01" y="39.38" width="7.88" height="7.88"/>
            <rect x="138.5" y="39.38" width="7.88" height="7.88"/>
            <rect x="146.38" y="47.26" width="7.88" height="7.88"/>
            <rect x="154.25" y="47.26" width="7.88" height="7.88"/>
            <rect x="162.13" y="47.26" width="7.88" height="7.88"/>
        </g>
        <g>
            <rect x="88.42" width="7.88" height="7.88"/>
            <rect x="88.42" y="7.88" width="7.88" height="7.88"/>
            <rect x="88.42" y="15.75" width="7.88" height="7.88"/>
            <rect x="88.42" y="23.63" width="7.88" height="7.88"/>
            <rect x="88.42" y="31.51" width="7.88" height="7.88"/>
            <rect x="88.42" y="39.38" width="7.88" height="7.88"/>
            <rect x="96.3" y="47.26" width="7.88" height="7.88"/>
            <rect x="104.17" y="47.26" width="7.88" height="7.88"/>
            <rect x="112.05" y="47.26" width="7.88" height="7.88"/>
            <rect x="119.93" y="47.26" width="7.88" height="7.88"/>
        </g>
        <g>
            <rect x="196.46" width="7.88" height="7.88"/>
            <rect x="204.34" width="7.88" height="7.88"/>
            <rect x="212.22" width="7.88" height="7.88"/>
            <rect x="220.09" y="7.88" width="7.88" height="7.88"/>
            <rect x="188.59" y="7.88" width="7.88" height="7.88"/>
            <rect x="220.09" y="15.75" width="7.88" height="7.88"/>
            <rect x="188.59" y="15.75" width="7.88" height="7.88"/>
            <rect x="196.46" y="23.63" width="7.88" height="7.88"/>
            <rect x="204.34" y="23.63" width="7.88" height="7.88"/>
            <rect x="212.22" y="23.63" width="7.88" height="7.88"/>
            <rect x="220.09" y="23.63" width="7.88" height="7.88"/>
            <rect x="188.59" y="23.63" width="7.88" height="7.88"/>
            <rect x="220.09" y="31.51" width="7.88" height="7.88"/>
            <rect x="188.59" y="31.51" width="7.88" height="7.88"/>
            <rect x="220.09" y="39.38" width="7.88" height="7.88"/>
            <rect x="188.59" y="39.38" width="7.88" height="7.88"/>
            <rect x="220.09" y="47.26" width="7.88" height="7.88"/>
            <rect x="188.59" y="47.26" width="7.88" height="7.88"/>
        </g>
        <g>
            <rect x="246.55" width="7.88" height="7.88"/>
            <rect x="238.67" width="7.88" height="7.88"/>
            <rect x="254.43" width="7.88" height="7.88"/>
            <rect x="262.3" width="7.88" height="7.88"/>
            <rect x="270.18" y="7.88" width="7.88" height="7.88"/>
            <rect x="238.67" y="7.88" width="7.88" height="7.88"/>
            <rect x="270.18" y="15.75" width="7.88" height="7.88"/>
            <rect x="238.67" y="15.75" width="7.88" height="7.88"/>
            <rect x="270.18" y="23.63" width="7.88" height="7.88"/>
            <rect x="238.67" y="23.63" width="7.88" height="7.88"/>
            <rect x="270.18" y="31.51" width="7.88" height="7.88"/>
            <rect x="238.67" y="31.51" width="7.88" height="7.88"/>
            <rect x="270.18" y="39.38" width="7.88" height="7.88"/>
            <rect x="238.67" y="39.38" width="7.88" height="7.88"/>
            <rect x="246.55" y="47.26" width="7.88" height="7.88"/>
            <rect x="238.67" y="47.26" width="7.88" height="7.88"/>
            <rect x="254.43" y="47.26" width="7.88" height="7.88"/>
            <rect x="262.3" y="47.26" width="7.88" height="7.88"/>
        </g>
        <g>
            <rect x="381" width="7.88" height="7.88"/>
            <rect x="388.87" width="7.88" height="7.88"/>
            <rect x="396.75" width="7.88" height="7.88"/>
            <rect x="404.63" y="7.88" width="7.88" height="7.88"/>
            <rect x="373.12" y="7.88" width="7.88" height="7.88"/>
            <rect x="373.12" y="15.75" width="7.88" height="7.88"/>
            <rect x="373.12" y="23.63" width="7.88" height="7.88"/>
            <rect x="396.75" y="31.51" width="7.88" height="7.88"/>
            <rect x="404.63" y="31.51" width="7.88" height="7.88"/>
            <rect x="373.12" y="31.51" width="7.88" height="7.88"/>
            <rect x="404.63" y="39.38" width="7.88" height="7.88"/>
            <rect x="373.12" y="39.38" width="7.88" height="7.88"/>
            <rect x="381" y="47.26" width="7.88" height="7.88"/>
            <rect x="388.87" y="47.26" width="7.88" height="7.88"/>
            <rect x="396.75" y="47.26" width="7.88" height="7.88"/>
        </g>
        <g>
            <rect x="354.58" width="7.88" height="7.88"/>
            <rect x="323.07" width="7.88" height="7.88"/>
            <rect x="354.58" y="7.88" width="7.88" height="7.88"/>
            <rect x="323.07" y="7.88" width="7.88" height="7.88"/>
            <rect x="330.95" y="15.75" width="7.88" height="7.88"/>
            <rect x="354.58" y="15.75" width="7.88" height="7.88"/>
            <rect x="323.07" y="15.75" width="7.88" height="7.88"/>
            <rect x="338.83" y="23.63" width="7.88" height="7.88"/>
            <rect x="354.58" y="23.63" width="7.88" height="7.88"/>
            <rect x="323.07" y="23.63" width="7.88" height="7.88"/>
            <rect x="346.7" y="31.51" width="7.88" height="7.88"/>
            <rect x="354.58" y="31.51" width="7.88" height="7.88"/>
            <rect x="323.07" y="31.51" width="7.88" height="7.88"/>
            <rect x="354.58" y="39.38" width="7.88" height="7.88"/>
            <rect x="323.07" y="39.38" width="7.88" height="7.88"/>
            <rect x="354.58" y="47.26" width="7.88" height="7.88"/>
            <rect x="323.07" y="47.26" width="7.88" height="7.88"/>
        </g>
        </g>
        <g>
        <rect x="423.16" y="47.26" width="7.88" height="7.88"/>
        <rect x="441.7" y="47.26" width="7.88" height="7.88"/>
        <rect x="460.24" y="47.26" width="7.88" height="7.88"/>
        </g>
    </g>
    <g>
        <polygon class="cls-1" points="278.27 101.92 278.27 154.22 25.46 154.22 25.46 146.43 17.67 146.43 17.67 109.72 25.46 109.72 25.46 101.92 278.27 101.92"/>
        <g>
        <g>
            <rect x="7.88" y="92.14" width="7.88" height="7.88"/>
            <rect x="15.75" y="84.26" width="7.88" height="7.88"/>
            <rect y="100.01" width="7.88" height="7.88"/>
        </g>
        <g>
            <rect x="7.88" y="156.13" width="7.88" height="7.88" transform="translate(-148.25 171.88) rotate(-90)"/>
            <rect x="0" y="148.25" width="7.88" height="7.88" transform="translate(-148.25 156.13) rotate(-90)"/>
            <rect x="15.75" y="164.01" width="7.88" height="7.88" transform="translate(-148.25 187.64) rotate(-90)"/>
        </g>
        <g>
            <rect x="540.78" y="92.14" width="7.88" height="7.88" transform="translate(1089.45 192.15) rotate(180)"/>
            <rect x="532.91" y="84.26" width="7.88" height="7.88" transform="translate(1073.69 176.4) rotate(180)"/>
            <rect x="548.66" y="100.01" width="7.88" height="7.88" transform="translate(1105.2 207.9) rotate(180)"/>
        </g>
        <g>
            <rect x="540.78" y="156.13" width="7.88" height="7.88" transform="translate(384.66 704.79) rotate(-90)"/>
            <rect x="548.66" y="148.25" width="7.88" height="7.88" transform="translate(400.41 704.79) rotate(-90)"/>
            <rect x="532.91" y="164.01" width="7.88" height="7.88" transform="translate(368.9 704.79) rotate(-90)"/>
        </g>
        <rect x="15.75" y="84.26" width="525.03" height="7.88"/>
        <rect x="15.75" y="164.01" width="525.03" height="7.88"/>
        <rect x="548.66" y="100.01" width="7.88" height="56.12"/>
        <rect y="100.01" width="7.88" height="56.12"/>
        </g>
    </g>
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
            <?php if (!isset($_GET["finish"])) { ?>
                setTimeout(function() {
                    // Page is loaded, fade out the loading animation
                    fadeOut('loadingBar');
                    newQuote();
                    zoomwait();
                }, 500); // Wait for one tenth of second (100 milliseconds)
            <?php } else if (isset($_GET["finish"])) { ?>
                fadeOut('loadingBar');
                newQuote();
                zoomwait();
            <?php } ?>
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
            <?xml version="1.0" encoding="UTF-8"?>
            <div id ="resetBox" class = "testItem">
                <svg id="restartTest" onclick="restart()" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 881.37 743.63">
                <g id="j18Oua.tif">
                    <path d="M510.39,0v46.58h92.94v46.42h46.26v46.35h46.32v92.94h46.43v139.45h139.03v46.35h-45.89v46.67h-46.52v46.03h-46.2v46.55h-92.88v-45.95h-46.22v-46.21h-46.53v-46.94h-46.24v-46.36h138.42v-93.07h-45.81v-92.54h-46.31v-46.53h-92.88v-46.24h-185.7v45.73h-92.65v46.51h-46.56v93h-46.03v185.8h45.7v93h46.51v46.32h92.67v46.37h185.72v-45.62h139.04v92.22h-92.62v46.79H232.23v-46.73h-93.33v-46.6h-46.17v-46.35h-46.28v-92.86H0V232.54h46.65v-93.34h46.5v-46.31h46.23v-46.36h92.85V0h278.16Z"/>
                </g>
                </svg>
            </div>
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
            document.getElementById('loadingBar').style.visibility = 'hidden';
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
