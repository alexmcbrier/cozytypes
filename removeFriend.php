<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //making sure user exits
    $mysqli = require __DIR__ . "/config.php";
    $sql = "SELECT id FROM friends WHERE friend = '{$_POST["friendAccount"]}'";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    $sql = "DELETE FROM friends WHERE id={$user['id']}";
    if(mysqli_query($mysqli, $sql)){
        echo "Records were deleted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
        exit;
    }

    header("location: profile");
    exit;
}
?>
