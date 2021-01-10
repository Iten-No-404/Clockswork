<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../CSS/About.css">
    <link rel="stylesheet" href="../CSS/Browse.css">
    <link rel="stylesheet" href="../CSS/Footer.css">
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
    <title>Groups</title>
</head>

<?php include_once '../PHP/header.php' ?>
<?php include_once '../PHP/Employee.php' ?>

<body>
    <div>
        <div class="subtitle">
            <h1>Employees</h1>
            <div class="container blockapp my-3">
        </div>

    <div class="container blockapp my-3">
        <?php
            $Employees = Employee::getAllEmployees();
            while ($currEMPID = mysqli_fetch_assoc($Employees)) 
            {
                $currEmp = new Employee($currEMPID['Employee_ID']);
        ?>
        <div class="container my-3">
            <div class="line">
            </div>
            <div class="float-lg-right">
                <?php
                    if ($currEmp->Account_Type == SUPPORT_ACCOUNT) : 
                ?>
                <h6> Department : Support </h6>
                <?php else :?>
                <h6> Department : Adminstration  </h6>
                <?php endif; ?>
            </div>
            <div class="row">
                <a class="catlinks" href="../HTML/Employee.php ?id=<?php echo $currEmp->Employee_ID?>">
                <?php if ($currEmp->Fname != null && $currEmp->Lname != null) : ?>
                    <H6><?php echo $currEmp->Fname . " " . $currEmp->Lname ?></H6>
                <?php else :?>
                    <H6>New Employee</H6>
                <?php endif; ?>
                </a>
            </div>
            
        <?php } ?>
</body>

<?php include_once "../PHP/footer.php" ?>
</body>
<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
<script src="../bootstrap/bootstrap.js"></script>

</html>