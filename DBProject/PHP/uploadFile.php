<?php
// Plagiarized from: https://www.w3schools.com/php/php_file_upload.asp

if (isset($_POST['uploadfile'])) {
    $target_dir = "../IMAGES/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

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
            $_FILES['filePath'] = $target_file . $imageFileType;
        } else if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $_FILES['filePath'] = $target_file . $imageFileType;
            // echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            AlertJS("Sorry, there was an error uploading your file.");
        }
    }
}
?>