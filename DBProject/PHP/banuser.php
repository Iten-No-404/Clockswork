<?php
require_once '../PHP/functions.php';
require_once '../PHP/user.php';
// Get the banned user's ID
// Get the ban end date
// Validate the date: is a valid date, has not passed
// If valid, set Ban_End for the banned user
// Otherwise, change nothing
$bannedUser = $_GET['id'];
$banEndDate = $_POST['ban_end_date'];
$BanExploded = explode('-', $banEndDate);
$now = date('Y-m-d');
$formatted = date('Y-m-d', strtotime($banEndDate)); 
$test = $formatted <= $now;
if (count($BanExploded) < 3 || !checkdate($BanExploded[1], $BanExploded[2], $BanExploded[0]) || $banEndDate == "" || $test) {
    $banEndDate = NULL;
} else {
    $banEndDate = implode('-', $BanExploded);
}

user::Ban($bannedUser, $banEndDate);

if ($banEndDate != NULL) {
    AlertJS("Set ban end to  " . " $banEndDate" . " successfuly");
} else {
    AlertJS("Invalid or past date, set ban end to NULL (user unbanned).");
}

RedirectJS("../HTML/user.php?id=$bannedUser");
