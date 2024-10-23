<?php

$host = getenv('DB_HOST');
$dbname = getenv('DB_NAME');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');

$mysqli = new mysqli(hostname: $host, username: $username, password: $password, database: $dbname);
return $mysqli;
