<?php
// require 'connection.php'; // Since 'user.php. already includes 'connection.php'
include 'user.php';
// TODO: once the "Save changes" button has been presses
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


    // Plagiarized from: https://www.w3schools.com/php/php_file_upload.asp
    $target_dir = "../IMAGES/";
    $target_file = $target_dir . $_FILES['userpicture']['name'];
    $uploadOk = 1;

    // Check if image file is a actual image or fake image
    if (isset($_POST["uploadImage"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        AlertJS("File is not an image.");
        RedirectJS("../HTML/EditUserInfo.php");

        // if everything is ok, try to upload file
    } else {

        // Check if file already exists
        if (file_exists($target_file)) {
            $ImagePath = $target_file;
        } else if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $ImagePath = $target_file;
            // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            AlertJS("Sorry, there was an error uploading your file.");
        }
    }

    if (!isset($ImagePath))
        $ImagePath = $currUserData->Profile_Picture;

    $FName = $_POST['fname'];
    $LName = $_POST['lname'];
    $BDate = $_POST['bdate'];
    $Gender = $_POST['gender'];
    $UnhasedPass = $_POST['password'];
    $Email = $_POST['email'];
    $Username = $_POST['username'];
    $Address = mysqli_escape_string($currUserData->dbConnection, $_POST['address']);
    $errorCounter = 0;

    // If the date isn't in the correct format (yyyy-mm-dd), sets the value to the current (valid) date
    if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $BDate)) {
        $BDate = $currUserData->Bdate;
        $errorCounter++;
    }
    // If the email is invalid, sets the variable to the current (valid) email
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $Email = $currUserData->Email;
        $errorCounter++;
    }

    // Checking if the other fields are empty
    if ($FName == "") {
        $FName = $currUserData->FName;
    }
    if ($LName == "") {
        $LName = $currUserData->LName;
    }
    if ($Gender == "" || $Gender != "M" || $Gender != "F") {
        $Gender = $currUserData->Gender;
    }
    if ($Username == "") {
        $Username = $currUserData->Username;
    }
    if ($Address == "") {
        $Address = mysqli_escape_string($currUserData->dbConnection, $currUserData->Address);
    }

    // Hashes the password for safe storage
    $HashedPass = password_hash($UnhasedPass, PASSWORD_DEFAULT);
    if ($UnhasedPass == "") {
        $HashedPass = $currUserData->Password;
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
        $ImagePath
    );
    RedirectJS("../HTML/user.php");
}
?>