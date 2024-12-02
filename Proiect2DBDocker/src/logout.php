<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_COOKIE['username']);
unset($_COOKIE['password']);
setcookie('username', '', time() - 3600);
setcookie('password', '', time() - 3600);
header("Location: index.php");
?>