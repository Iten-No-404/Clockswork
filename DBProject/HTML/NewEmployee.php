<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../CSS/EmployeeSignup.css">
    <title>New Employee</title>

</head>
<?php include_once '../PHP/header.php' ?>


<body>

    <div class="container-fluid">

        <div class="row">
            <form action="../PHP/SignupEmployee.php" id="" method="POST">
                <div class="form">

                    <label><h6>Emai</h6></label>
                    <input type="email" placeholder="Example@gmail.com" id="email" name="email">
                        <h6 id="h_email"></h6>

                    <label><h6>Phone</h6></label>   
                    <input type="tel" placeholder="" id="Phone" name="Phone">
                        <h6 id="h_name"></h6>

                    <label><h6>Department</h6></label>   
                    <input type="text" placeholder="Adminstrator or Support" id="Dep" name="Dep">
                        <h6 id="h_name"></h6>

                    <label><h6>Salary</h6></label>
                    <input type="text" placeholder="" id="salary" name="salary">
                        <h6 id="h_email"></h6>

                    <label><h6>Passowrd</h6></label>   
                    <input type="password" placeholder="" id="Pass_1" name="Pass_1">
                        <h6 id="h_name"></h6>

                    <label><h6>Confirm Password</h6></label>   
                    <input type="password" placeholder="" id="Pass_2" name="Pass_2">
                        <h6 id="h_name"></h6>

                    <br>
                    <button class="btn btn-primary" type="submit" id="submit" name="submit">Sign Up</button>
                    
                </div>
            </form>
        </div>

    </div>



</body>

<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
<script src="../bootstrap/bootstrap.js"></script>

</html>
