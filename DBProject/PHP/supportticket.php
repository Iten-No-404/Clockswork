<?php

include_once('connection.php');

class supportticket
{
   public $TicketID;
   public $ReportDescription;
   public $Closed;
   public $U_ID;
   public $AddtionalFilesPath;
     // Creates a new object and initializes its data
     public function __construct($id)
     {
        $this->dbConnection = DBConnection::getInst()->getConnection();
        $result = $this->dbConnection->query("SELECT * FROM  SupportTicket WHERE TicketID='$id'");
        $row = $result->fetch_assoc();
        $this->TicketID = $row['TicketID'];
        $this->ReportDescription = $row['ReportDescription'];
        $this->Closed = $row['Closed'];
        $this->U_ID = $row['U_ID'];
        $this->AddtionalFilesPath = $row['AddtionalFilesPath'];
     
     }
      public static function insertsupportticket($ReportDescription,$Closed,$U_ID,$AddtionalFilesPath)
      {
        $db = DBConnection::getInst()->getConnection();
        $result= $db->query("INSERT INTO supportticket (ReportDescription,Closed,U_ID,AddtionalFilesPath)VALUES ('$ReportDescription','$Closed',$U_ID,'$AddtionalFilesPath') ");
        return $result;
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
     public function getU_ID($id)
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
    
     public function getAddtionalFilesPath($id)
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

     public static function getAllSupportTicketsForUser($uid)
     {
         $db = DBConnection::getInst()->getConnection();
         $result = $db->query("SELECT * FROM SupportTicket WHERE U_ID = '$uid'");
         return $result;
     }
  

}

?>