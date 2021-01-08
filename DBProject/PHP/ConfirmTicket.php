<?php 
    require 'supportticket.php';
    if (session_status() == PHP_SESSION_NONE)
        session_start();
    $TID = $_GET['id'];
    $EID = $_SESSION['U_ID'];
    $db = DBConnection::getInst()->getconnection();
    $result = $db->query("UPDATE SupportTicket SET Closed = 'B' WHERE TicketID = $TID");
    $l = $db->query("INSERT INTO ReviewedBy (EmployeeID, TicketID) VALUES ($EID, $TID) ");
    RedirectJS("../HTML/UnconfirmedTickets.php");
?>