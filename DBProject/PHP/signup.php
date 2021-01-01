<?php
// TODO: Display an alert for a few second before sending the user back to the signup screen if
// a field is empty/ passwords don't match / username or email already in use/
require 'connection.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['submit'])) {
    // Based on: https://www.youtube.com/watch?v=qjwc8ScTHnY&ab_channel=edureka%21

    $dbConnection = DBConnection::getInst()->getConnection();

    // Fetching data from the HTML form
    // The index/key for the _POST array should be whatever we specified in the input tag under the "name" attribute
    $userName = mysqli_real_escape_string($dbConnection, $_POST['name']);
    $email = mysqli_real_escape_string($dbConnection, $_POST['email']);
    $phoneNumber = mysqli_real_escape_string($dbConnection, $_POST['number']);
    $password1 = $_POST['pass1'];  // Shouldn't escape passwords when signing up OR logging in
    $password2 = $_POST['pass2'];

    // Validation
    $errors = 0;
    if (empty($userName) || empty($email) || empty($password1) || empty($password2)) {
        AlertJS("A required field is empty");
        $errors++;
    }

    if ($password1 != $password2) {
        AlertJS("Passwords do not match");
        $errors++;
    }




    // Checks if the username or email have already been used
    $checkUser = "SELECT * FROM users WHERE Username = '$userName' OR Email = '$email' LIMIT 1";
    $userCheckResult = $dbConnection->query($checkUser);

    if ($userCheckResult->num_rows != 0) {
        AlertJS("Username or Email already in use!");
        RedirectJS("../HTML/login.php");
        $errors++;
    }


    // If there are no errors, can register
    if ($errors == 0) {
        // PHP uses bcrypt for hashing?
        // Encrypting passwords so that DB access does not risk user data
        $passwordHash = password_hash($password1, PASSWORD_DEFAULT);

        $regUserQuery = "INSERT INTO users (Username, Email, Phone_Number, Password) VALUES ('$userName', '$email', '$phoneNumber', '$passwordHash')";
        mysqli_query($dbConnection, $regUserQuery);
        $regUserIDQuery = "SELECT U_ID FROM users WHERE Username = '$userName' LIMIT 1";
        $IDqueryResult = mysqli_query($dbConnection, $regUserIDQuery);
        $fetchedresultID = mysqli_fetch_assoc($IDqueryResult);
        $_SESSION['username'] = $userName;
        $_SESSION['loggedin'] = true;
        $_SESSION['userid'] = $fetchedresultID['U_ID'];
        RedirectJS("../HTML/Home.php");
    }
}
