<?php
require 'connection.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    AlertJS("Welome " . $_SESSION['username'] . '!');
} else {
    AlertJS("Please log in!");
    RedirectJS("../HTML/login.html");
}
?>