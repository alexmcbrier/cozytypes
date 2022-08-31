<?php

session_start();

session_destroy();

if (isset($_COOKIE['rememberMe'])) {
    unset($_COOKIE['rememberMe']); 
    setcookie('rememberMe', null, -1, '/'); 
} else {
}
header("Location: login.php");
?>