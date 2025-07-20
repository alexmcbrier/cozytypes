<?php
if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/config.php";
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
} ?>
<nav> 
    <a id = "logo" href="/" style="text-decoration: none;">
        <p id = "title">cozytypes</p>
    </a>
    <a class = "navIcon" href="/" >home</a>
    <a class = "navIcon" href="/preferences">settings</a>
    <a class = "navIcon" href="/leaderboard">leaderboard</a>
    <a href="/signup" id="profileIconLink">
        <svg id="profileIcon" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 2000 2000">
            <!-- Generator: Adobe Illustrator 29.4.0, SVG Export Plug-In . SVG Version: 2.1.0 Build 152)  -->
            <rect class="st0" width="2000" height="2000"/>
            <path class="st1" d="M1411.03,532.15h56.82v56.82h56.82v822.06h-56.82v56.82h-56.82v56.82h-822.06v-56.82h-56.82v-56.82h-56.82v-822.06h56.82v-56.82h56.82v-56.82h822.06v56.82h0ZM724.39,1203.29h56.82v-56.82h380.76v56.82h56.82v160.72h56.82v-160.72h-56.82v-56.82h-56.82v-56.82h-323.94v113.65h-56.82v160.72h-56.82v-160.72h0ZM857.93,976h226.37v-56.82h113.65v-169.54h-56.82v-56.82h-56.82v-56.82h-169.54v113.65h-56.82v226.37h0ZM914.75,976v56.82h169.54v-56.82h56.82v-226.37h-56.82v-56.82h-226.37v56.82h-56.82v169.54h113.65v56.82h0ZM588.97,1467.85h822.06v-56.82h56.82v-822.06h-56.82v-56.82h-822.06v56.82h-56.82v822.06h56.82v56.82Z"/>
        </svg>
        <div><?= htmlspecialchars($user["username"]) ?></div>
    </a>
</nav>