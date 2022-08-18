<?php

$host = "localhost";
$dbname = "cozytypes";
$username = "root";
$password = "AMcB0807"; 
$mysqli = new mysqli(hostname: $host, username: $username, password: $password, database: $dbname); 

if ($mysqli->connect_errno)
{
	die("Connection error: " . $mysqli->connection_error);
}

return $mysqli;