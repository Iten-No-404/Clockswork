<?php



class app
 {

   
   public $dbConnection ;
   public function __construct() {
    $dpserver="localhost";
    $dpusername="root";
    $password="";
    $dpname="try";
    $this->dbConnection=mysqli_connect($dpserver,$dpusername,$password,$dpname);
  
   }

     public function getname($id )
      {
 
        $result= $this->dbConnection->query("SELECT DISTINCT Application_Name FROM  applications WHERE App_ID='$id'");
         if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row["Application_Name"];
            }
        }
     
     
      }
      public  function getNumOfUsers($id)
       {
           $result=$this->dbConnection->query("SELECT NumOfUsers  FROM   applications WHERE App_ID='$id'");
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row["NumOfUsers"];
            }
           }
     
       }
  public function getPrice($id)
      {
          $result=$this->dbConnection->query("SELECT Price FROM  applications WHERE App_ID='$id'");
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row["Price"];
            }
        }
      }
    public function getSale($id)
      {
          $result=$this->dbConnection->query("SELECT Sale FROM   applications WHERE App_ID='$id'");
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row["Sale"];
            }
        }
     
      }
     public function getAgeRating($id)
      {
          $result=$this->dbConnection->query("SELECT AgeRating FROM applications WHERE App_ID='$id'");
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row["AgeRating"];
            }
        }
     
      }
     public  function getSystem_Requirements($id)
      {
          $result=$this->dbConnection->query("SELECT System_Requirements FROM  applications WHERE App_ID='$id'");
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row["System_Requirements"];
            }
        }
     
      }
     public function getRating($id)
      {
          $result=$this->dbConnection->query("SELECT Rating FROM  applications App_ID='$id'");
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row["Rating"];
            }
        }
     
      }
     public function getApplication_Picture($id)
      {
        $result=$this->dbConnection->query("SELECT Application_Picture FROM   applications WHERE App_ID='$id'");
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row["Application_Picture"];
            }
        }
     
      }
     public function getApplication_Link($id)
      {
        $result=$this->dbConnection->query("SELECT Application_Link FROM   applications WHERE App_ID='$id'");
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row["Application_Link"];
            }
        }
     
      }
    public function getAppDescription($id)
      {
        $result=$this->dbConnection->query("SELECT AppDescription FROM   applications WHERE App_ID='$id'");
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row["AppDescription"];
            }
        }
     
      }
    public function getAppTrailer($id)
      {
          $result=$this->dbConnection->query("SELECT AppTrailer FROM  applications WHERE App_ID='$id'");
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row["AppTrailer"];
            }
        }
     
      } 
    public function getHide($id)
      {
          $result=$this->dbConnection->query("SELECT Hide FROM  applications WHERE App_ID='$id'");
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row["Hide"];
            }
        }
     
      }
   public function getRelease_Date($id)
      {
          $result	=$this->dbConnection->query("SELECT Release_Date FROM  applications WHERE App_ID='$id'");
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row["Release_Date"];
            }
        }
     
      }	
    public function getU_ID($id)
      {
          $result=$this->dbConnection->query("SELECT FROM   U_ID applications WHERE App_ID='$id'");
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row["U_ID"];
            }
        }
     
      }
    public function getReview_Count($id)
      {///may be different
          $result	=$this->dbConnection->query("SELECT COUNT(ReviewID) FROM  reviewed WHERE ApplicationID='$id'");
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row["Review_Count"];
            }
        }
     
      }	
    //   public  function InsertApp($App_ID,$Application_Name,$NumOfUsers,$Price,$Sale,$AgeRating,$System_Requirements,$Rating,$Application_Picture,$AppDescription,$AppTrailer,$Region,$Hide,$Release_Date,$U_ID	)
    //   {
    //     $dbConnection->query("INSERT INTO applications (App_ID,Application_Name,NumOfUsers,Price,Sale,AgeRating,System_Requirements,,Application_Picture,AppDescription,AppTrailer,Region,Hide,Release_Date,U_ID)VALUES ('$App_ID','$Application_Name','$NumOfUsers','$Price','$Sale','$AgeRating','$System_Requirements','$Rating','$Application_Picture','$AppDescription','$AppTrailer','$Region','$Hide','$Release_Date','$U_ID')  ");
        
    //   }
      //Modified Version
     public  function InsertApp($Application_Name,$NumOfUsers,$Price,$Sale,$AgeRating,$System_Requirements,$Rating,$Application_Picture,$Application_Link,$AppDescription,$AppTrailer,$Region,$Hide,$Release_Date,$U_ID	)
      {
        $insertquery = "INSERT INTO applications (Application_Name,NumOfUsers,Price,Sale,AgeRating,System_Requirements,Rating,Application_Picture,Application_Link,AppDescription,AppTrailer,Region,Hide,Release_Date,U_ID) VALUES ('$Application_Name','$NumOfUsers','$Price','$Sale','$AgeRating','$System_Requirements','$Rating','$Application_Picture','$Application_Link','$AppDescription','$AppTrailer','$Region','$Hide','$Release_Date','$U_ID') ";
        return $insertquery;
        
        //mysqli_query($dbConnection, $insertquery);
      }
      
    }
?>