<?php
include 'connection.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['U_ID'])) {
    $_SESSION['U_ID'] = null;
    AlertJS("You have been logged out");
    RedirectJS("../HTML/login.php");
} else {
    AlertJS("Really? you can\'t log out without logging in!");
    RedirectJS("../HTML/login.php");
}
if (session_status() == PHP_SESSION_ACTIVE) {
    session_destroy();
}
