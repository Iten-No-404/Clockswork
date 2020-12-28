<?php

require 'connection.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];

    $emailPassQuery = "SELECT * FROM users WHERE Email = '$email' LIMIT 1";
    $queryResult = mysqli_query($dbConnection,$emailPassQuery);

    $fetchedResult = mysqli_fetch_assoc($queryResult);
    $hashStored =  $fetchedResult['Password'];
    
    if (password_verify($pass1, $hashStored)) {
        $_SESSION['username'] = $fetchedResult['Username'];
        $_SESSION['loggedin'] = true;
        RedirectJS('../HTML/Home.HTML');  
    } else {
        AlertJS('Incorrect password!');
        RedirectJS('../HTML/login.HTML');
    }
}
