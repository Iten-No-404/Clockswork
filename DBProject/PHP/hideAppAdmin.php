<?php
require_once '../PHP/functions.php';
require_once '../PHP/app.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$app = new app();
$appID = $_GET['id'];

if ($_SESSION['U_ID'] != $app->getU_ID($appID) && $_SESSION['Account_Type'] != ADMIN_ACCOUNT) {
    AlertJS("Gotcha, you can\'t delete what\'s not yours!");
    RedirectJS("../HTML/Browse.php");
    exit();
}

$hiddenStatus = $app->getHide($appID);
if ($hiddenStatus == '1') $hiddenStatus = '0';
else $hiddenStatus = '1';
$app->HideApp($appID, $hiddenStatus);

if ($hiddenStatus == '1') {
    AlertJS('App hidden successfully, contact the developer or an admin to unhide it');
    RedirectJS('../HTML/Browse.php');
} else {
    AlertJS('App unhidden successfully');
    RedirectJS("../HTML/Application.php?id=$appID");
}
