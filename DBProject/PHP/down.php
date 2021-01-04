<?php
 require_once 'review.php';
 require_once 'functions.php';
 session_start();
 $obj=new review();
 $U_ID=$_SESSION['U_ID'];
 $id=$_GET['id'];
 $obj->selectup_down_voted_review($U_ID,$id,'0');
 $appid=$obj-> getappidfromreviewed($id);

 RedirectJS("../HTML/Application.php?id=$appid");
?>