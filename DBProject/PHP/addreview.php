<?php
require 'review.php';
require_once 'functions.php';
session_start();

if(isset($_POST['submit']))
{
  
  $Review_Description= $_POST['Review_Description'];
  $Review_Description = stripslashes(nl2br($Review_Description));
  $Stars=$_POST['Stars'];
  $ReviewDate = date('Y-m-d', time());
  $UserID=(int)$_SESSION['U_ID'];
 
  $ApplicationID=(int)$_GET['id'];

 $obj=new review();
 
 $obj-> insertreview($Review_Description,$ReviewDate,$Stars);
 $ReviewID=(int)$obj->getids();


  $obj->reviwed($UserID,$ApplicationID,$ReviewID);
  RedirectJS("../HTML/application.php?id=$ApplicationID");
}
?>