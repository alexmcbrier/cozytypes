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
        <div id = "showSignIn" style = "padding:0rem 2rem;" > Keyboard Build Catalog<i class="fa-solid fa-book"></i></div>
        <div class = "profileValues" style = "padding: 0 1rem">some links help support the site, but all picks are based on what the typing community reccomends.</div>
        <div>
            <div class="statsContainer" style = "background-color: var(--rowBackground);">
                <h1 class="notSignedIn" id="preferenceHeader">keyboards<i class="fa-solid fa-keyboard"></i></h1>
                <a class="results" href = "/switchCatalog" >hello</a>
            </div>
            <div class="statsContainer" style = "background-color: var(--rowBackground);">
                <h1 class="notSignedIn" id="preferenceHeader">keycaps<i class="fa-solid fa-square-h"></i></h1>
                <a class="results">hello</a>
            </div>
            <div class="statsContainer" style = "background-color: var(--rowBackground);">
                <h1 class="notSignedIn" id="preferenceHeader">switches<i class="fa-solid fa-inbox"></i></h1>
                <a class="results">hello</a>
            </div>
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

