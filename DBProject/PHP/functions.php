<?php

// Shows the alert box at the top of the page
function AlertJS(string $message)
{
    echo "<script>alert('$message');</script>";
}

// Redirecting with php causes the JS alert to not show up
// So we to use the JS redirect instead.
function RedirectJS(string $location)
{
    echo "<script>window.location.href='$location';</script>";
}

// Plagiarized from: https://www.w3schools.com/php/php_file_upload.asp and Iten, thank you!
// All of the parameters to this function MUST be a string
// Returns a path to the image file
// ImagesDirectory: A path to the folder where you store your images
// uploadFieldName: The name of the upload HTML element
// errorRedirectPage: The page where you redirect the user if an upload error occurs
function UploadFile($ImagesDirectory, $uploadFieldName, $errorRedirectPage, $namePart1, $namePart2, $required = false)
{
    $target_dir = $ImagesDirectory;
    $fileExt = explode('.', $_FILES[$uploadFieldName]['name']);
    $fileRealExt = strtolower(end($fileExt));
    $target_file = $target_dir . $namePart1 . "_" . $namePart2 . "." . $fileRealExt;
    $uploadOk = 1;
    $ImagePath = '';

    // Check if image file is a actual image or fake image
    if ($_FILES[$uploadFieldName]["tmp_name"] != "") {
        $check = getimagesize($_FILES[$uploadFieldName]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    } else if ($required) {
        AlertJS('Please upload a picture!');
        RedirectJS($errorRedirectPage);
        return $ImagePath;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        AlertJS("File is not an image.");
        RedirectJS($errorRedirectPage);
        return $ImagePath;
        // if everything is ok, try to upload file
    } else {

        // Check if file already exists
        if (file_exists($target_file && $target_file != $target_dir)) {
            $ImagePath = $target_file;
        } else if (move_uploaded_file($_FILES[$uploadFieldName]["tmp_name"], $target_file)) {
            $ImagePath = $target_file;
            // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else if ($required) {
            AlertJS("Sorry, there was an error uploading your file.");
        }
    }

    return $ImagePath;
}

function UploadSupportFile($SupportDirectory, $uploadFieldName, $errorRedirectPage, $U_ID, $T_ID, $required = false)
{
    $target_dir = $SupportDirectory;
    $fileExt = explode('.', $_FILES[$uploadFieldName]['name']);
    $fileRealExt = strtolower(end($fileExt));
    $target_file = $target_dir . $U_ID . "_" . $T_ID . "." . $fileRealExt;
    $uploadOk = 1;
    $ImagePath = '';

    // Check if image file is a actual image or fake image
    if ($_FILES[$uploadFieldName]["tmp_name"] != "") {
        $check = true;
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    } else if ($required) {
        AlertJS('Please upload a picture!');
        RedirectJS($errorRedirectPage);
        return $ImagePath;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        AlertJS("File is not an image.");
        RedirectJS($errorRedirectPage);
        return $ImagePath;
        // if everything is ok, try to upload file
    } else {

        // Check if file already exists
        if (file_exists($target_file && $target_file != $target_dir)) {
            $ImagePath = $target_file;
        } else if (move_uploaded_file($_FILES[$uploadFieldName]["tmp_name"], $target_file)) {
            $ImagePath = $target_file;
            // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else if ($required) {
            AlertJS("Sorry, there was an error uploading your file.");
        }
    }

    return $ImagePath;
}

// // https://www.codexworld.com/how-to/validate-date-input-string-in-php/#:~:text=The%20validateDate()%20function%20checks,string%20is%20valid%2C%20otherwise%20FALSE.
// function validateDate($date, $format = 'Y-m-d'){
//     $d = DateTime::createFromFormat($format, $date);
//     return $d && $d->format($format) === $date;
// }

define('USER_ACCOUNT','0');
define('DEV_ACCOUNT','1');
define('ADMIN_ACCOUNT','2');
define('SUPPORT_ACCOUNT','3');