<?php

include_once('connection.php');

class post
{
   
     
     // Creates a new object and initializes its data
     public function __construct()
     {
         $this->dbConnection = DBConnection::getInst()->getConnection();
        
     
     }
      public function insertpost($TEXTpost,$Date_Written,$post_id,$picture,$U_ID,$group_id)
      {  //echo "done";
         $result= $this->dbConnection->query("INSERT INTO post (TEXTpost,Date_Written,Post_id,picture,U_ID,group_id) VALUES ('$TEXTpost','$Date_Written',$post_id,'$picture',$U_ID,$group_id) ");

      }
     public function getTEXTpost($id)
     {
        $result = $this->dbConnection->query("SELECT TEXTpost FROM  post WHERE Post_id='$id'");
        // If the query returns a result
        if ($result->num_rows > 0)
         {
            // output data of each row
            while ($row = $result->fetch_assoc())
            {
                echo $row["TEXTpost"];
            }
        }
     }
     public function getDate_Written($id)
     {
        $result = $this->dbConnection->query("SELECT Date_Written FROM  post WHERE Post_id='$id'");
        // If the query returns a result
        if ($result->num_rows > 0)
         {
            // output data of each row
            while ($row = $result->fetch_assoc())
            {
                echo $row["Date_Written"];
            }
        }
     }
     public function getpicture($id)
     {
        $result = $this->dbConnection->query("SELECT picture FROM  post WHERE Post_id='$id'");
        // If the query returns a result
        if ($result->num_rows > 0)
         {
            // output data of each row
            while ($row = $result->fetch_assoc())
            {
                echo $row["picture"];
            }
        }
     }
    
     public function getU_ID($id)
     {
        $result = $this->dbConnection->query("SELECT U_ID FROM  post WHERE Post_id='$id'");
        // If the query returns a result
        if ($result->num_rows > 0)
         {
            // output data of each row
            while ($row = $result->fetch_assoc())
            {
                echo $row["U_ID"];
            }
        }
     }
     public function select($group_id)
     {
        $result = $this->dbConnection->query("SELECT Post_id,U_ID FROM  post WHERE group_id=$group_id");
            return $result;
     }
    
     public function getgroup_id($id)
     {
        $result = $this->dbConnection->query("SELECT group_id FROM  post WHERE Post_id='$id'");
        // If the query returns a result
        if ($result->num_rows > 0)
         {
            // output data of each row
            while ($row = $result->fetch_assoc())
            {
                echo $row["group_id"];
            }
        }
     }
    public function insertup_down_voted_post($U_ID,$Post_id,$Up_Down)
    {
        $result= $this->dbConnection->query("INSERT INTO up_down_voted_post (U_ID,Post_id,Up_Down)VALUES ($U_ID,$Post_id,$Up_Down) ");

    }
    public function postgetmaxidp1()
    {
       $query = $this->dbConnection->query("SELECT DISTINCT Post_id FROM post Order By Post_id DESC LIMIT 1");
       if ($query->num_rows > 0) 
       {
         while ($row = $query->fetch_assoc()) 
         {
          return ((int)($row["Post_id"]) + 1);
         }
       }
       else
        return 1;
   }
}