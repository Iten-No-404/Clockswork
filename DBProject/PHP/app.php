<?php
require 'connection.php';
class app
{
   public $id;
   public function __construct($idpassed) {
       $id=$idpassed;
      }
      public function getname( )
      {
         $name=$dbConnection->query("SELECT Application_Name FROM  applications WHERE App_ID='$id'");
         return $name;
      }
      public function getNumOfUsers()
      {
          $NumOfUsers=$dbConnection->query("SELECT NumOfUsers  FROM   applications WHERE App_ID='$id'");
          return $NumOfUsers;
      }
      public function getPrice()
      {
          $Price=$dbConnection->query("SELECT Price FROM  applications WHERE App_ID='$id'");
          return $Price;
      }
      public function getSale()
      {
          $Sale=$dbConnection->query("SELECT Sale FROM   applications WHERE App_ID='$id'");
          return $Sale;
      }
      public function getAgeRating()
      {
          $AgeRating=$dbConnection->query("SELECT AgeRating FROMapplications WHERE App_ID='$id'");
          return $AgeRating;

      }
      public function getSystem_Requirements()
      {
          $System_Requirements=$dbConnection->query("SELECT System_Requirements FROM  applications WHERE App_ID='$id'");
          return $System_Requirements;
      }
      public function getRating()
      {
          $Rating=$dbConnection->query("SELECT Rating FROM  applications App_ID='$id'");
          return $Rating;
      }
      public function getApplication_Picture()
      {
        $Application_Picture=$dbConnection->query("SELECT Application_Picture FROM   applications WHERE App_ID='$id'");
        return $Application_Picture;
      }
     public function getAppDescription	()
      {
        $AppDescription	=$dbConnection->query("SELECT AppDescription FROM   applications WHERE App_ID='$id'");
        return $AppDescription;
      }
      public function getAppTrailer()
      {
          $AppTrailer=$dbConnection->query("SELECT AppTrailer FROM  applications WHERE App_ID='$id'");
          return $AppTrailer;
      } 
      public function getHide()
      {
          $Hide=$dbConnection->query("SELECT Hide FROM  applications WHERE App_ID='$id'");
          return $Hide;
      }
      public function getRelease_Date()
      {
          $Release_Date	=$dbConnection->query("SELECT Release_Date FROM  applications WHERE App_ID='$id'");
          return $Release_Date;
      }	
      public function getU_ID()
      {
          $U_ID=$dbConnection->query("SELECT FROM   U_ID applications WHERE App_ID='$id'");
          return $U_ID;
      }
      
}
?>