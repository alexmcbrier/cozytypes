<?php
session_start();
?>
<!DOCTYPE html>
<html>
<?php include "./head2.php" ?>
<body class="main-body">
    <div id="mainContent">
        <?php include "./nav.php" ?>
        <div class="preferences">
            <div id="sizesContainer" class="aboutContainer">
                <h1 class="notSignedIn" id="preferenceHeader" style="margin-left: 0" >about us</h1>
                <h1 class="aboutDescription">
                cozytypes is a simple typing website created by Alex McBrier,
                a student at Boston University, to test your typing abilities in different modes, track your 
                progress, and improve your overall typing speed. 
                I am excited to bring this game to you and anyone else who 
                may enjoy it, and am looking forward to hearing feedback.<br><br>
                Contact via email: <a class = "aboutLink" href="mailto:cozytypes@cozytypes.com">cozytypes@cozytypes.com</a>
                </h1>
            </div>
        </div>
        <?php include "./footer.php" ?>
    </div>
</body>

</html>
