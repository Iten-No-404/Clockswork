<?php

require 'connection.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];

    $dbConnection = DBConnection::getInst()->getConnection();

    $emailPassQuery = "SELECT * FROM users WHERE Email = '$email' LIMIT 1";
    $queryResult = mysqli_query($dbConnection, $emailPassQuery);
    $fetchedResult = mysqli_fetch_assoc($queryResult);

    if ($queryResult->num_rows == 0) {
        AlertJS("Cannot find a user with the specified email!");
        RedirectJS("../HTML/signup.php");
        exit();
    }

    $hashStored =  $fetchedResult['Password'];
    if (password_verify($pass1, $hashStored)) {
        $banEnd = $fetchedResult['Ban_End'];
        $now = date('Y-m-d');
        if ($banEnd <= $now) {
            $_SESSION['U_ID'] = $fetchedResult['U_ID'];
            $_SESSION['Developer'] = $fetchedResult['Developer'];
            RedirectJS('../HTML/Home.php');
        } else {
            $banString = "You\'re banned until " . $banEnd;
            AlertJS($banString);
            RedirectJS("../HTML/signup.php");
        }
    } else {
        AlertJS('Incorrect password!');
        RedirectJS('../HTML/login.php');
    }
}
