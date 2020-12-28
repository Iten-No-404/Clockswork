<?php
// Reads data from "data.json" and writes it so it can be inserted into the DB
require 'connection.php';

$json = file_get_contents('data.json');
$data = json_decode($json);
$domains = array('@Bruh.com', '@Nice.org', '@CSM.jap', '@at.at', '@assembly.insane');
$file = "data.SQL";

$handle = fopen($file, 'w');

foreach ($data as $user) {
    // firstName, lastName, gender, userName, password, phone, address
    $fName = $user->{'firstName'};
    $lName = $user->{'lastName'};
    $gen = $user->{'gender'};
    $userName = $user->{'userName'};
    $password = password_hash($user->{'password'}, PASSWORD_DEFAULT);
    $phone = $user->{'phone'};
    $address = $user->{'address'};
    $randEmail = $user->{'firstName'} . $domains[rand(0, count($domains) - 1)];

    $line = "INSERT INTO users (Fname,LName, UserName, Password, Email, Address, Phone_Number) VALUES('$fName', '$lName','$userName', '$password','$randEmail',\"$address\",'$phone');";
    fwrite($handle, $line);
    fwrite($handle, "\n");
}
fclose($handle);
