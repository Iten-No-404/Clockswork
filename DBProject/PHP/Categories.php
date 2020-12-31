<?php
require 'connection.php';
class categories{
    
     public $dbConnection ;
     public function __construct() {
      $dpserver="localhost";
      $dpusername="root";
      $password="";
      $dpname="try";
      $this->dbConnection=mysqli_connect($dpserver,$dpusername,$password,$dpname);
    
     }
     public function getCategoryName($id)
     {
          $CategoryName=$this->dbConnection->query("SELECT Category_Name FROM  categories WHERE Category_ID='$id'");
        
     }  
     public function getAppCount($id)
     {
          $AppCount=$this->dbConnection->query("SELECT COUNT(App_ID) FROM categorized WHERE Category_ID='$id'");
         
     }  
}
?>