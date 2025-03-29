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
        <div>
            <div class="statsContainer" style = "background-color: var(--rowBackground);">
                <h1 class="notSignedIn" href = "/switchCatalog" id="preferenceHeader">keyboards<i class="fa-solid fa-keyboard"></i></h1>
            </div>
            <div class="statsContainer" style = "background-color: var(--rowBackground);">
                <h1 class="notSignedIn" href = "/switchCatalog" id="preferenceHeader">keycaps<i class="fa-solid fa-square-h"></i></h1>
            </div>
            <div class="statsContainer" style = "background-color: var(--rowBackground);">
                <h1 class="notSignedIn" href = "/switchCatalog" id="preferenceHeader">switches<i class="fa-solid fa-inbox"></i></h1>
            </div>
            <div class="statsContainer" style = "background-color: var(--rowBackground);">
                <h1 class="notSignedIn" href = "/switchCatalog" id="preferenceHeader">accesories<i class="fa-solid fa-wand-magic-sparkles"></i></h1>
            </div>
            <div class="statsContainer" style = "background-color: var(--rowBackground);">
                <h1 class="notSignedIn" href = "/switchCatalog" id="preferenceHeader">diy & customization<i class="fa-solid fa-pen"></i></h1>
            </div>
        </div>  
        <?php include "./footer.php" ?>
    </form>
</body>

</html>

