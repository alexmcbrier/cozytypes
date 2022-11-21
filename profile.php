<?php
session_start();
function getInfo($id)
{
    $mysqli = require __DIR__ . "/config.php";
    $sql = "SELECT user, friend FROM friends";
    $result = $mysqli->query($sql);
    $rowcount = mysqli_num_rows($result);
    $array = array();
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            if ($row["user"] == $id) {
                array_push($array, $row["friend"]);
            }
        }
    }
    return ($array);
}
if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/config.php";

    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
    $font = htmlspecialchars($user["fontSize"]);
    $id = htmlspecialchars($user["id"]);
    $font = htmlspecialchars($user["fontSize"]);
    $theme = htmlspecialchars($user["theme"]);
    $wpmPR = htmlspecialchars($user["wpm"]);
    $totalTests = htmlspecialchars($user["testsTaken"]);
    //getting friends
    $friendsArray = getInfo($user["username"]); //all u have to do is input your id 

} else //if not logged in but somehow managed to get to this page (Neccesary)
{
    header("Location: login");
}
?>
<!DOCTYPE html>
<html>
<script>
    function openSidebar() {
        document.getElementById('friendsListArea').className = 'sidebarOpen';
        document.getElementById('sidebar').className = 'hideSidebar';
        document.getElementById('statsArea').className = 'statsAreaOpen';
    };

    function closeSidebar() {
        document.getElementById('friendsListArea').className = 'sidebarClose';
        document.getElementById('sidebar').className = 'showSidebar ';
        document.getElementById('statsArea').className = 'statsAreaClosed';
    };
</script>

<?php include "./head.php" ?>

<body class="main-body">
    <div id="sidebar">
        <i style="cursor: pointer" onclick="openSidebar()" class="fa-solid fa-chevron-left"></i>
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
    <div id="friendsListArea">
        <div id="friendsListHeader">Friends</div>
        <div id="friendsList"></div>
        <form style="box-sizing: border-box; width: 100%;" action="addFriend.php" method="post">
            <h3>Add Friend</h3>
            <input type="text" name="friendAccount" autocomplete="off" placeholder="username" id="username" name="username">
        </form>
        <div id="closeSidebar" onclick="closeSidebar()">Close</div>
    </div>
    <script>
        // Create element:
        const parent = document.getElementById('friendsList');
        const array = <?php echo json_encode($friendsArray); ?>;
        const length = <?= count($friendsArray) ?>;
        for (let i = 0; i < length; i++) {
            //user div
            const div = document.createElement("div");
            div.classList.add("friendDiv");
            parent.appendChild(div);
            //profile pic
            //name
            const name = document.createElement("div");
            name.classList.add("friend");
            name.innerHTML = '<img width="20" height="20" src="images/user.png">' + array[i];
            div.appendChild(name);
            //invite friend
            const invite = document.createElement("div");
            invite.classList.add("inviteFriend");
            invite.innerHTML = "invite";
            div.appendChild(invite);
            //remove friend

            const form = document.createElement("form");
            form.setAttribute("class", "removeFriend");
            form.setAttribute("action", "removeFriend.php");
            form.setAttribute("method", "post");
            form.classList.add("removeFriend");
            const button = document.createElement("button");
            button.setAttribute("name", "friendAccount");
            button.setAttribute("value", array[i]);
            button.innerHTML = '<img width="30"height="30" type="submit" value="submit"src="images/delete.png">';
            div.appendChild(form);
            form.appendChild(button);

            function openSidebar() {
                document.getElementById('friendsListArea').className = 'sidebarOpen';
                document.getElementById('sidebar').className = 'hideSidebar';
                document.getElementById('statsArea').className = 'statsAreaOpen';
            };

        }
    </script>
</body>

</html>
