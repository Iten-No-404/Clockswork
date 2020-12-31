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
    
<<<<<<< Updated upstream
    if (password_verify($pass1, $hashStored)) {
        $regUserIDQuery = "SELECT U_ID FROM users WHERE Username = '$userName' LIMIT 1";
        $IDqueryResult = mysqli_query($dbConnection, $regUserIDQuery);
        $fetchedresultID = mysqli_fetch_assoc($IDqueryResult);
=======
    if (password_verify($pass1, $hashStored)) 
    {
        $_SESSION['uid'] = $fetchedResult['U_ID'];
        $_SESSION['FName'] = $fetchedResult['FName'];
        $_SESSION['LName'] = $fetchedResult['LName'];
>>>>>>> Stashed changes
        $_SESSION['username'] = $fetchedResult['Username'];
        $_SESSION['email'] = $fetchedResult['Email'];
        $_SESSION['Address'] = $fetchedResult['Address'];
        $_SESSION['Bdate'] = $fetchedResult['Bdate'];
        $_SESSION['Balance'] = $fetchedResult['Blanace'];
        $_SESSION['Gender'] = $fetchedResult['Gender'];
        $_SESSION['Developer'] = $fetchedResult['Developer'];
        $_SESSION['Phone_Number'] = $fetchedResult['Phone_Number'];
        if (isset($fetchedResult['Profile_Picture']))
        {
            $_SESSION['Profile_Picture'] = $fetchedResult['Profile_Picture'];
        }
        else
        {
            $_SESSION['Profile_Picture'] = "../IMAGES/DEFAULT_USER.jpg";
        }
        #$_SESSION['Profile_Picture'] = $fetchedResult['Profile_Picture'];
        $_SESSION['loggedin'] = true;
        $_SESSION['userid'] = $fetchedresultID['U_ID'];
        RedirectJS('../HTML/Home.HTML');  
    } else {
        AlertJS('Incorrect password!');
        RedirectJS('../HTML/login.HTML');
    }
}
