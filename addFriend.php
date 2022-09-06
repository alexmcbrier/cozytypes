<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    //making sure user exits
    $mysqli = require __DIR__ . "/config.php";
    $sql = sprintf("SELECT * FROM user 
    WHERE username = '%s'", 
    $mysqli->real_escape_string($_POST["friendAccount"]));
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc(); //only works if it finds one or else spits out error
    if($user != null)
    {
        $sql = "INSERT INTO friends (user, friend) 
                VALUES (?, ?)";
        $stmt = $mysqli->stmt_init();
        if (! $stmt->prepare($sql)) 
        {
            die("SQL error: " . $mysqli->error);
        }
        
        $sql2 = "SELECT * FROM user
        WHERE id = {$_SESSION["user_id"]}";
        $result = $mysqli->query($sql2);
        $user = $result->fetch_assoc();
        $stmt->bind_param("ss", $user["username"], $_POST["friendAccount"]);
        if ($stmt->execute()) 
            {
            header("location: profile.php");
            exit;
            }
    }
    else
    {
        header("location: profile.php");
        exit;
        //throw error and make them type a new name
    }
}
?>