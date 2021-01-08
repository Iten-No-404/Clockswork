<?php
require_once 'app.php';
require_once 'review.php';
require_once 'functions.php';

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}


$obj = new App();
$review = new Review();
$ApplicationID = (int)$_GET['id'];
if ($_SESSION['U_ID'] != $obj->getU_ID($_GET['id']) || $_SESSION['Account_Type'] != ADMIN_ACCOUNT) {
  AlertJS('Go delete your own applications !');
  RedirectJS("../HTML/Application.php?id=$_GET[id]");
  exit();
}

$obj->deletefrompurchased_by($ApplicationID);
$review->deletefromreviwed($ApplicationID);
$result = $review->select($ApplicationID);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    $review->deletefromreviw($row['ReviewID']);
  }
}
$obj->deleteapp($ApplicationID);
if ($_SESSION['Account_Type'] == DEV_ACCOUNT)
  RedirectJS("../HTML/Myapp.php");
else
  RedirectJS("../HTML/Home.php");
