<?php

//if name empty
if (empty($_POST["username"]))
{
    die("Name is required");
}
//if passowrd empty
if (empty($_POST["password"]))
{
    die("Password is required");
}
//if confirm passowrd empty
if (empty($_POST["confirm"]))
{
    die("Please confirm password");
}
//at least 8 characters
if (strlen($_POST["password"]) < 8)
{
    die("Password must be at least 8 characters");
}
//at least 1 character
if (! preg_match("/[a-z]/i", $_POST["password"]))
{
    die("Password must contain at least one letter");
}
//at least 1 number
if (! preg_match("/[0-9]/i", $_POST["password"]))
{
    die("Password must contain at least one number");
}
//make sure confirmation matches
if ($_POST["password"] !== $_POST["confirm"]) 
{
    die("Passwords must match");
}
//create a password hash (encrypt)
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/config.php";

$sql = "INSERT INTO user (username, email, password_hash) 
        VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if (! $stmt->prepare($sql)) 
{
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss", $_POST["username"], $_POST["email"], $password_hash);

if ($stmt->execute()) 
{
    $mysqli = require __DIR__ . "/config.php";
    $sql = sprintf("SELECT * FROM user 
                    WHERE email = '%s'", 
                    $mysqli->real_escape_string($_POST["email"]));
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    //succesfully registered an account
    session_start();
    session_regenerate_id();

    $_SESSION["user_id"] = $user["id"];
    //succesfully registered an account
    header("location: profile.php");
    exit;
} else {
    die($mysqli->error . " " . $mysqli->errno);
}