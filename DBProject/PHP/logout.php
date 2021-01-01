<?php
include 'connection.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['U_ID'] = null;
AlertJS("You have been logged out");
RedirectJS("../HTML/login.html");

if (session_status() == PHP_SESSION_ACTIVE) {
    session_destroy();
}
?>
