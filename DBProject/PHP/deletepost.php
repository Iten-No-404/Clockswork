<?php
require_once 'post.php';
$id=$_GET['id'];
 $post=new post();
 $groupid=$post-> getgroupidfrompost($id);
 $post-> deletefrompost($id);
 RedirectJS("../HTML/Group.php?id=$groupid");
?>