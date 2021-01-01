<?php
require 'review.php';
session_start();

if(isset($_POST['submit']))
{
  
  $Review_Description= $_POST['Review_Description'];
  $Stars=$_POST['Stars'];
  $ReviewDate = date('Y-m-d', time());
  $UserID=(int)$_SESSION['U_ID'];
 
  $ApplicationID=(int)$_GET['id'];

 $obj=new review();
 
 $obj-> insertreview($Review_Description,$ReviewDate,$Stars);
 $ReviewID=(int)$obj->getids();
 var_dump($UserID);

  $obj->reviwed($UserID,$ApplicationID,$ReviewID);
}
?>