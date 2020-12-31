<?php 
include('functions.php');
session_start();

$serverName = 'localhost'; // server ip
$dbUserName = 'root';      // server acess username
$dbUserNamePass = '';      // the password of the specified username, in this case there's no password, http://localhost/phpmyadmin/server_privileges.php?viewing_mode=server formore info
$dbName = 'clockwork';         // database name
$dbConnection = mysqli_connect($serverName, $dbUserName, $dbUserNamePass, $dbName);

if(!$dbConnection)
{
    AlertJS("FATAL ERROR: FAILED TO CONNECT TO DATABASE");
    die();
}
?>