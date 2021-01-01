<?php
require 'review.php'
session_start();
if(isset($_POST['submit'])
{
  $Review_Description= $_POST['Review_Description'];
  $Stars=$_POST['Stars'];
  $ReviewDate = date('Y-m-d', time());
  $UserID=$_SESSION['U_ID'];
  $ApplicationID=$GET['id'];

 $obj=new review();
 
 $obj-> insertreview($Review_Description,$ReviewDate,$Stars);
 $ReviewID=$obj->getids();
 $obj->reviwed($UserID,$ApplicationID,$ReviewID);

}
?>