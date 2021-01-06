<?php
require_once 'review.php';
$id=$_GET['id'];
 $review=new Review();
 $review-> deletefromreviwedByid($id);
$review->deletefromreviw($id);
?>