<?php
require 'connection.php';
require 'app.php';
if(isset($_POST['submit']))
{
    $App_ID=$_POST['App_ID'];
    $Application_Name=$_POST['Application_Name'];
    $NumOfUsers=$_POST['NumOfUsers'];
    $Price=$_POST['Price'];
    $Sale=$_POST['Sale'];
    $AgeRating=$_POST['AgeRating'];
    $System_Requirements=$_POST['System_Requirements'];
    $Rating =$_POST['Rating'];
    $Application_Picture=$_POST['Application_Picture']; //not true
    $AppDescription=$_POST['AppDescription'];
    $AppTrailer=$_POST['AppTrailer']; //not true
    $Region=$_POST['Region'];
    $Hide=$_POST['Hide'];
    $Release_Date=$_POST['Release_Date'];
    $U_ID=$_POST['U_ID'];

    $obj=new APP($App_ID);

   $obj->InsertApp($App_ID,$Application_Name,$NumOfUsers,$Price,$Sale,$AgeRating,$System_Requirements,$Rating,$Application_Picture,$AppDescription,$AppTrailer,$Region,$Hide,$Release_Date,$U_ID	);
   
}
?>