<?php
include 'connection.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['username'] = null;
$_SESSION['loggedin'] = false;
$_SESSION['userid'] = 0;
AlertJS("You have been logged out");
RedirectJS("../HTML/login.html");

if (session_status() == PHP_SESSION_ACTIVE) {
    session_destroy();
}
?>
