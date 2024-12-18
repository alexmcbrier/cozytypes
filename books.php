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
<?php include "./booksHead.php" ?>
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
               <div>available books <i class="fa-solid fa-bookmark"></i></div>
               <div id = "timesContainer">
                   <div class="typingModes" onclick="setPreference('typingMode', 'time'); setPreference('selectedTitle', 'huckleberryFinn'); restart();">Huckleberry Finn</div>
                   <div class="typingModes" onclick="setPreference('typingMode', 'time'); setPreference('selectedTitle', 'walden'); restart();">Walden</div>
                   <div class="typingModes" onclick="setPreference('typingMode', 'time'); setPreference('selectedTitle', 'harryPotter'); restart();">Harry Potter</div>
                   <div class="typingModes" onclick="setPreference('typingMode', 'time'); setPreference('selectedTitle', 'catcherInTheRye'); restart();">The Catcher in the Rye</div>
               </div>
           </div>
           <div class="modeStack">
               <div>available poems <i class="fa-solid fa-feather"></i></div>
               <div id = "timesContainer">
                   <div class="typingModes" onclick="setPreference('typingMode', 'time'); setPreference('selectedTitle', 'theRaven'); restart();">The Raven</div>
                   <div class="typingModes" onclick="setPreference('typingMode', 'time'); setPreference('selectedTitle', 'theRoadNotTaken'); restart();">The Road Not Taken</div>
                   <div class="typingModes" onclick="setPreference('typingMode', 'time'); setPreference('selectedTitle', 'doNotGoGentleIntoThatGoodNight'); restart();">Do Not Go Gentle into That Good Night</div>
               </div>
           </div>
        </div>
        <div id="time" class = "testItem" ></div>
        <div id="testText">
            <textarea id="textInput" spellcheck="false" autofocus></textarea>
            <div id="wordsWrapper"></div>
        </div>
        <div>
            <div class="testRow">
                <div id="completionDisplay" class = "testItem" >completion: 0%</div>
            </div> 
            <div class="testRow">
                <div id="wpmDisplay" class = "testItem" >0 wpm</div>
            </div>
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
        <div id="displayStats" style = "background-color: var(--background); margin: 1rem 0rem">
            <div class="statsContainer" style = "background-color: var(--rowBackground); padding: 2.5rem">
                <h1 class="notSignedIn" id="preferenceHeader">Words Per Minute<i class="fa-solid fa-clock-rotate-left"></i></h1>
                <a class="results"><?= $_GET["wpm"] ?></a>
            </div>
            <div class="statsContainer" style = "background-color: var(--rowBackground); padding: 2.5rem">
                <h1 class="notSignedIn" id="preferenceHeader">Accuracy<i class="fa-solid fa-crosshairs"></i></h1>
                <a class="results"><?= $_GET["accuracy"] ?>%</a>
            </div>
            <div class="statsContainer" style = "background-color: var(--rowBackground); padding: 2.5rem">
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
