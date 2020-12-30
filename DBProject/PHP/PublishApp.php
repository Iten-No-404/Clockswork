<?php
// TODO: Check that the user is logged in before loading the page
require 'connection.php';
if (session_status() == PHP_SESSION_NONE) {
    AlertJS("You must be logged in first");
    RedirectJS("../HTML/login.html");
    //session_start();
}
else if($_SESSION['login'] ==false)
{
    AlertJS("You must be logged in first");
    RedirectJS("../HTML/login.html");
}
