<?php
require_once 'review.php';
if(isset($_POST['submit']))
{
    $id=$_GET['id'];
$Review_Description=$_POST['Review_Description'];
$Stars=$_POST['Stars'];
 $review=new Review();
 $review->updatereview($Review_Description,$Stars,$id);
 $ApplicationID = $review->getappidfromreviewed($id);
 RedirectJS("../HTML/application.php?id=$ApplicationID");
}
?>