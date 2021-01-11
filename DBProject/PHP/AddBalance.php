<?php
    require_once 'user.php';
    if (isset($_POST['AddBalance']))
    {
        $user = new user($_GET['id']);
        $num = rand(10, 1000);
        $user->Balance += $num;
        $query = "UPDATE Users SET Balance = $user->Balance WHERE U_ID = $user->U_ID";
        DBConnection::getInst()->getConnection()->query($query);
        AlertJS("Your balance has increased by " . $num);
        RedirectJS("../HTML/user.php?id=$user->U_ID");
    }
?>