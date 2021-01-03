<?php

require_once 'app.php';
require_once 'functions.php';
session_start();

$obj=new APP();
$id = $_GET['id'];
$link=$obj->getApplication_Link2($id);
$appdate = date('Y-m-d', time());                                                      
$UserID=(int)$_SESSION['U_ID'];
if($obj->selectpurchased_by($UserID,$id))
{$obj->purchased_by($UserID,$id,$appdate);
    $obj->updatenumofuser($id);
}
else {
    AlertJS("You already downloaded it");
    RedirectJS($link);
}

RedirectJS($link);



?>