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
    $email = mysqli_real_escape_string($dbConnection, $_POST['email']);
    $phoneNumber = mysqli_real_escape_string($dbConnection, $_POST['Phone']);
    $department = mysqli_real_escape_string($dbConnection, $_POST['Dep']);
    $salary = $_POST['salary'];
    #$Date = mysqli_real_escape_string($dbConnection, $_POST['DoB']);
    $password1 = $_POST['Pass_1'];  // Shouldn't escape passwords when signing up OR logging in
    $password2 = $_POST['Pass_2'];

    // Validation
    $errors = 0;
    if (empty($email) || empty($salary) || empty($phoneNumber)|| empty($department) || empty($password1) || empty($password2)) {
        AlertJS("A required field is empty");
        RedirectJS("../HTML/NewEmployee.php");
        $errors++;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if ($Email != "")   // Gives an error only if the Email is invalid
                {
                    $errors++;
                    AlertJS("Email Format is incorrect !");
                    AlertJS("Email Format: Example@gmail.com ");
                    RedirectJS("../HTML/NewEmployee.php");
                }
            }
    
    if (!is_numeric($salary) || $salary < 0)
    {
        $errors++;
        AlertJS("Salary is invalid");
        RedirectJS("../HTML/NewEmployee.php");
    }

    if ($password1 != $password2) {
        AlertJS("Passwords do not match");
        RedirectJS("../HTML/NewEmployee.php");
        $errors++;
    }

    if ($department != "Adminstrator" && $department != "Support")
    {
        AlertJS("Invalid Department");
        AlertJS("Departments: Adminstrator, Support ");
        RedirectJS("../HTML/NewEmployee.php");
        $errors++;
    }


    // Checks if the username or email have already been used
    $checkUser = "SELECT * FROM users WHERE Email = '$email' LIMIT 1";
    $userCheckResult = $dbConnection->query($checkUser);

    if ($userCheckResult->num_rows != 0) {
        AlertJS("There is a user account associated with this email, please use a different email");
        RedirectJS("../HTML/NewEmployee.php");
        $errors++;
    }


    // If there are no errors, can register
    if ($errors <= 0) {
        // PHP uses bcrypt for hashing?
        // Encrypting passwords so that DB access does not risk user data
        $passwordHash = password_hash($password1, PASSWORD_DEFAULT);

        if ($department == "Adminstrator")
            $department = ADMIN_ACCOUNT;
        else
            $department = SUPPORT_ACCOUNT;

        $regEmpQuery = "INSERT INTO Employee (Email, Phone, Account_Type, Password, Salary) VALUES ('$email', '$phoneNumber', '$department' ,'$passwordHash', '$salary')";
        $res = mysqli_query($dbConnection, $regEmpQuery);
        if ($res == true)
            AlertJS("Employee registered successfully!");
        RedirectJS("../HTML/NewEmployee.php");
        /*$regEmpIDQuery = "SELECT U_ID FROM users WHERE Username = '$userName' LIMIT 1";
        $IDqueryResult = mysqli_query($dbConnection, $regEmpIDQuery);
        $fetchedresultID = mysqli_fetch_assoc($IDqueryResult);
        $_SESSION['loggedin'] = true;
        $_SESSION['U_ID'] = $fetchedresultID['U_ID'];
        if ($department == "Adminstrator")
            $_SESSION['Account_Type'] = ADMIN_ACCOUNT;
        else
            $_SESSION['Account_Type'] = SUPPORT_ACCOUNT;
        RedirectJS("../HTML/Home.php");*/
    }
}
