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
        <div id="displayStats" style = "background-color: var(--background); margin: 1rem 0rem">
            <div class="statsContainer" style = "background-color: var(--rowBackground);">
                <h1 class="notSignedIn" id="preferenceHeader">keyboards<i class="fa-regular fa-keyboard"></i></h1>
                <a class="results">hello</a>
            </div>
            <div class="statsContainer" style = "background-color: var(--rowBackground);">
                <h1 class="notSignedIn" id="preferenceHeader">keycaps<i class="fa-solid fa-square-h"></i></h1>
                <a class="results">hello</a>
            </div>
            <div class="statsContainer" style = "background-color: var(--rowBackground);">
                <h1 class="notSignedIn" id="preferenceHeader">switches<<i class="fa-solid fa-box"></i></h1>
                <a class="results">hello</a>
            </div>
            
        </div>
        <div id="displayStats" style = "background-color: var(--background); margin: 1rem 0rem">
            <div class="statsContainer" style = "background-color: var(--rowBackground);">
                <h1 class="notSignedIn" id="preferenceHeader">accesories<<i class="fa-solid fa-wand-magic-sparkles"></i></h1>
                <a class="results">hello</a>
            </div>
            <div class="statsContainer" style = "background-color: var(--rowBackground);">
                <h1 class="notSignedIn" id="preferenceHeader">diy & customization<i class="fa-solid fa-wrench"></i></h1>
                <a class="results">hello</a>
            </div>
        </div>  
        <?php include "./footer.php" ?>
    </form>
</body>

</html>

