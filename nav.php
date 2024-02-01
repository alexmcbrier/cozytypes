<?php
if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/config.php";
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
} ?>
<script src="loadPage.js"></script>
<nav> 
    <a id = "logo" href="https://cozytypes.com" style="text-decoration: none;">
        <h1>cozytypes</h1>
    </a>
    <a class = "navIcon" href="https://cozytypes.com" ><i class="fa-solid fa-house"></i></a>
    <a class = "navIcon" href="/preferences"><i class="fa-solid fa-gear"></i></a>
    <a class = "navIcon" href="/leaderboard"><i class="fa-solid fa-crown"></i></a>
    <a class = "navIcon" href="/about"><i class="fa-solid fa-info"></i></a>
    <a href="/signup" id = "showUsername">
        <i class="fa-regular fa-user"></i>
        <div><?= htmlspecialchars($user["username"]) ?></div>
    </a>
    <script>
  function navigateWithoutRefresh(event) {
    event.preventDefault(); // Prevents the default behavior of the anchor element
    // Your code to navigate to the preferences page without a full page refresh
    // For example, you can use AJAX to load content dynamically
    // or manipulate the DOM to show/hide content as needed.
  }
</script>
</nav>