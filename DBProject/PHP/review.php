<?php
include_once('connection.php');
class review{
     public $dbConnection ;
     public function __construct() {
     
        $this->dbConnection  = DBConnection::getInst()->getConnection();
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
     public function getids()
     {
        $result= $this->dbConnection->query("SELECT ReviewID FROM  review");
       $x=-1;
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                if($row["ReviewID"]>$x)
                { $x=$row["ReviewID"];

                }

            }
        }
      return $x;
      
     }
     public function insertreview($Review_Description,$ReviewDate,$Stars)
     {
        
        $this->dbConnection->query("INSERT INTO review (Review_Description,ReviewDate,Stars) VALUES ('$Review_Description','$ReviewDate','$Stars')");
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
          $result= $this->dbConnection->query("SELECT Stars FROM  review WHERE ReviewID='$id'");
          //different
          if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
              $x = $row["Stars"];
              while ($x > 0) {
                echo ' <i class="fa fa-star" aria-hidden="true"></i>';
      
                $x--;
              }
            }
          }
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
     public function reviwed($UserID,$ApplicationID,$ReviewID)
     {
       
          $this->dbConnection->query("INSERT INTO reviewed (UserID,ApplicationID,ReviewID) VALUES($UserID,$ApplicationID,$ReviewID)");
     }
     public function deletefromreviwed($ApplicationID)
     {
       
          $this->dbConnection->query("DELETE   FROM reviewed WHERE  ApplicationID=$ApplicationID");
     }
     public function select($ApplicationID)
     {
       $result= $this->dbConnection->query("SELECT ReviewID  FROM reviewed WHERE  ApplicationID=$ApplicationID");
         return $result;
     }
     public function deletefromreviw($ReviewID)
     {
        $this->dbConnection->query("DELETE FROM review WHERE ReviewID=$ReviewID");
     }
     public function getuseridsandreviewids($ApplicationID)
     {
        $result= $this->dbConnection->query("SELECT UserID,ReviewID	FROM reviewed WHERE ApplicationID='$ApplicationID'");
        return $result;
     }
}
?>