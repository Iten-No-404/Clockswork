<?php
require 'connection.php';
class categories{
    public $id;
    public function __construct($idpassed) {
        $id=$idpassed;
       }
     public function getCategoryName()
     {
          $CategoryName=$dbConnection->query("SELECT Category_Name FROM  categories WHERE Category_ID='$id'");
          return $CategoryName;
     }  
     public function getAppCount()
     {
          $AppCount=$dbConnection->query("SELECT COUNT(App_ID) FROM categorized WHERE Category_ID='$id'");
          return $AppCount;
     }  
}
?>