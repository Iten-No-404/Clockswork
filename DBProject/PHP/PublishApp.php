<?php
// TODO: Check that the user is logged in before loading the page
require_once 'connection.php';
require_once 'app.php';
session_start();

// if (session_status() == PHP_SESSION_NONE) {
//     AlertJS("You must be logged in first");
//     RedirectJS("../HTML/login.html");
//     //session_start();
// }
// else if($_SESSION['login'] ==false)
// {
//     AlertJS("You must be logged in first");
//     RedirectJS("../HTML/login.html");
// }

if (isset($_POST['publish'])) {
    // Based on: https://www.youtube.com/watch?v=qjwc8ScTHnY&ab_channel=edureka%21

    // Fetching data from the HTML form
    // The index/key for the _POST array should be whatever we specified in the input tag under the "name" attribute
    $dbConnection = DBConnection::getInst()->getConnection();
    $appname = mysqli_real_escape_string($dbConnection, $_POST['application_name']);
    $apppic = $_FILES['apppicture']['name'];
    if ($apppic == "") {
        $apppic = "../IMAGES/app-picture.png";
    } else {
        $targetDir = "../IMAGES/";
        $fileName = $_FILES['apppicture']['name'];
        $tmpfileloc = $_FILES['apppicture']['tmp_name'];
        $fileExt = explode('.', $fileName);
        $fileRealExt = strtolower(end($fileExt));
        $apppic = $targetDir . $appname . "." . $fileRealExt;
        move_uploaded_file($tmpfileloc, $apppic);
    }
    $applink = mysqli_real_escape_string($dbConnection, $_POST['application-link']);
    $pricechoice = $_POST['price'];  //either 0(free) or 1(priced)
    $appprice = 0; //Assume it's free at first
    if ($pricechoice == "1") {
        $appprice = $_POST['app-price'];
    }
    $agerating = $_POST['age-rating'];
    $appregion = mysqli_real_escape_string($dbConnection, $_POST['region']);
    $appdescr = mysqli_real_escape_string($dbConnection, $_POST['app-description']);
    $appreq = mysqli_real_escape_string($dbConnection, $_POST['system-requirements']);
    $apptrailer = mysqli_real_escape_string($dbConnection, $_POST['app-trailer']);
    if ($apptrailer == "") {
        $apptrailer = NULL;
    }
    $timezone = date_default_timezone_get();
    $appdate = date('Y-m-d', time());
    //$devID = $_SESSION['userid'];
    // Validation
    $errors = 0;
    if (empty($appname) || empty($applink)) {
        AlertJS("A required field is empty");
        $errors++;
    }

    //Checks if the app name or app download link have already been used
    $checkApp = "SELECT * FROM applications WHERE Application_Name = '$appname' OR Application_Link = '$applink' LIMIT 1";
    $appCheckResult = $dbConnection->query($checkApp);

    if ($appCheckResult->num_rows != 0) {
        AlertJS("Appname or Application link already in use!");
        $errors++;
    }

    // If there are no errors, can register
    if ($errors == 0) {
        $obj = new APP();
        $UserID=(int)$_SESSION['U_ID'];
       $random=rand(1,5);
        //$obj->InsertApp($appname,0,$appprice,0,$agerating,$appreq,0,$apppic,$appdescr,$apptrailer,$appregion,'1',$appdate,$devID );
        $insertq = $obj->InsertApp($appname, 0, $appprice, 0, $agerating, $appreq, $random, $apppic, $applink, $appdescr, $apptrailer, $appregion, '1', $appdate, $UserID);
        mysqli_query($dbConnection, $insertq);
       $appid= $obj->getids();
  
       $ApplicationID= $obj->getids();
        //$fetchedresultID = mysqli_fetch_assoc($IDqueryResult);
        AlertJS("Application Added Successfully!");
        RedirectJS("../HTML/application.php?id=$ApplicationID");
        //It should redirect the user to the application page!(using the App_ID & its currently hidden, so only its developer can see it)
        //RedirectJS("../HTML/app.html");
    }
}
