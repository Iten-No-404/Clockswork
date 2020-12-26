<?php 

session_start();

$serverName = 'localhost'; // server ip
$dbUserName = 'root';      // server acess username
$dbUserNamePass = '';      // the password of the specified username, in this case there's no password, http://localhost/phpmyadmin/server_privileges.php?viewing_mode=server formore info
$dbName = 'test4';         // database name
$dbConnection = mysqli_connect($serverName, $dbUserName, $dbUserNamePass, $dbName);

if(!$dbConnection)
{
    die("<script>alert('FATAL ERROR: FAILED TO CONNECT TO DATABASE')</script>");
}
?>