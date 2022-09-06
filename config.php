<?php
$host = "localhost";
$dbname = "cozytypes";
$username = "alexmcbrier";
//$dbname = "u885077784_cozytypes";
//$username = "u885077784_alexmcbrier";
$password = "AMcB0807"; 
$mysqli = new mysqli(hostname: $host, username: $username, password: $password, database: $dbname); 

if ($mysqli->connect_errno)
{
	die("Connection error: " . $mysqli->connection_error);
}

return $mysqli;