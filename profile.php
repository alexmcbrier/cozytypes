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
    $query = "SELECT * FROM typingtest WHERE id = {$_SESSION["user_id"]}";
    
    // Prepare the statement
    $stmt = $mysqli->prepare($query);

    // Bind the user ID from the session to the query
    $stmt->bind_param("i", $_SESSION["user_id"]);

    // Execute the query
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    // Fetch all rows
    $userData = $result->fetch_all(MYSQLI_ASSOC);

    // Output HTML for each row
    echo '<div id="user-data-container">';
    foreach ($userData as $row) {
        // Adjust column names as needed
        echo "<p>User ID: " . $row['id'] . " - Name: " . $row['name'] . "</p>";
    }
    echo '</div>';
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
                    <h1 class="notSignedIn" id="preferenceHeader">tests completed<i class="fa-solid fa-chart-line"></i></h1>
                    <a class="results"><?= $totalTests ?> tests</a>
                </div>
                <div class="statsContainer">
                    <h1 class="notSignedIn" id="preferenceHeader">highest wpm<i class="fa-solid fa-crown"></i></h1>
                    <a class="results"><?= $wpmPR ?> wpm</a>
                </div>
            </div>
            <a id = "showRestart" class="notSignedIn" href="logout.php">logout<i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
        <?php include "./footer.php" ?>
    </div>
</body>

</html>
