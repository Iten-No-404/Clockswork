<?php
include 'Employee.php';


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['savechangesbtn'])) {
    // Getting the current user's data (before editing)
    $currUserData = new Employee($_GET['id']);

    $Fname = $_POST['fname'];
    $Lname = $_POST['lname'];
    $Bdate = explode("-", $_POST['bdate']);
    $Gender = $_POST['gender'];
    $UnhasedPass = $_POST['password'];
    $Email = $_POST['email'];
    $Address = mysqli_escape_string(DBConnection::getInst()->getConnection(), $_POST['address']);
    $Phone_Number = $_POST['phone'];
    $errorCounter = 0;

    if ($_SESSION['U_ID'] == Employee::getManager()['MIN(Employee_ID)'])
    {
        $salary = $_POST['salary'];
        $dep = $_POST['dep'];
        if ($salary != '' && (!is_numeric($salary) || $salary < 0))
        {
            AlertJS("Invalid Salary!");
            RedirectJS("../HTML/EditEmployeeInfo? id = " . $currUserData->Employee_ID);
        }
        if ($salary == '')
            $salary= $currUserData->Salary;
        if ($dep != "Adminstrator" && $dep != "Support" && $dep != '')
        {
            AlertJS("Invalid Department");
            AlertJS("Departments: Adminstrator, Support ");
            RedirectJS("../HTML/EditEmployeeInfo? id = " . $currUserData->Employee_ID);
        }
        else if ($dep != '')
        {
            if ($dep == "Adminstrator")
                $dep = ADMIN_ACCOUNT;
            else
                $dep = SUPPORT_ACCOUNT;
        }
        if ($dep == '')
            $dep = $currUserData->Account_Type;

    }
    else
    {
        $salary= $currUserData->Salary;
        $dep = $currUserData->Account_Type;
    }


    // If the date isn't in the correct format (yyyy-mm-dd) or no input is give, sets the value to the current (valid?) date
    if (count($Bdate) < 3 || !checkdate($Bdate[1], $Bdate[2], $Bdate[0]) || $Bdate == "") {
        if ($currUserData->Bdate == null || $currUserData->Bdate == "" || $currUserData->Bdate == "0000-00-00")
            $Bdate = NULL;
        else
            $Bdate = $currUserData->Bdate;
        if ($Bdate != "")   // Gives an error only if the data is invalid
            $errorCounter++;
    }
    // If the date is valid, glue it back together
    else {
        $Bdate = implode("-", $Bdate);
        $Bdate = "$Bdate";
    }
    // If the email is invalid or no input is given, sets the variable to the current (valid) email
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL) || $Email == "") {
        $Email = $currUserData->Email;
        if ($Email != "")   // Gives an error only if the data is invalid
            $errorCounter++;
    }
    else
    {
        $db = DBConnection::getInst()->getConnection();
        $query1 = "SELECT * FROM Users WHERE Email = '$Email' LIMIT 1";
        $res1 = $db->query($query1);
        if ($res1->num_rows != 0)
        {
            AlertJS("This email is already in use");
            RedirectJS("../HTML/EditEmployeeInfo? id = " . $currUserData->Employee_ID);
            return;
        }
        $query2 = "SELECT * FROM Employee WHERE Email = $Email LIMIT 1";
        $res2 = $db->query($query1);
        if ($res2->num_rows != 0)
        {
            AlertJS("This email is already in use");
            RedirectJS("../HTML/EditEmployeeInfo? id = " . $currUserData->Employee_ID);
            return;
        }
    }
    
    // Checking if the other fields are empty
    if ($Fname == "") {
        $Fname = $currUserData->Fname;
    }
    if ($Lname == "") {
        $Lname = $currUserData->Lname;
    }
    if ($Gender == "" || ($Gender != 'M' && $Gender != 'F')) {
        if ($currUserData->Gender == null)
            $Gender = null;
        else
            $Gender  = $currUserData->Gender;
    }
    if ($Address == "") {
        $Address = mysqli_escape_string(DBConnection::getInst()->getConnection(), $currUserData->Employee_Address);
    }
    if ($Phone_Number == "") {
        $Phone_Number = $currUserData->Phone;
    }

    // Hashes the password for safe storage
    $HashedPass = password_hash($UnhasedPass, PASSWORD_DEFAULT);
    if ($UnhasedPass == "") {
        $HashedPass = $currUserData->Password;
    }

    $query = "UPDATE Employee SET Gender = '$Gender', Fname = '$Fname', Lname = '$Lname', Bdate = '$Bdate',
     Password = '$HashedPass', Email = '$Email', Employee_Address = '$Address', Phone = '$Phone_Number', Salary = '$salary', Account_Type = '$dep' 
     WHERE Employee_ID = '$currUserData->Employee_ID' ";
    $res = DBConnection::getInst()->getConnection()->query($query);
    RedirectJS("../HTML/Employee.php? id=" . $currUserData->Employee_ID);
}

if (isset($_POST['remove']))
{
    $db = DBConnection::getInst()->getConnection();
    $ID = $_GET['id'];
    $db->query("DELETE FROM Employee WHERE Employee_ID = '$ID'");
    if ($db == true)
        AlertJS("Employee Removed successfully");
    RedirectJS("../HTML/EmployeeList.php");
}