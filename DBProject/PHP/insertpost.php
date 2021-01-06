<?php
include_once 'connection.php';
include_once 'post.php';
session_start();



  $TEXTpost=$_POST['TEXTpost'];
  $group_id=$_GET['id'];
  $U_ID=$_SESSION['U_ID'];
  $ImagePath = UploadFile('../IMAGES/','picture','../HTML/Groups_List.php');

    // $picture = $_FILES['picture']['name'];
    // if ($picture == "") {
    //   //Nothing 
    // } else {
    //     $targetDir = "../IMAGES/";
    //     $fileName = $_FILES['picture']['name'];
    //     $tmpfileloc = $_FILES['picture']['tmp_name'];
    //     $fileExt = explode('.', $fileName);
    //     $fileRealExt = strtolower(end($fileExt));
    //     $picture = $targetDir . $appname . "." . $fileRealExt;
    //     move_uploaded_file($tmpfileloc, $picture);
    // }
   $obj=new post();
   $Date_Written= date('Y-m-d', time());
   //null because give me error!
   $obj->insertpost($TEXTpost,$Date_Written,$ImagePath,$U_ID,$group_id); 
        //AlertJS('A group with the same name and owner already exists!');
        RedirectJS("../HTML/Group.php?id=$group_id");
