<?php
require 'connection.php';
require 'Group.php';
if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

$GID = $_GET['id'];

if (isset($_POST['JoinG']))
{
    group::InsertMember_in($_SESSION['U_ID'], $GID);
    AlertJs("Joined Group!");
    RedirectJS("../HTML/Groups_List.php");
    return;
}

if (isset($_POST['ExitG']))
{
    $UID = $_SESSION['U_ID'];
    $query = "DELETE FROM Member_In WHERE U_ID = '$UID' AND Group_ID = '$GID'";
    $dbConnection = DBConnection::getInst()->getConnection();
    $result = $dbConnection->query($query);
    AlertJs("Exited Group");
    RedirectJS("../HTML/Home.php");
}

?>