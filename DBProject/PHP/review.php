<?php

class review{
     public $dbConnection ;
     public function __construct() {
      $dpserver="localhost";
      $dpusername="root";
      $password="";
      $dpname="clockwork";
      $this->dbConnection=mysqli_connect($dpserver,$dpusername,$password,$dpname);
    
     }
     public function getReview_Description($id)
     {
          $result= $this->dbConnection->query("SELECT Review_Description FROM  review WHERE ReviewID='$id'");
          if ($result->num_rows > 0) {
               // output data of each row
               while($row = $result->fetch_assoc()) {
                   echo $row["Review_Description"];
               }
           }
     }  
     public function getReviewDate($id)
     {
          $result= $this->dbConnection->query("SELECT ReviewDate FROM  review WHERE ReviewID='$id'");
          if ($result->num_rows > 0) {
               // output data of each row
               while($row = $result->fetch_assoc()) {
                   echo $row["ReviewDate"];
               }
           }
     }  
     public function getStars($id)
     {
          $Stars= $this->dbConnection->query("SELECT Stars FROM  review WHERE ReviewID='$id'");
          //different
          // if ($result->num_rows > 0) {
          //      // output data of each row
          //      while($row = $result->fetch_assoc()) {
          //          echo $row["Application_Name"];
          //      }
          //  }
     }  
     public function getUpvotes($id)
     {
          $result= $this->dbConnection->query("SELECT COUNT(U_ID) FROM  up_down_voted_review WHERE Review_id='$id' AND Up_Down ='1'");
          if ($result->num_rows > 0) {
               // output data of each row
               while($row = $result->fetch_assoc()) {
                   echo $row["Upvotes"];
               }
           }
     }
     public function getDownvotes($id)
     {
          $result= $this->dbConnection->query("SELECT COUNT(U_ID) FROM  up_down_voted_review WHERE Review_id='$id' AND Up_Down ='0'");
          if ($result->num_rows > 0) {
               // output data of each row
               while($row = $result->fetch_assoc()) {
                   echo $row["Downvotes"];
               }
           }
     }
}
?>