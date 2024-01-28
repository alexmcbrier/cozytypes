<?php
session_start();
if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/config.php";
    //user table
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    $font = htmlspecialchars($user["fontSize"]);
    $id = htmlspecialchars($user["id"]);
    $font = htmlspecialchars($user["fontSize"]);
    $theme = htmlspecialchars($user["theme"]);
    $wpmPR = htmlspecialchars($user["wpm"]);
    $totalTests = htmlspecialchars($user["testsTaken"]);
    //typingtest table
    // Fetch user data from the database

    //find total tests and find highest wpm
    $query = "SELECT * FROM typingtest WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($query);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $totalMaxWpm = 0;
    $totalCount = 0;
    foreach ($rows as $row) {
        if ($row['wpm'] > $totalMaxWpm) {
            $totalMaxWpm = $row['wpm'];
        }
        $totalCount++;
        // Update for additional columns as needed
    }

    //15s stats
    $query = "SELECT * FROM typingtest WHERE id = {$_SESSION["user_id"]} AND mode = 'time' AND testTime = 15";
    $result = $mysqli->query($query);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $count15s = 0;
    $maxWpm15s = 0;
    $accuracyForMaxWpm15s = 0;
    foreach ($rows as $row) {
        if ($row['wpm'] > $maxWpm15s) {
            $maxWpm15s = $row['wpm'];
            $accuracyForMaxWpm15s = $row['accuracy'];
        }
        $count15s++;
        // Update for additional columns as needed
    }

    //30s stats
    $query = "SELECT * FROM typingtest WHERE id = {$_SESSION["user_id"]} AND mode = 'time' AND testTime = 30";
    $result = $mysqli->query($query);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $count30s = 0;
    $maxWpm30s = 0;
    $accuracyForMaxWpm30s = 0;
    foreach ($rows as $row) {
        if ($row['wpm'] > $maxWpm30s) {
            $maxWpm30s = $row['wpm'];
            $accuracyForMaxWpm30s = $row['accuracy'];
        }
        $count30s++;
        // Update for additional columns as needed
    }

    //60s stats
    $query = "SELECT * FROM typingtest WHERE id = {$_SESSION["user_id"]} AND mode = 'time' AND testTime = 60";
    $result = $mysqli->query($query);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $count60s = 0;
    $maxWpm60s = 0;
    $accuracyForMaxWpm60s = 0;
    foreach ($rows as $row) {
        if ($row['wpm'] > $maxWpm60s) {
            $maxWpm60s = $row['wpm'];
            $accuracyForMaxWpm60s = $row['accuracy'];
        }
        $count60s++;
        // Update for additional columns as needed
    }
    
    //120s stats
    $query = "SELECT * FROM typingtest WHERE id = {$_SESSION["user_id"]} AND mode = 'time' AND testTime = 120";
    $result = $mysqli->query($query);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $count120s = 0;
    $maxWpm120s = 0;
    $accuracyForMaxWpm120s = 0;
    foreach ($rows as $row) {
        if ($row['wpm'] > $maxWpm120s) {
            $maxWpm120s = $row['wpm'];
            $accuracyForMaxWpm120s = $row['accuracy'];
        }
        $count120s++;
        // Update for additional columns as needed
    }

    //10w stats
    $query = "SELECT * FROM typingtest WHERE id = {$_SESSION["user_id"]} AND mode = 'words' AND testTime = 10";
    $result = $mysqli->query($query);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $count10w = 0;
    $maxWpm10w = 0;
    $accuracyForMaxWpm10w = 0;
    foreach ($rows as $row) {
        if ($row['wpm'] > $maxWpm10w) {
            $maxWpm10w = $row['wpm'];
            $accuracyForMaxWpm10w = $row['accuracy'];
        }
        $count10w++;
        // Update for additional columns as needed
    }

    //25w stats
    $query = "SELECT * FROM typingtest WHERE id = {$_SESSION["user_id"]} AND mode = 'words' AND testTime = 25";
    $result = $mysqli->query($query);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $count25w = 0;
    $maxWpm25w = 0;
    $accuracyForMaxWpm25w = 0;
    foreach ($rows as $row) {
        if ($row['wpm'] > $maxWpm25w) {
            $maxWpm25w = $row['wpm'];
            $accuracyForMaxWpm25w = $row['accuracy'];
        }
        $count25w++;
        // Update for additional columns as needed
    }

    //50w stats
    $query = "SELECT * FROM typingtest WHERE id = {$_SESSION["user_id"]} AND mode = 'words' AND testTime = 50";
    $result = $mysqli->query($query);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $count50w = 0;
    $maxWpm50w = 0;
    $accuracyForMaxWpm50w = 0;
    foreach ($rows as $row) {
        if ($row['wpm'] > $maxWpm50w) {
            $maxWpm50w = $row['wpm'];
            $accuracyForMaxWpm50w = $row['accuracy'];
        }
        $count50w++;
        // Update for additional columns as needed
    }
    
    //100w stats
    $query = "SELECT * FROM typingtest WHERE id = {$_SESSION["user_id"]} AND mode = 'words' AND testTime = 100";
    $result = $mysqli->query($query);
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $count100w = 0;
    $maxWpm50w = 0;
    $accuracyForMaxWpm100w = 0;
    foreach ($rows as $row) {
        if ($row['wpm'] > $maxWpm100w) {
            $maxWpm100w = $row['wpm'];
            $accuracyForMaxWpm50w = $row['accuracy'];
        }
        $count100w++;
        // Update for additional columns as needed
    }


} else //if not logged in but somehow managed to get to this page (Neccesary)
{
    header("Location: login");
}
?>
<!DOCTYPE html>
<html>
<?php include "./head2.php" ?>

