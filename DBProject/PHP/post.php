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

   public  function updatepost($TEXTpost,$picture,$post_id)
   {
       $this->dbConnection->query("UPDATE  post SET TEXTpost='$TEXTpost',picture='$picture' WHERE Post_id='$post_id' ");

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
                //echo $row["U_ID"];
                return $row["U_ID"];
            }
        }
     }
     public function select($group_id)
     {
        $result = $this->dbConnection->query("SELECT Post_id,U_ID FROM  post WHERE group_id=$group_id ORDER BY Post_id DESC");
        //If we want the posts to be sorted according to Date_Written. It's not the best option though since we only store the date not the time
        //$result = $this->dbConnection->query("SELECT Post_id,U_ID FROM  post WHERE group_id=$group_id ORDER BY Date_Written DESC");
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
   public  function insertup_down_voted_review($U_ID,$Post_id,$Up_Down)
   {
      $this->dbConnection->query("INSERT INTO up_down_voted_post (U_ID,Post_id,Up_Down) VALUES ($U_ID,$Post_id,'$Up_Down')");
   }
   public function selectup($Post_id)
   {
      $result=$this->dbConnection->query("SELECT  count(Post_id) FROM  up_down_voted_post WHERE Up_Down='1' AND Post_id=$Post_id");
      if ($result->num_rows >0) {
          // output data of each row
       
          while($row = $result->fetch_assoc()) {
             
                 echo $row["count(Post_id)"];
                 echo " Up Voted";
           

          }
      }
     
     
   }
   public function selectdown($Post_id)
   {
      echo"  ";
      $result=$this->dbConnection->query("SELECT  count(Post_id) FROM  up_down_voted_post WHERE Up_Down='0' AND Post_id=$Post_id");
      if ($result->num_rows >0) {
          // output data of each row
    
          while($row = $result->fetch_assoc()) {
         
                 echo $row["count(Post_id)"];
                 echo" Down Voted";
             

          }
      }
   

   }

   public function  selectup_down_voted_post($U_ID,$post_id,$Up_Down)
   {
      $result=$this->dbConnection->query("SELECT Up_Down FROM  up_down_voted_post WHERE U_ID=$U_ID AND post_id=$post_id");
      if ($result->num_rows > 0) {
         $row = $result->fetch_assoc();
           if($row['Up_Down'] !=$Up_Down)
          $this->dbConnection->query("UPDATE up_down_voted_post SET Up_Down='$Up_Down' WHERE U_ID=$U_ID AND post_id=$post_id ");
          else {
              $this->dbConnection->query("DELETE FROM  up_down_voted_post WHERE U_ID=$U_ID AND post_id=$post_id ");

          }
      }
      else {
          $this-> insertup_down_voted_post($U_ID,$post_id,$Up_Down);
      }
   }

   public function getgroupidfrompost($Post_id)
   {
      $result= $this->dbConnection->query("SELECT  group_id	FROM post WHERE Post_id='$Post_id'");
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              return $row["group_id"];
          }
      }
   }

   public function deletefrompost($Post_id)
   {
      $this->dbConnection->query("DELETE FROM post WHERE Post_id=$Post_id");
   }
}
