<?php
require_once '../PHP/functions.php';
require_once '../PHP/app.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$app = new app();
if ($_SESSION['U_ID'] != $app->getU_ID($_GET['id']) || !$_SESSION['Account_Type'] != ADMIN_ACCOUNT) {
    AlertJS("Gotcha, you can\'t delete what\'s not yours!");
    RedirectJS("../HTML/Browse.php");
    exit();
}
if ($app->getHide($_GET['id'])) {
    AlertJS('App hidden successfully, contact the developer or the DB admins to unhide it');
    RedirectJS('../HTML/Browse.php');
} else {
    AlertJS('App hiding failed');
    RedirectJS("../HTML/Application.php?id=$_GET[id]");
}