<body class="main-body">
    <div id="sidebar">
        <i style="cursor: pointer" onclick="openSidebar()" id = "sidebarIcon" class="fa-solid fa-chevron-left"></i>
    </div>
    <div id="mainContent">
        <?php include "./nav.php" ?>
        <div id="middle">
            <div id="displayStats">
                <div class="statsContainer"> 
                    <h1 class="notSignedIn" id="preferenceHeader"><?= htmlspecialchars($user["username"]) ?><i class="fa-regular fa-user"></i></h1>
                </div>
                <div class="statsContainer">
                    <h1 class="notSignedIn" id="preferenceHeader">total tests completed<i class="fa-solid fa-chart-line"></i></h1>
                    <a class="results"><?= $totalCount ?> tests</a>
                </div>
                <div class="statsContainer">
                    <h1 class="notSignedIn" id="preferenceHeader">highest wpm<i class="fa-solid fa-crown"></i></h1>
                    <a class="results"><?= $totalMaxWpm ?> wpm</a>
                </div>
            </div>
            <div id = "preferenceHeader" style = "font-weight: bold; padding: 2rem;" >personal bests</div>
            <div id="displayStats">
                <div class="statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">  15 seconds  </div>
                    <div class = "results">wpm <span style = "color: var(--testText)"><?= $maxWpm15s ?></span></div>
                    <div class = "results">accuracy <span style = "color: var(--testText)"><?= $accuracyForMaxWpm15s ?></span></div>
                    <div class = "results">tests <span style = "color: var(--testText)"><?= $count15s ?></span></div>
                </div>
                <div class="statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">  30 seconds  </div>
                    <div class = "results">wpm <span style = "color: var(--testText)"><?= $maxWpm30s ?></span></div>
                    <div class = "results">accuracy <span style = "color: var(--testText)"><?= $accuracyForMaxWpm30s ?></span></div>
                    <div class = "results">tests <span style = "color: var(--testText)"><?= $count30s ?></span></div>
                </div>
                <div class="statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">  60 seconds  </div>
                    <div class = "results">wpm <span style = "color: var(--testText)"><?= $maxWpm60s ?></span></div>
                    <div class = "results">accuracy <span style = "color: var(--testText)"><?= $accuracyForMaxWpm60s ?></span></div>
                    <div class = "results">tests <span style = "color: var(--testText)"><?= $count60s ?></span></div>
                </div>
                <div class="statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">  120 seconds </div>
                    <div class = "results">wpm <span style = "color: var(--testText)"><?= $maxWpm120s ?></span></div>
                    <div class = "results">accuracy <span style = "color: var(--testText)"><?= $accuracyForMaxWpm120s ?></span></div>
                    <div class = "results">tests <span style = "color: var(--testText)"><?= $count120s ?></span></div>
                </div>
            </div>
            <div id="displayStats">
                <div class="statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">   10 words    </div>
                    <div class = "results">wpm <span style = "color: var(--testText)"><?= $maxWpm10w ?></span></div>
                    <div class = "results">accuracy <span style = "color: var(--testText)"><?= $accuracyForMaxWpm10w ?></span></div>
                    <div class = "results">tests <span style = "color: var(--testText)"><?= $count10w ?></span></div>
                </div>
                <div class="statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">   25 words    </div>
                    <div class = "results">wpm <span style = "color: var(--testText)"><?= $maxWpm25w ?></span></div>
                    <div class = "results">accuracy <span style = "color: var(--testText)"><?= $accuracyForMaxWpm25w ?></span></div>
                    <div class = "results">tests <span style = "color: var(--testText)"><?= $count25w ?></span></div>
                </div>
                <div class="statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">    50 words    </div>
                    <div class = "results">wpm <span style = "color: var(--testText)"><?= $maxWpm50w ?></span></div>
                    <div class = "results">accuracy <span style = "color: var(--testText)"><?= $accuracyForMaxWpm50w ?></span></div>
                    <div class = "results">tests <span style = "color: var(--testText)"><?= $count50w ?></span></div>
                </div>
                <div class="statsContainer">
                    <div id = "preferenceHeader" class = "notSignedIn">   100 words   </div>
                    <div class = "results">wpm <span style = "color: var(--testText)"><?= $maxWpm100w ?></span></div>
                    <div class = "results">accuracy <span style = "color: var(--testText)"><?= $accuracyForMaxWpm100w ?></span></div>
                    <div class = "results">tests <span style = "color: var(--testText)"><?= $count100w ?></span></div>
                </div>
            </div>
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
            </div>
            <div id="themesContainer" class="rowContainer">
                <h1 id="preferenceHeader">color theme <i class="fa-solid fa-palette"></i></h1>
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
            <a id = "showRestart" class="notSignedIn" href="logout.php">logout<i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
        <?php include "./footer.php" ?>
    </div>
</body>

</html>
