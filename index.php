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
<title>cozytypes | minimalistic typing test</title>
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
    <i class="fa-solid fa-circle-notch" id="loadingIcon"></i>
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
                    <div class="typingModes" onclick="setPreference('typingMode', 'time'); setPreference('time', 15); restart();">15</div>
                    <div class="typingModes" onclick="setPreference('typingMode', 'time'); setPreference('time', 30); restart();">30</div>
                    <div class="typingModes" onclick="setPreference('typingMode', 'time'); setPreference('time', 60); restart();">60</div>
                    <div class="typingModes" onclick="setPreference('typingMode', 'time'); setPreference('time', 120); restart();">120</div>
                </div>
            </div>
            <div class="modeStack">
                <div>words</div>
                <div id = "wordsContainer" style="display: flex">
                    <div class="typingModes" onclick="setPreference('typingMode', 'words'); setPreference('words', 10); restart();">10</div>
                    <div class="typingModes" onclick="setPreference('typingMode', 'words'); setPreference('words', 25); restart();">25</div>
                    <div class="typingModes" onclick="setPreference('typingMode', 'words'); setPreference('words', 50); restart();">50</div>
                    <div class="typingModes" onclick="setPreference('typingMode', 'words'); setPreference('words', 100); restart();">100</div>
                </div>
            </div>
            <div class="modeStack">
                <div>difficulty</div>
                <div id = "modesContainer" style="display: flex">
                    <div class="typingModes" onclick="setPreference('mode', 'easy'); restart()">easy</div>
                    <div class="typingModes" onclick="setPreference('mode', 'hard'); restart()">hard</div>
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
        <div class="keyboardPromo" style="display: flex; align-items: center; background-color: var(--rowBackground); padding: 1.5rem; margin: 1rem; gap: 1.5rem; flex-wrap: wrap;">
            <!-- Text Section -->
            <div style="flex: 1; min-width: 250px; text-align: left;">
                <h1 class="notSignedIn" id="preferenceHeader" style="white-space: normal;">
                    <a href="https://www.melgeek.com/?ref=cozytypes" style="text-decoration: none; color: var(--textColor);">
                    Shop Keyboards and Accessories
                    </a>
                </h1>
                <div style = "font-size: 1.6rem; color: var(--row); padding: 0rem 2rem;">
               Upgrade your typing experience with high-quality keyboards, customizable switches, and premium keycaps. Whether you prefer a fully assembled keyboard or want to build your own,
                <a href="https://www.melgeek.com/?ref=cozytypes" style="text-decoration: none; color: var(--background);">MelGeek</a> 
                has everything you need.
                </div>
                <a id = "shopnow" class="preference" style = "width: 90%" href="https://www.melgeek.com/?ref=cozytypes">Shop Now</a>
            </div>


            <!-- Image -->
            <div style="flex: 1; min-width: 250px;">
                <a id="affiliateProductLink" href="https://www.melgeek.com/?ref=cozytypes">
                    <img id="affiliateImage" class="keyboardPromo" src="" alt="MelGeek Mechanical Keyboard" style="width: 100%; border-radius: 1rem;">
                </a>
            </div>
            <script type="text/javascript">
                // List of image filenames
                const images = [
                    { filename: "made86pink", url: "https://www.melgeek.com/products/made68-pro?ref=cozytypes&variant=45914841415934" }, 
                    { filename: "made86purple", url: "https://www.melgeek.com/products/made68-pro?ref=cozytypes&variant=45914841383166" },
                    { filename: "made86white1", url: "https://www.melgeek.com/products/made68-ultra-aluminum-case-magnetic-keyboard?ref=cozytypes&variant=45917788340478" },
                    { filename: "made86white2", url: "https://www.melgeek.com/products/made68-ultra-aluminum-case-magnetic-keyboard?ref=cozytypes&variant=45917788340478" },
                    { filename: "airbar", url: "https://www.melgeek.com/products/airbar-purple-wrist-rest?ref=cozytypes" },
                    { filename: "cablepurple", url: "https://www.melgeek.com/products/melgeek-themed-cable?ref=cozytypes" },
                    { filename: "case", url: "https://www.melgeek.com/products/anodized-aluminium-case?ref=cozytypes" },
                    { filename: "fishingkeycap", url: "https://www.melgeek.com/products/mg-fishing-full-set?ref=cozytypes" },
                    { filename: "holypanda", url: "https://www.melgeek.com/products/holy-panda?ref=cozytypes" },
                    { filename: "horsemankeycap", url: "https://www.melgeek.com/products/melgeek-mcr-horseman-abs-doubleshot-keycap-set-for-mechanical-keyboard?ref=cozytypes" },
                    { filename: "lightkit", url: "https://www.melgeek.com/products/made68-accessories-set?ref=cozytypes" },
                    { filename: "salonkeycap", url: "https://www.melgeek.com/products/mg-salon-full-set?ref=cozytypes" },
                    { filename: "made86air", url: "https://www.melgeek.com/?ref=cozytypes" },
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

        <div id="displayStats" style = "background-color: var(--background); margin: 1rem 0rem">
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
                <a id="showSignIn" href="signup"><span id="saveProgress">login</span> to save progress<i class="fa-solid fa-medal"></i></a>
            <?php } ?>

        </div>
        <?php } ?>
        <?php include "./footer.php"?>
    </div>
</body>

</html>
