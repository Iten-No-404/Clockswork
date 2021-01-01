<?php
require_once 'connection.php';
class categories{
    
     public $dbConnection;    
     
     public function __construct()
     {
       $this->dbConnection  = DBConnection::getInst()->getConnection();
     }

     public function getCategoryName($id)
     {
          $CategoryName=$this->dbConnection->query("SELECT DISTINCT Category_Name FROM  categories WHERE Category_ID=$id");
          if ($CategoryName->num_rows > 0) {
               // output data of each row
               while ($row = $CategoryName->fetch_assoc()) {
                 echo $row["Category_Name"];
               }
             }
     }  
     public function getAppCount($id)
     {
          $AppCount=$this->dbConnection->query("SELECT DISTINCT COUNT(App_ID) FROM categorized WHERE Category_ID=$id");
          if ($AppCount->num_rows > 0) {
               // output data of each row
               while ($row = $AppCount->fetch_assoc()) {
                 echo end($row);
               }
             }
     }  
     public function getApps($id)
     {
          $Apps=$this->dbConnection->query("SELECT App_ID FROM categorized WHERE Category_ID=$id");
          return $Apps;
         
     }  
     public function getallids( )
     {
        $result= $this->dbConnection->query("SELECT Category_ID FROM  categories Order By Category_Name ASC" );
        return $result;
     }
}
