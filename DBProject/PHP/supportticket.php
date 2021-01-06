<?php

include_once('connection.php');

class supportticket
{
   
     
     // Creates a new object and initializes its data
     public function __construct()
     {
         $this->dbConnection = DBConnection::getInst()->getConnection();
        
     
     }
      public function insertsupportticket($ReportDescription,$Closed,$U_ID,$AddtionalFilesPath)
      {
         $result= $this->dbConnection->query("INSERT INTO supportticket (ReportDescription,Closed,U_ID,AddtionalFilesPath)VALUES ('$ReportDescription','$Closed',$U_ID,'$AddtionalFilesPath') ");

      }
     public function getReportDescription($id)
     {
        $result = $this->dbConnection->query("SELECT ReportDescription	FROM supportticket WHERE TicketID='$id'");
        // If the query returns a result
        if ($result->num_rows > 0)
         {
            // output data of each row
            while ($row = $result->fetch_assoc())
            {
                echo $row["ReportDescription"];
            }
        }
     }
     public function getClosed($id)
     {
        $result = $this->dbConnection->query("SELECT Closed FROM supportticket WHERE TicketID='$id'");
        // If the query returns a result
        if ($result->num_rows > 0)
         {
            // output data of each row
            while ($row = $result->fetch_assoc())
            {
                echo $row["Closed"];
            }
        }
     }
     public function getpicture($id)
     {
        $result = $this->dbConnection->query("SELECT U_ID FROM supportticket WHERE TicketID='$id'");
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
    
     public function getU_ID($id)
     {
        $result = $this->dbConnection->query("SELECT AddtionalFilesPath	 FROM supportticket WHERE TicketID='$id'");
        // If the query returns a result
        if ($result->num_rows > 0)
         {
            // output data of each row
            while ($row = $result->fetch_assoc())
            {
                echo $row["AddtionalFilesPath"];
            }
        }
     }
  

}

?>