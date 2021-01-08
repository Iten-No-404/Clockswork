<?php
 require_once 'post.php';
 require_once 'functions.php';
 session_start();
 $obj=new post();
 $U_ID=$_SESSION['U_ID'];
 $id=$_GET['id'];
 $obj->selectup_down_voted_post($U_ID,$id,'0');
 $groupid=$obj-> getgroupidfrompost($id);

 RedirectJS("../HTML/Group.php?id=$groupid");
?>