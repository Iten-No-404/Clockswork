<?php
require_once '../PHP/functions.php';
require_once '../PHP/app.php';
if (app::HideApp($_GET['id'])) {
    AlertJS('App hidden successfully, contact the developer or the DB admins to unhide it');
    RedirectJS('../HTML/Browse.php');
}
else
{
    AlertJS('App hiding failed');
    RedirectJS("../HTML/Application.php?id=$_GET[id]");
}
