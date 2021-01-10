<?php

require 'connection.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];

    $dbConnection = DBConnection::getInst()->getConnection();

    $userQuery = "SELECT * FROM users WHERE Email = '$email' LIMIT 1";
    $userQueryResult = mysqli_query($dbConnection, $userQuery);
    $userResult = mysqli_fetch_assoc($userQueryResult);

    $employeeQuery = "SELECT * FROM Employee WHERE Email = '$email' LIMIT 1";
    $employeeQueryResult = mysqli_query($dbConnection, $employeeQuery);
    $employeeResult = mysqli_fetch_assoc($employeeQueryResult);

    if ($userQueryResult->num_rows == 0 && $employeeQueryResult->num_rows == 0) {
        AlertJS("Cannot find a user/employee with the specified email!");
        RedirectJS("../HTML/signup.php");
        exit();
    } else if ($userQueryResult->num_rows == 1 && $employeeQueryResult->num_rows == 0) {
        $fetchedResult = $userResult;
        $U_ID = $fetchedResult['U_ID'];
    } else if ($userQueryResult->num_rows == 0 && $employeeQueryResult->num_rows == 1) {
        $fetchedResult = $employeeResult;
        $U_ID = $fetchedResult['Employee_ID'];
    }
    // Since employees are input manually, no need to check for email collisions

    $hashStored =  $fetchedResult['Password'];
    if (password_verify($pass1, $hashStored)) {
        if ($fetchedResult['Account_Type'] == ADMIN_ACCOUNT || $fetchedResult['Account_Type'] == SUPPORT_ACCOUNT)
            $banEnd = date('Y-m-d');
        else
            $banEnd = $fetchedResult['Ban_End'];

        $now = date('Y-m-d');
        if ($banEnd <= $now) {
            $_SESSION['U_ID'] = $U_ID;
            $_SESSION['Account_Type'] = $fetchedResult['Account_Type'];
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
