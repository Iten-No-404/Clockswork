<?php
include_once 'connection.php';
include_once 'post.php';
session_start();

if (isset($_POST['writeapost'])) {

  $TEXTpost=$_POST['TEXTpost'];
  //$TEXTpost = mysqli_real_escape_string($dbConnection, $_POST['TEXTpost']);
  $TEXTpost = stripslashes(nl2br($TEXTpost));
  $group_id=$_GET['id'];
  $U_ID=$_SESSION['U_ID'];
  $obj=new post();
  //($obj->postgetmaxidp1());
  $postid = $obj->postgetmaxidp1();
  //AlertJS($postid);
    $picture = $_FILES['picture']['name'];
    if ($picture == "") {
      //Nothing 
    } else {
        $targetDir = "../IMAGES/";
        $fileName = $_FILES['picture']['name'];
        $tmpfileloc = $_FILES['picture']['tmp_name'];
        $fileExt = explode('.', $fileName);
        $fileRealExt = strtolower(end($fileExt));
        $picture = $targetDir . $group_id . "_" . $U_ID . "_" . $postid . "." . $fileRealExt;
        move_uploaded_file($tmpfileloc, $picture);
    }

   $Date_Written= date('Y-m-d', time());
   //null because give me error!
   if($obj->insertpost($TEXTpost,$Date_Written,$postid,$picture,$U_ID,$group_id))//;
      AlertJS("Posted Successfully");
    
   
        //AlertJS('A group with the same name and owner already exists!');
        RedirectJS("../HTML/Group.php?id=$group_id");
    
  }
