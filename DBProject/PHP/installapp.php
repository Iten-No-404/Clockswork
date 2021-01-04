<?php

require_once 'app.php';
require_once 'user.php';
require_once 'functions.php';
session_start();
$UserID=(int)$_SESSION['U_ID'];
$obj=new APP();
$user=new User($UserID);
$id = $_GET['id'];
$link=$obj->getApplication_Link2($id);
$price=$obj->getPrice2($id);
$wallet=$user-> getBalance2($UserID);

$appdate = date('Y-m-d', time());  
$today = date("Y-m-d");
$dateOfBirth=$user->getBDate2($UserID);
$diff = date_diff(date_create($dateOfBirth), date_create($today));
$agerating=$obj->getAgeRating2($id);
                                           
if($obj->selectpurchased_by($UserID,$id) && $price<=$wallet && $agerating<= $diff->format('%y')  )
{$obj->purchased_by($UserID,$id,$appdate);
    $obj->updatenumofuser($id);
    $user-> updateBalance($UserID ,$price);
    RedirectJS($link);
}

else {
    AlertJS("You already downloaded it or you don't have enough money");

}





?>