<?php
session_start();
?>
<!DOCTYPE html>
<html>

<?php include "./head.php" ?>
<head>
<title>about | cozytypes</title>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9923722164132738"
     crossorigin="anonymous"></script>
</head>
<body>
    <form id="mainContent" style = "gap: 0">
        <?php include "./nav.php" ?>
        <div id = "displayStats retroBox">
            <div class = "statsContainer">
                <h1 class="notSignedIn" id="preferenceHeader" style="margin-left: 0; line-height: 0">about</h1>
                    <h2 class="description">
                    cozytypes.com is a simple typing website for keyboard enthusiasts. test your typing abilities in different modes, track your 
                    progress, and improve your overall typing speed. This website draws inspiration from Monkeytype.com, and I want to express my 
                    gratitude to its creators for providing such a great example in the typing community. Features include typing stats and history for users with accounts, configurations 
                    including theme, font style, typing caret, line count, and more. Designed as a simplistic approach to typing and alternative to other websites,
                    this website is designed to be relaxing and calming as you practice your skills. 
            </div>
        </div>

        <div id = "displayStats retroBox">
            <div class = "statsContainer">
                <h1 class="notSignedIn" id="preferenceHeader" style="margin-left: 0; line-height: 0" >difficulty</h1>
                    <h2 class="description">
                    The site offers two difficulties. 
                    easy mode - which has a word set of the 100 most common words in the english language, intended for beginners.
                    hard mode - which has a word set of 1000 words from the english language, which are intended to be a bit more difficult and longer in length.
                    </h2>
            </div>
        </div>

        <div id = "displayStats retroBox">
            <div class = "statsContainer">
                <h1 class="notSignedIn" id="preferenceHeader" style="margin-left: 0; line-height: 0;" >stats and progress</h1>
                    <h2 class="description">
                    After the typing test ends, users will be able to see their accuracy, wpm, and mode for the completed test. Users who have signed up for an account 
                    have the ability to track these results and all previous history, being able to see there best scores in each mode and category. Additionally, Users
                    signed up for an account have an ability to compete against others on the leaderboard. 
                    wpm - the total number of characters from each word divided by 5 in relation to a one minute typing test.
                    accuracy - the percentage of correct characters in comparison to total characters during the test.
                    </h2>
            </div>
        </div>

        <div id = "displayStats retroBox">
            <div class = "statsContainer">
                <h1 class="notSignedIn" id="preferenceHeader" style="margin-left: 0; line-height: 0;" >feature request</h1>
                    <h2 class="description">
                    If you have any questions, concerns, or ideas about adding a feature please either contact us by email, or submit an
                    issue to us on github.
                    </h2>
            </div>
        </div>

        <div id = "displayStats retroBox">
            <div class = "statsContainer">
                <h1 class="notSignedIn" id="preferenceHeader" style="margin-left: 0; line-height: 0;" >developers</h1>
                    <h2 class="description">
                    Created by Alex McBrier, with the purpose of helping both beginners and experts improve there typing skills.
                    Thank you to Kaffee as well for your collaboration and support on this project. I am excited to bring this game to you and anyone else who may enjoy it. Thank you for your support.
                    </h2>
            </div>
        </div>
        <?php include "./footer.php" ?>
    </form>
</body>

</html>

