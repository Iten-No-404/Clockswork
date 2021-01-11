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
    <h1>Personal info</h1>
    <div class="container mt-3 cont1">


        <?php $shownEmp = new Employee($_GET['id']); ?>
        <div class="col-lg-9">
                    <button class="btn btn-dark" id="move"> <a href="../HTML/EditEmployeeInfo.php? id= <?php echo $_GET['id'] ?>">Edit Info</a></button>
                </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">
                    <h6>Name</h6>
                </label>
            </div>
            <div class="col-lg-9">
                <?php echo "$shownEmp->Fname" . " $shownEmp->Lname"; ?>
        </div>

        </div>
        <div class="line">

        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">
                    <h6> Brithday</h6>
                </label>
            </div>
            <div class="col-lg-9">

                <?php echo "$shownEmp->Bdate" ?>

            </div>

        </div>
        <div class="line">

        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">
                    <h6> Gender</h6>
                </label>
            </div>
            <div class="col-lg-9">
            <?php
                if ($shownEmp->Gender == 'M')
                    echo "Male";
                else
                    echo "Female";
            ?>
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
            <?php
                echo $shownEmp->Phone;
            ?>
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
            <?php echo "$shownEmp->Email" ?>
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
            <?php echo "$shownEmp->Employee_Address" ?>
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
            <?php echo "$shownEmp->Salary" ?>
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
            <?php
                if ($shownEmp->Account_Type == ADMIN_ACCOUNT)
                    echo "Administrator";
                else 
                    echo "Support";
            ?>
            </div>

        </div>


    </div>
    <?php include_once "../PHP/footer.php" ?>


</body>
<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
<script src="../bootstrap/bootstrap.js"></script>

</html>