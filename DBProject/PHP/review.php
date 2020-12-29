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
}
?>