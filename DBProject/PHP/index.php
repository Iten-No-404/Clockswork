<?php 
    // TODO: IMPLEMENT LOGIN.PHP
    session_start();
    if(isset($_SESSION['username']))
    {
        $_SESSION['msg'] = "Plaese log in or sign up!";
        header("Location : login.php");
    }

    if(isset($_GET['logout']))
    {
        session_destroy();
        unset($_SESSION['username']);
        header("Location : login.php");
    }

?>
