<?php

session_start();

session_destroy();

if (isset($_COOKIE['id'])) {
    unset($_COOKIE['id']); 
    setcookie('id', null, -1, '/'); 
} else {
}
header("Location: login");
?>