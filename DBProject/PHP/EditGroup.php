<?php
include_once 'connection.php';
include_once 'Group.php';

if (isset($_POST['destroy']))
    {
        if (session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }
        $GID = $_GET['id'];
        $query1 = "DELETE FROM Groups WHERE Group_ID = '$GID'";
        $dbConnection = DBConnection::getInst()->getConnection();
        $result = $dbConnection->query($query1);
        if ($result == true)
        {
            AlertJS("Group Deleted");
            RedirectJS(("../HTML/Home.php"));
        }
        else
        {
            AlertJs("Failed to delete group");
            RedirectJS(("../HTML/Groups_List.php"));
        }
        return;
    }

if (isset($_POST['save']))
{

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // Grabbing the data
    $dbConnection = DBConnection::getInst()->getConnection();
    $group = new group($_GET['id']);
    $GID = $_GET['id'];
    $groupName = mysqli_real_escape_string($dbConnection, $_POST['GroupN']);
    $groupDesc = mysqli_real_escape_string($dbConnection, $_POST['GroupD']);
    $ImagePath = UploadFile('../IMAGES/', 'GroupP', '../HTML/CreateGroup.php', $group->U_ID, $groupName);
    $EmptyName = 0;

    if ($groupName == '')
    {
        $groupName = $group->GroupName;
        $EmptyName = 1;
    }

    if ($groupDesc == '')
    {
        $groupDesc = $group->Group_Description;
    }

    if($ImagePath == '')
    {
        $ImagePath = $group->Group_picture;
    }
    
    // Check if a group with the same name & owner already exists
    $query = "SELECT * FROM groups WHERE GroupName='$groupName'";
    $queryResult = $dbConnection->query($query);
    // If not, add the group to the DB
    if ($queryResult->num_rows == 0 || $EmptyName == 1)
     {
        $query2 = "UPDATE Groups SET GroupName = '$groupName', Group_Description = '$groupDesc'";
        $dbConnection->query($query2);
        group::UpdateGroupPic($ImagePath, $GID);



        AlertJS('Group Info Changed!\npress OK to go to the home page.');
        // TODO: Redirect the user to their own group 
        RedirectJS('../HTML/Home.php');
    }
    // Otherwise, alert the user and redoirect the user to the home page
    else {
        AlertJS('A group with the same name already exists!');
        RedirectJS("../HTML/Home.php");
        return;
    }
    
    RedirectJS(("../HTML/Home.php"));
    return;
}
