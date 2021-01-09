<?php include('../PHP/Employee.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="http://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/demo.css">
    <link rel="stylesheet" type="text/css" href="css/demo.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="http://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/demo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../CSS/user.css">
    <title>Document</title>
</head>
<?php include_once '../PHP/header.php' ?>
<?php include_once '../PHP/Employee.php' ?>

<body>
    <h1>Editing personal info</h1>
    <form id="savechanges" action="../PHP/EditEmployeeInfo.php? id= <?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
        <div class="container mt-3 cont1">
            <!-- <form id="uploadfile" method="post" enctype="multipart/form-data"></form> -->

            <div class="row">
                <div class="col-lg-7">
                    <button class="btn btn-primary" type="submit" id="move" name="savechangesbtn">Save changes</button>
                    <?php if($_GET['id'] != Employee::getManager()['MIN(Employee_ID)'] && $_SESSION['U_ID'] == Employee::getManager()['MIN(Employee_ID)']) : ?>
                    <button class="btn btn-danger" type="submit" id="move" name="remove">Remove Employee</button>
                    <?php endif; ?>
                </div>
               
                
            </div>

            <div class="line">
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <label for="">
                        <h6>First Name</h6>
                    </label>
                </div>
                <div class="col-lg-9">
                    <input type="fname" placeholder="FirstName" id="fname" name="fname">
                </div>
            </div>

            <div class="line">
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <label for="">

                        <h6>Last Name</h6>
                    </label>
                </div>
                <div class="col-lg-9">
                    <input type="lname" placeholder="LastName" id="lname" name="lname">
                </div>
            </div>

            <div class="line">
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <label for="">
                        <h6>Birthday</h6>
                    </label>
                </div>
                <div class="col-lg-9">

                    <input type="birthdate" placeholder="yyyy-mm-dd" id="bdate" name="bdate">

                </div>
            </div>

            <div class="line">
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <label for="">
                        <h6>Gender</h6>
                    </label>
                </div>
                <div class="col-lg-9">
                    <input type="Gender" placeholder="M or F" id="gender" name="gender">
                </div>
            </div>

            <div class="line">

            </div>
            <!-- Disabled for now as it serves no purpose -->
            <div class="row">
                <div class="col-lg-3">
                    <label for="">
                        <h6>Password</h6>
                    </label>
                </div>
                <div class="col-lg-9">
                    <input type="Password" placeholder="" id="password" name="password">

                </div>

            </div>
            <div class="line">

            </div>
            <div class="row">
                <div class="col-lg-3">
                    <label for="">
                        <h6>Email</h6>
                    </label>
                </div>
                <div class="col-lg-9">
                    <input type="Email" placeholder="" id="email" name="email">

                </div>

            </div>

            <div class="line">
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <label for="">
                        <h6>Phone Number</h6>
                    </label>
                </div>
                <div class="col-lg-9">
                    <input type="tel" placeholder="" id="phone" name="phone">
                </div>
            </div>

            <div class="line">
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <label for="">
                        <h6>Salary</h6>
                    </label>
                </div>
                <div class="col-lg-9">
                    <input type="text" placeholder="" id="salary" name="salary">
                </div>
            </div>

            <div class="line">
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <label for="">
                        <h6>Department</h6>
                    </label>
                </div>
                <div class="col-lg-9">
                    <input type="text" placeholder="Adminstrator or Support" id="dep" name="dep">
                </div>
            </div>


            <div class="line">
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <label for="">
                        <h6>Address</h6>
                    </label>
                </div>
                <div class="col-lg-9">
                    <input type="Address" placeholder="" id="address" name="address">

                </div>

            </div>

    </form>

    <?php include_once "../PHP/footer.php" ?>


</body>
<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
<script src="../bootstrap/bootstrap.js"></script>

</html>