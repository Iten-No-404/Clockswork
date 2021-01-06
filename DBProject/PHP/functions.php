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
function UploadFile($ImagesDirectory, $uploadFieldName, $errorRedirectPage)
{
    $target_dir = $ImagesDirectory;
    $target_file = $target_dir . $_FILES[$uploadFieldName]['name'];
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
    }
    else
    {
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
        if (file_exists($target_file)) {
            $ImagePath = $target_file;
        } else if (move_uploaded_file($_FILES[$uploadFieldName]["tmp_name"], $target_file)) {
            $ImagePath = $target_file;
            // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            AlertJS("Sorry, there was an error uploading your file.");
        }
    }

    return $ImagePath;
}
