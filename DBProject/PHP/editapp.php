<?php
require 'app.php';
require_once 'connection.php';
if(isset($_POST['edit']))
{
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
        //$obj->InsertApp($appname,0,$appprice,0,$agerating,$appreq,0,$apppic,$appdescr,$apptrailer,$appregion,'1',$appdate,$devID );
        $insertq = $obj->InsertApp($appname, 0, $appprice, 0, $agerating, $appreq, 0, $apppic, $applink, $appdescr, $apptrailer, $appregion, '1', $appdate, 1);
        mysqli_query($dbConnection, $insertq);
        //$fetchedresultID = mysqli_fetch_assoc($IDqueryResult);
        AlertJS("Application Added Successfully!");
        //It should redirect the user to the application page!(using the App_ID & its currently hidden, so only its developer can see it)
        //RedirectJS("../HTML/app.html");
    }

}
?>