<?php
require 'connection.php';
class review{
    public $id;
    public function __construct($idpassed) {
        $id=$idpassed;
       }
     public function getReview_Description()
     {
          $Review_Description=$dbConnection->query("SELECT Review_Description FROM  review WHERE ReviewID='$id'");
          return $Review_Description;
     }  
     public function getReviewDate()
     {
          $ReviewDate=$dbConnection->query("SELECT ReviewDate FROM  review WHERE ReviewID='$id'");
          return $ReviewDate;
     }  
     public function getStars()
     {
          $Stars=$dbConnection->query("SELECT Stars FROM  review WHERE ReviewID='$id'");
          return $Stars;
     }  
     public function getUpvotes()
     {
          $Upvotes=$dbConnection->query("SELECT COUNT(U_ID) FROM  up_down_voted_review WHERE Review_id='$id' AND Up_Down ='1'");
          return $Upvotes;
     }
     public function getDownvotes()
     {
          $Downvotes=$dbConnection->query("SELECT COUNT(U_ID) FROM  up_down_voted_review WHERE Review_id='$id' AND Up_Down ='0'");
          return $Downvotes;
     }
}
?>