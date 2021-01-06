<?php
// require 'connection.php'; // Since 'user.php. already includes 'connection.php'
include 'user.php';
// DONE: once the "Save changes" button has been presses
// Grab the just uploaded image's path
// Grab the first name
// Grab the last name
// Grab the birthdate (check for format)
// Grab the gender (check for 'M' or 'F'? Maybe just leave it open)
// Grab the password
// Grab the email (check if actually an email)
// Grab the username
// Grab the address

// check the birthdate, if not in the correct format, set the variable to the already existing birthdate
// check the email, if invalid, set the variable to the already existing email
// hash the password

// Update the data of the user

// Need to check for every field if it's empty

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['savechangesbtn'])) {
    // Getting the current user's data (before editing)
    $currUserData = new user($_SESSION['U_ID']);

    $ImagePath = UploadFile('../IMAGES/', 'userpicture', '../HTML/EditUserInfo.php', $currUserData->U_ID, date('Y-m-d'));

    if ($ImagePath == '')
        $ImagePath = $currUserData->Profile_Picture;

    $FName = $_POST['fname'];
    $LName = $_POST['lname'];
    $BDate = explode("-", $_POST['bdate']);
    $Gender = $_POST['gender'];
    $UnhasedPass = $_POST['password'];
    $Email = $_POST['email'];
    $Username = $_POST['username'];
    $Address = mysqli_escape_string($currUserData->dbConnection, $_POST['address']);
    $Phone_Number = $_POST['phone'];
    $errorCounter = 0;



    // If the date isn't in the correct format (yyyy-mm-dd) or no input is give, sets the value to the current (valid?) date
    if (count($BDate) < 3 || !checkdate($BDate[1], $BDate[2], $BDate[0]) || $BDate == "") {
        if ($currUserData->Bdate == null || $currUserData->Bdate == "" || $currUserData->Bdate == "0000-00-00")
            $BDate = NULL;
        else
            $BDate = $currUserData->Bdate;
        if ($BDate != "")   // Gives an error only if the data is invalid
            $errorCounter++;
    }
    // If the date is valid, glue it back together
    else {
        $BDate = implode("-", $BDate);
        $BDate = "$BDate";
    }
    // If the email is invalid or no input is given, sets the variable to the current (valid) email
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL) || $Email == "") {
        $Email = $currUserData->Email;
        if ($Email != "")   // Gives an error only if the data is invalid
            $errorCounter++;
    }

    // Checking if the other fields are empty
    if ($FName == "") {
        $FName = $currUserData->FName;
    }
    if ($LName == "") {
        $LName = $currUserData->LName;
    }
    if ($Gender == "" || ($Gender != 'M' && $Gender != 'F')) {
        if ($currUserData->Gender == null)
            $Gender = null;
        else
            $Gender  = $currUserData->Gender;
    }
    if ($Username == "") {
        $Username = $currUserData->Username;
    }
    if ($Address == "") {
        $Address = mysqli_escape_string($currUserData->dbConnection, $currUserData->Address);
    }
    if ($Phone_Number == "") {
        $Phone_Number = $currUserData->Phone_Number;
    }

    // Hashes the password for safe storage
    $HashedPass = password_hash($UnhasedPass, PASSWORD_DEFAULT);
    if ($UnhasedPass == "") {
        $HashedPass = $currUserData->Password;
    }

    //Checking all the Hide CheckBoxes
    if (isset($_POST['FNameCB'])) {
        $currUserData->Hide[0] = 0;
    } else {
        $currUserData->Hide[0] = 1;
    }

    if (isset($_POST['LNameCB'])) {
        $currUserData->Hide[1] = 0;
    } else {
        $currUserData->Hide[1] = 1;
    }

    if (isset($_POST['BDateCB'])) {
        $currUserData->Hide[4] = 0;
    } else {
        $currUserData->Hide[4] = 1;
    }

    if (isset($_POST['GenderCB'])) {
        $currUserData->Hide[5] = 0;
    } else {
        $currUserData->Hide[5] = 1;
    }

    if (isset($_POST['EmailCB'])) {
        $currUserData->Hide[2] = 0;
    } else {
        $currUserData->Hide[2] = 1;
    }

    if (isset($_POST['AddressCB'])) {
        $currUserData->Hide[3] = 0;
    } else {
        $currUserData->Hide[3] = 1;
    }

    if (isset($_POST['PhoneCB'])) {
        $currUserData->Hide[6] = 0;
    } else {
        $currUserData->Hide[6] = 1;
    }


    // Updating the user's data in the DB
    $currUserData->UpdateUserInfo(
        $_SESSION['U_ID'],
        $FName,
        $LName,
        $Username,
        $HashedPass,
        $Email,
        $Address,
        $BDate,
        $Gender,
        $ImagePath,
        $currUserData->Hide,
        $Phone_Number
    );
    RedirectJS("../HTML/user.php? id=" . $_SESSION['U_ID']);
}
