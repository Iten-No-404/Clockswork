<?php

include_once('connection.php');
class app
{
  public $dbConnection;

  public function __construct()
  {
    $this->dbConnection  = DBConnection::getInst()->getConnection();
  }

  public function getname($id)
  {

    $result = $this->dbConnection->query("SELECT DISTINCT Application_Name FROM  applications WHERE App_ID='$id'");
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        echo $row["Application_Name"];
      }
    }
  }
  public function getname2($id)
  {

    $result = $this->dbConnection->query("SELECT DISTINCT Application_Name FROM  applications WHERE App_ID='$id'");
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        return $row["Application_Name"];
      }
    }
  }
  public function getRegion($id)
  {

    $result = $this->dbConnection->query("SELECT Region FROM  applications WHERE App_ID='$id'");
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        echo $row["Application_Name"];
      }
    }
  }

  public function getallids()
  {
    $result = $this->dbConnection->query("SELECT App_ID FROM  applications WHERE Hide='0'");
    return $result;
  }
  public  function getNumOfUsers($id)
  {
    $result = $this->dbConnection->query("SELECT NumOfUsers  FROM   applications WHERE App_ID='$id'");
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        echo $row["NumOfUsers"];
      }
    }
  }
  public function getPrice($id)
  {
    $result = $this->dbConnection->query("SELECT Price FROM  applications WHERE App_ID='$id'");
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        if ($row["Price"] != 0)
          echo $row["Price"];
        else
          echo "Free";
      }
    }
  }
  public function getPrice2($id)
  {
    $result = $this->dbConnection->query("SELECT Price FROM  applications WHERE App_ID='$id'");
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
       
         return  $row["Price"];
    
      }
    }
  }
  
  public function getSale($id)
  {
    $result = $this->dbConnection->query("SELECT Sale FROM   applications WHERE App_ID='$id'");
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        echo $row["Sale"];
      }
    }
  }
  public function getAgeRating($id)
  {
    $result = $this->dbConnection->query("SELECT AgeRating FROM applications WHERE App_ID='$id'");
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        echo $row["AgeRating"];
      }
    }
  }
  public function getAgeRating2($id)
  {
    $result = $this->dbConnection->query("SELECT AgeRating FROM applications WHERE App_ID='$id'");
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
       return  $row["AgeRating"];
      }
    }
  }
  public  function getSystem_Requirements($id)
  {
    $result = $this->dbConnection->query("SELECT System_Requirements FROM  applications WHERE App_ID='$id'");
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        echo $row["System_Requirements"];
      }
    }
  }
  public function getRating($id)
  {
    $result = $this->dbConnection->query("SELECT Rating FROM  applications WHERE App_ID='$id'");

    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        $x = $row["Rating"];
        while ($x > 0) {
          echo ' <i class="fa fa-star" aria-hidden="true"></i>';

          $x--;
        }
      }
    }
  }
  public function getApplication_Picture($id)
  {
    $result = $this->dbConnection->query("SELECT Application_Picture FROM   applications WHERE App_ID='$id'");

    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) { ?>
        <img class="img-fluid" src="<?php echo $row["Application_Picture"]; ?>" alt="">

      <?php }
    }
  }
  public function getApplication_Picturecircle($id)
  {
    $result = $this->dbConnection->query("SELECT Application_Picture FROM   applications WHERE App_ID='$id'");

    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) { ?>
        <img class="img-fluid rounded-circle" src="<?php echo $row["Application_Picture"]; ?>" alt="">

      <?php }
    }
  }
  public function getApplication_Link2($id)
  {
    $result = $this->dbConnection->query("SELECT Application_Link FROM   applications WHERE App_ID='$id'");
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) { 
        return $row["Application_Link"];
      }
    }
  }
  public function getApplication_Link($id)
  {
    $result = $this->dbConnection->query("SELECT Application_Link FROM   applications WHERE App_ID='$id'");
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) { ?>
        <a href="<?php echo $row["Application_Link"]; ?>">Install</a>

<?php  }
    }
  }
  public function getAppDescription($id)
  {
    $result = $this->dbConnection->query("SELECT AppDescription FROM   applications WHERE App_ID='$id'");
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        echo $row["AppDescription"];
      }
    }
  }
  public function getAppTrailer($id)
  {
    $result = $this->dbConnection->query("SELECT AppTrailer FROM  applications WHERE App_ID='$id'");
    
    if ($result->num_rows >0) {
      // output data of each row
      // output data of each row
      while ($row = $result->fetch_assoc()) { ?>
         <iframe src="<?php  echo $row['AppTrailer'];   ?>" width="100%" height="850px"></iframe>

      <?php }
         

     }
    
  
  }
  public function getHide($id)
  {
    $result = $this->dbConnection->query("SELECT Hide FROM  applications WHERE App_ID='$id'");
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        echo $row["Hide"];
      }
    }
  }
  public function getRelease_Date($id)
  {
    $result  = $this->dbConnection->query("SELECT Release_Date FROM  applications WHERE App_ID='$id'");
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        echo $row["Release_Date"];
      }
    }
  }
  public function getU_ID($id)
  {
    $result = $this->dbConnection->query("SELECT U_ID FROM  applications WHERE App_ID='$id'");
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        return $row["U_ID"];
      }
    }
  }

  public function getReview_Count($id)
  { ///may be different
    $result  = $this->dbConnection->query("SELECT COUNT(ReviewID) FROM  reviewed WHERE ApplicationID='$id'");
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        echo $row["Review_Count"];
      }
    }
  }
  //   public  function InsertApp($App_ID,$Application_Name,$NumOfUsers,$Price,$Sale,$AgeRating,$System_Requirements,$Rating,$Application_Picture,$AppDescription,$AppTrailer,$Region,$Hide,$Release_Date,$U_ID	)
  //   {
  //     $dbConnection->query("INSERT INTO applications (App_ID,Application_Name,NumOfUsers,Price,Sale,AgeRating,System_Requirements,,Application_Picture,AppDescription,AppTrailer,Region,Hide,Release_Date,U_ID)VALUES ('$App_ID','$Application_Name','$NumOfUsers','$Price','$Sale','$AgeRating','$System_Requirements','$Rating','$Application_Picture','$AppDescription','$AppTrailer','$Region','$Hide','$Release_Date','$U_ID')  ");

  //   }
  //Modified Version
  public  function InsertApp($Application_Name, $NumOfUsers, $Price, $Sale, $AgeRating, $System_Requirements, $Rating, $Application_Picture, $Application_Link, $AppDescription, $AppTrailer, $Region, $Hide, $Release_Date, $U_ID)
  {
    $insertquery = "INSERT INTO applications (Application_Name,NumOfUsers,Price,Sale,AgeRating,System_Requirements,Rating,Application_Picture,Application_Link,AppDescription,AppTrailer,Region,Hide,Release_Date,U_ID) VALUES ('$Application_Name','$NumOfUsers','$Price','$Sale','$AgeRating','$System_Requirements','$Rating','$Application_Picture','$Application_Link','$AppDescription','$AppTrailer','$Region','$Hide','$Release_Date','$U_ID') ";
    return $insertquery;

    //mysqli_query($dbConnection, $insertquery);
  }
  public function editapp($Application_Name, $Price, $AgeRating, $System_Requirements, $Application_Picture, $Application_Link, $AppDescription, $AppTrailer, $Region,$Sale,$Hide,$App_ID)
  {
    $result  = $this->dbConnection->query("UPDATE applications SET Application_Name= '$Application_Name',Price='$Price',AgeRating='$AgeRating',System_Requirements='$System_Requirements',Application_Picture='$Application_Picture',Application_Link='$Application_Link',AppDescription='$AppDescription',AppTrailer='$AppTrailer',Region='$Region',Sale='$Sale',Hide='$Hide' WHERE App_ID='$App_ID' ");
  }
  public function purchased_by($UserID,$ApplicationID,$Purchase_Date)
  {
    $result  = $this->dbConnection->query("INSERT INTO purchased_by (UserID,ApplicationID,Purchase_Date	)VALUES ($UserID,$ApplicationID,$Purchase_Date)");
  }
  public function getmyapps($UserID)
  {
    $result = $this->dbConnection->query("SELECT App_ID FROM  applications WHERE U_ID=$UserID");
     return $result;
  }
  public function getids()
  {
    $result= $this->dbConnection->query("SELECT App_ID FROM  applications");
   $x=-1;
     if ($result->num_rows > 0) {
      // output data of each rowget
      while($row = $result->fetch_assoc()) {
              if($row["App_ID"]>$x)
                { $x=$row["App_ID"];

                }

            }
        }
      return $x;
      
  }
  public function selectpurchased_by($UserID,$ApplicationID)
  {
    $result  = $this->dbConnection->query("SELECT * FROM purchased_by WHERE UserID=$UserID AND ApplicationID=$ApplicationID ");
    
    if ($result->num_rows > 0) {
       return false;
    }
    return true;
  }
  public function updatenumofuser($ApplicationID)
  {
    $this->dbConnection->query("UPDATE applications SET NumOfUsers=NumOfUsers+1 WHERE  App_ID=$ApplicationID  ");

  }
 
  public function deleteapp($id)
  {
    echo "done";
    $result="DELETE FROM applications WHERE App_ID=$id";
    var_dump($result);
    mysqli_query($this->dbConnection, $result);
  }
  public function deletefrompurchased_by($id)
  {
    $result  = $this->dbConnection->query("DELETE FROM purchased_by WHERE ApplicationID=$id  ");
  }
}
?>