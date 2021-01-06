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

     public function getidsCount()
     {
      $result= $this->dbConnection->query("SELECT COUNT(Category_ID) FROM categories" );
      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
          echo end($row);
        }
      }
     }

     public function getallcategories()
     {
      $result= $this->dbConnection->query("SELECT * FROM  categories Order By Category_Name ASC" );
      return $result;
     }
     public function getCategoryid($Name)
     {
          $CategoryID=$this->dbConnection->query("SELECT DISTINCT Category_ID FROM  categories WHERE Category_Name='$Name'");
          if ($CategoryID->num_rows > 0) {
               // output data of each row
               while ($row = $CategoryID->fetch_assoc()) {
                 echo $row["Category_ID"];
               }
             }
          else
          echo 0;
     }  

     public function addnewCategory($Name)
     {
        $insertquery = $this->dbConnection->query("INSERT INTO categories (Category_Name) VALUES ('$Name') ");
        //return $insertquery;
    }

    public function addnewCategorywithid($id,$Name)
    {
       $insertquery = $this->dbConnection->query("INSERT INTO categories (Category_ID, Category_Name) VALUES ($id,'$Name') ");
       return $insertquery;
   }

   public function getmaxidp1()
   {
      $query = $this->dbConnection->query("SELECT DISTINCT Category_ID FROM categories Order By Category_ID DESC LIMIT 1");
      if ($query->num_rows > 0) {
        // output data of each row
        while ($row = $query->fetch_assoc()) {
          echo ((int)($row["Category_ID"]) +1);
        }
      }
  }

  public  function insertappcategory($appid, $categoryid)
{
  $insertquery = $this->dbConnection->query("INSERT INTO categorized (App_ID, Category_ID) VALUES ($appid, $categoryid) ");
  return $insertquery;
}

public function deleteemptycategories()
{
  $deletequery = $this->dbConnection->query("DELETE From categories WHERE Category_ID NOT in (SELECT DISTINCT Category_ID from categorized ) ");
  return $deletequery;
}
}
