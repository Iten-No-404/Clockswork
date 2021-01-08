<?php

require '../PHP/app.php';
require_once '../PHP/user.php';

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

    <div class="categories">
        <?php
        include_once '../PHP/Categories.php'
        ?>
        <?php
        $cobj = new categories();
        $cobj->deleteemptycategories();
        $cresult = $cobj->getallids();
        if ($cresult->num_rows > 0) {
            // output data of each row
            while ($crow = $cresult->fetch_assoc()) {
                $cvar = $crow["Category_ID"]; ?>
                <a class="catlinks" href="../HTML/Category.php ?id=<?php echo $crow['Category_ID']; ?> ">
                    <div class="col-12">
                        <i class="icon far fa-fw fa-circle"></i>
                        <span class="txt-action idx-27">
                            <?php echo $cobj->getCategoryName($cvar) ?>
                            <?php $cobj->getAppCount($cvar) ?>
                        </span>
                    </div>
                </a>
        <?php }
        } ?>
    </div>

    <div class="appslist">
        <div class="subtitle mt-3">
            <h1>Applications Available</h1>
        </div>
        <div class="container blockapp my-3">


            <div class="row mt-2">
                <?php
                $obj = new App();
                if ($_SESSION['Account_Type'] == ADMIN_ACCOUNT)
                    $result = $obj->GetAllAppIDs();
                else
                    $result = $obj->getallids();
                $x = 0;
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $var = $row["App_ID"];
                        $x++;
                        if ($x % 2 == 0) { ?>

                            <div class="col-lg-1 animate__animated  animate__backInLeft">
                                <a href="../HTML/Application.php ?id=<?php echo $row['App_ID']; ?>">
                                    <?php $obj->getApplication_Picturecircle($var) ?>
                                </a>
                            </div>
                            <div class="col-lg-11 animate__animated  animate__backInRight">
                                <div class="float-lg-right">
                                    <?php $obj->getRating($var);
                                    ?>
                                </div>
                                <a class="catlinks" href="../HTML/Application.php ?id=<?php echo $row['App_ID']; ?>">
                                    <h5><?php $obj->getname($var);
                                        if ($obj->getHide($var) == '1') {
                                            echo " (hidden)";
                                        }
                                        ?></h5>
                                </a>
                                <div>
                                    <H6 class="float-lg-right"> Users: <?php $obj->getNumOfUsers($var)  ?>, Age Rating: <?php $obj->getAgeRating($var)  ?>, Price: <?php $obj->getPrice($var)  ?></H6>
                                    <a href="../HTML/user.php?id=<?php echo $obj->getU_ID($var) ?>">
                                        <h6 style="font-weight: bold;"><?php $x = $obj->getU_ID($var);
                                                                        $userobj = new user($x);
                                                                        $userobj->getUserName($x);
                                                                        ?></h6>
                                    </a>
                                </div>
                            </div>
                            <div class="line my-2">

                            </div>



                        <?php } else { ?>
                            <div class="col-lg-1 animate__animated  animate__backInRight">
                                <a href="../HTML/Application.php ?id=<?php echo $row['App_ID']; ?>">
                                    <?php $obj->getApplication_Picturecircle($var) ?>
                                </a>
                            </div>
                            <div class="col-lg-11 animate__animated  animate__backInLeft">
                                <div class="float-lg-right">
                                    <?php $obj->getRating($var);
                                    ?>
                                </div>
                                <a class="catlinks" href="../HTML/Application.php ?id=<?php echo $row['App_ID']; ?>">
                                    <h5><?php $obj->getname($var);
                                        if ($obj->getHide($var) == '1') {
                                            echo " (hidden)";
                                        } ?></h5>
                                </a>
                                <div>
                                    <H6 class="float-lg-right"> Users: <?php $obj->getNumOfUsers($var)  ?>, Age Rating: <?php $obj->getAgeRating($var)  ?>, Price: <?php $obj->getPrice($var)  ?></H6>
                                    <a href="../HTML/user.php?id=<?php echo $obj->getU_ID($var) ?>">
                                        <h6 style="font-weight: bold;"><?php $x = $obj->getU_ID($var);
                                                                        $userobj = new user($x);
                                                                        $userobj->getUserName($x);
                                                                        ?></h6>
                                    </a>
                                </div>
                            </div>
                            <div class="line my-2">

                            </div>


                <?php }
                    }
                }


                ?>

            </div>








        </div>
    </div>


    <?php include_once "../PHP/footer.php" ?>

</body>

</html>