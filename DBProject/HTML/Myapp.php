<?php

require '../PHP/app.php'

?>

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
    <title>Browse</title>
</head>

<?php include_once '../PHP/header.php' ?>


<body>

    <div class="appslist">
        <div class="subtitle">
            <h1>My Apps</h1>
        </div>
        <div class="container blockapp my-3">
            <div class="row mt-1">
                <?php
                $obj = new App();
                $UserID=(int)$_SESSION['U_ID'];
        
                $result = $obj->getmyapps($UserID);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $var = $row["App_ID"]; ?>
                        <div class="col-lg-1">
                            <a href="../HTML/Application.php ?id=<?php echo $row['App_ID']; ?>">
                                <?php $obj->getApplication_Picturecircle($var) ?>
                            </a>
                        </div>
                        <div class="col-lg-11">
                            <div class="float-lg-right">
                                <?php $obj->getRating($var);
                                ?>
                            </div>
                            <a class="catlinks" href="../HTML/Application.php ?id=<?php echo $row['App_ID']; ?>">
                                <h5><?php $obj->getname($var) ?></h5>
                            </a>
                            <div>
                                <H6 class="float-lg-right"> Users: <?php $obj->getNumOfUsers($var)  ?>, Age Rating: <?php $obj->getAgeRating($var)  ?>, Price: <?php $obj->getPrice($var)  ?></H6>
                                <a href="Developerapps.php?id=<?php echo  $row['App_ID'];?>"><button class="btn btn-primary" type="button" name="Edit">Edit</button></a>
                                <a href="../PHP/deleteapp.php?id=<?php echo  $row['App_ID'];?>"><button class="btn btn-primary" type="button" name="Delete">Delete</button></a>
                            </div>
                        </div>
                        <div class="line my-2">
                        </div>
                <?php }
                }
                ?>
            </div>
        </div>
    </div>
    <?php include_once "../PHP/footer.php" ?>
</body>

</html>