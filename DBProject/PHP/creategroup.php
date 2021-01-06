<?php
include_once 'connection.php';
include_once 'group.php';

if (isset($_POST['create'])) {

    $ImagePath = UploadFile('../IMAGES/', 'group_picture', '../HTML/CreateGroup.php');

    // If some error occured while uploading the image, don't continue execution
    if($ImagePath == '')
        return;

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    // Grabbing the data
    $dbConnection = DBConnection::getInst()->getConnection();
    $groupOwner = $_SESSION['U_ID'];
    $groupName = mysqli_real_escape_string($dbConnection, $_POST['group_name']);
    $groupPic = $ImagePath;
    $groupDesc = mysqli_real_escape_string($dbConnection, $_POST['group_description']);
    

    if($groupName == '' || $groupPic == '' || $groupDesc == '')
    {
        AlertJS('A field is empty!');
        RedirectJS('../HTML/CreateGroup.php');
        return;
    }


    // Check if a group with the same name & owner already exists
    $query = "SELECT * FROM groups WHERE U_ID=$groupOwner AND GroupName='$groupName'";
    $queryResult = $dbConnection->query($query);

    // If not, add the group to the DB
    if ($queryResult->num_rows == 0) {
        // Create the group
        $currDate = new DateTime();
        $currDate = $currDate->format('Y-m-d');
        group::InsertGroup($groupName,$currDate, $groupPic, $groupDesc, $groupOwner);

        // Add the owner as a member
        $GroupIDQuery = "SELECT Group_ID FROM groups WHERE U_ID=$groupOwner AND GroupName='$groupName'";
        $GIDQueryResult = $dbConnection->query($GroupIDQuery);
        $groupID = mysqli_fetch_assoc($GIDQueryResult);
        $groupID = $groupID['Group_ID'];
        
        group::InsertMember_in($groupOwner, $groupID);

        AlertJS('Group created successfully!\npress OK to go to the home page.');
        // TODO: Redirect the user to their own group 
        RedirectJS('../HTML/Home.php');
    }
    // Otherwise, alert the user and redoirect the user to the home page
    else {
        AlertJS('A group with the same name and owner already exists!');
        RedirectJS('../HTML/CreateGroup.php');
    }
}
