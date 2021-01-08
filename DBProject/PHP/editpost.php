<?php
require_once 'post.php';
if(isset($_POST['submit']))
{
    $post=new post();
    $id=$_GET['id'];
    $groupid=$post-> getgroupidfrompost($id);
    $TEXTpost = $_POST['TEXTpost'];
    $picture = $_FILES['picture']['name'];
    if ($picture == "") {
        $picture = $post->getpicture($id);
    } else {
        $U_ID = $post->getU_ID($id);
        $targetDir = "../IMAGES/";
        $fileName = $_FILES['picture']['name'];
        $tmpfileloc = $_FILES['picture']['tmp_name'];
        $fileExt = explode('.', $fileName);
        $fileRealExt = strtolower(end($fileExt));
        $picture = $targetDir . $groupid . "_" . $U_ID . "_" . $id . "." . $fileRealExt;
        move_uploaded_file($tmpfileloc, $picture);
    }
    $post-> updatepost($TEXTpost,$picture,$id);
    RedirectJS("../HTML/Group.php?id=$groupid");
}

if(isset($_POST['submitandremove']))
{
    $id=$_GET['id'];
    $TEXTpost = $_POST['TEXTpost'];
    $post=new post();
    // $picture = $post->getpicture($id);  
    // $temp = substr($picture,10);
    // echo $temp;
    // $temp2 = "IMAGES/". $temp;
    // echo $temp2;
    // if(unlink($temp2))
    //     AlertJS("Previous Picture deleted successfully");
    $picture = "";
    $post-> updatepost($TEXTpost,$picture,$id);
    $groupid=$post-> getgroupidfrompost($id);
    //RedirectJS("../HTML/Group.php?id=$groupid");
}
?>