<?php

session_start();
function getInfo($id)
{
    $mysqli = require __DIR__ . "/config.php";
    $sql = "SELECT user, friend FROM friends";
    $result = $mysqli->query($sql);
    $rowcount = mysqli_num_rows( $result );
    $array = array();
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        if ($row["user"] == $id)
        {
            array_push($array, $row["friend"]);
        }

      }
    }
    return($array);
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
    if($wpmPR < 80)
    {
        $rank = "emerald";
        $range = "emerald (0-80)";
    }
    else if($wpmPR >= 80 && $wpmPR < 100)
    {
        $rank = "silver";
        $range = "silver (80-100)";
    }
    else if($wpmPR >= 100 && $wpmPR < 110)
    {
        $rank = "gold";
        $range = "gold (100-110)";
    }
    else if($wpmPR >= 110 && $wpmPR < 120)
    {
        $rank = "heart";
        $range = "heart (110-120)";
    }
    else
    {
        $rank = "purple";
        $range = "purple (120+)";
    }


    //getting friends
    $friendsArray = getInfo($user["username"]); //all u have to do is input your id 
}
else //if not logged in but somehow managed to get to this page (Neccesary)
{
    header("Location: login.php");
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
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="images\keyboard.ico" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>cozytype</title>
        <link rel="stylesheet" href="style.php">
        <script src="script.js" defer></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    </head>
    <body> 
        <div id="sidebar">
            <a onclick="openSidebar()" ><img id="sidebarImage" width="60" height="60" src="images/follow.png"></a>
        </div>
    <nav>
            <li>CozyTypes</li>
            <li><a id = "play" href="index.php">play</a></li>
            <li><a href="login.php">profile</a></li>
            <li><a href="preferences.php">preferences</a></li>
            <li><a href="learn.php">learn</a></li>
    </nav>
        <div id = profileArea>
            <div id="statsArea">
                <div id="statsRow1">
                        <div id = "showRank" class="statsItem">
                            <img width="100" height="100" display = "block" src="images/user.png">
                            <h1><?= htmlspecialchars($user["username"]) ?></h1>
                        </div>
                        <div id = "showRank" class="statsItem">
                            <div id = "xpBar"></div>
                            <h1>lvl 0</h1>
                        </div>
                        <div id = "showRank" class="statsItem">
                            <img width="100" height="100" display = "block" src="images/<?= $rank ?>.png">
                            <h1><?= $range ?></h1>
                        </div>
                        <div id = "showRank" class="statsItem">
                            <img width="100" height="100" display = "block" src="images/shooting-star.png">
                            <h1><?=$wpmPR?> wpm</h1>
                        </div>

                </div>
                <div id="statsRow1">
                    <a id = "showRank" class="statsItem" href="logout.php">
                            <img width="100" height="100" display = "block" src="images/exit.png">
                            <h1>logout</h1>
                    </a>
            </div>
            <div id = "friendsListArea">
                <div id = "friendsListHeader">Friends</div>
                <div id = "friendsList"></div> 
                <form action = "addFriend.php" method ="post">
                    <div id = "addFriendButton" type="submit" value="submit">Add Friend<input type="text" name = "friendAccount" autocomplete = "off" placeholder="username" id="username" name = "username"></div>
                </form>
                <div id = "closeSidebar" onclick="closeSidebar()">X</div>
            </div>
        </div>
        <script>
// Create element:
        const parent = document.getElementById('friendsList');
        const array =  <?php echo json_encode($friendsArray); ?>;
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
            name.innerHTML='<img width="20" height="20" src="images/user.png">' + array[i];
            div.appendChild(name);
            //invite friend
            const invite = document.createElement("div");
            invite.classList.add("inviteFriend");
            invite.innerHTML="invite";
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
            //
        }
    </script>
    </body>
</html> 
