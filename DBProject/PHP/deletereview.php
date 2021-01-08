<?php
require_once 'review.php';
$id=$_GET['id'];
 $review=new Review();
 $appid=$review-> getappidfromreviewed($id);
 $review-> deletefromreviwedByid($id);
$review->deletefromreviw($id);
RedirectJS("../HTML/Application.php?id=$appid");
?>