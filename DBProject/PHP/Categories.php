<?php
require 'connection.php';
class categories{
    
     public $dbConnection = DBConnection::getInst()->getConnection();    
     
     public function getCategoryName($id)
     {
          $CategoryName=$this->dbConnection->query("SELECT Category_Name FROM  categories WHERE Category_ID='$id'");
        
     }  
     public function getAppCount($id)
     {
          $AppCount=$this->dbConnection->query("SELECT COUNT(App_ID) FROM categorized WHERE Category_ID='$id'");
         
     }  
}
