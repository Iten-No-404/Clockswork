<?php include('../PHP/user.php'); ?>
<!DOCTYPE html>
<html lang="en">

<!-- TODO: Check if the user is logged in. If not, alert and redirect to login page -->

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

<body>
    <?php
        $shownUser = new user($_GET['id']);
    ?>
    <?php if ($_SESSION['U_ID'] == $_GET['id']) : ?>
    <h1>Personal info</h1>
    <div class="container mt-3 cont1">
        <div class="row">
            <div class="col-lg-9">
                <button class="btn btn-success" id="move"> <a href="../HTML/EditUserInfo.php? id= <?php echo $_SESSION['U_ID'] ?>">Edit Info</a></button>
            </div>
        </div>
    <?php else : ?>
    <?php 
        $shownUser = new user($_GET['id']);
        if ($shownUser->Username[strlen($shownUser->Username) - 1] != 's')
        {
            echo '<h1>' . $shownUser->Username . "'s info" . '</h1>';
        }
        else
        {
            echo '<h1>' . $shownUser->Username . "' info" . '</h1>';
        }
    ?>
    <div class="container mt-3 cont1">
        <div class="row">
            <div class="col-lg-9">
            </div>
        </div>
    <?php endif; ?>
        <div class="row">
            <div class="col-lg-3">
                <label for="">
                    <h6>Profile Picture</h6>
                </label>
            </div>
            <div class="col-lg-9">
                <?php
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $currUser = new user($_SESSION['U_ID']);
                ?>
                <img class="img-fluid rounded-circle" sty src="<?php echo $shownUser->Profile_Picture ?>" alt="">
            </div>
        </div>

        <?php if ($_SESSION['U_ID'] != $_GET['id'] && $shownUser->Hide[0] == 0 && $shownUser->Hide[1] == 0) : //Don't draw this entire field ?>
        <?php else : ?>

        <div class="line">
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">
                    <h6>Name</h6>
                </label>
            </div>
            <div class="col-lg-9">
                <?php
                if (isset($shownUser->FName))
                {
                    if ($shownUser->Hide[0] == 1 || $_SESSION['U_ID'] == $_GET['id'])
                    {
                    echo $shownUser->FName;
                    }
                }
                if (isset($shownUser->LName))
                {
                    if ($shownUser->Hide[1] == 1 || $_SESSION['U_ID'] == $_GET['id'])
                    {
                    echo " " . $shownUser->LName;
                    }
                }
                ?>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($_SESSION['U_ID'] != $_GET['id'] && $shownUser->Hide[4] == 0) : //Don't draw this entire field ?>
        <?php else : ?>       

        <div class="line">
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">
                    <h6> Brithday</h6>
                </label>
            </div>
            <div class="col-lg-9">

                <?php if (isset($shownUser->Bdate)) {
                    echo $shownUser->Bdate;
                } ?>

            </div>
        </div>
        <?php endif; ?>

        <?php if ($_SESSION['U_ID'] != $_GET['id'] && $shownUser->Hide[5] == 0) : //Don't draw this entire field ?>
        <?php else : ?>      
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
                if (isset($shownUser->Gender)) {
                    if ($shownUser->Gender == 'M') {
                        echo "Male";
                    }
                    else
                    {
                        echo "Female";
                    }
                }
                ?>
            </div>
        </div>
        <?php endif; ?>
        <!--<div class="line"> 
        </div> -->
        <!-- Disabled for now as it serves no purpose -->
        <!-- <div class="row">
            <div class="col-lg-3">
                <label for="">
                    <h6> Password</h6>
                </label>
            </div>
            <div class="col-lg-9">
                <i class="fas fa-circle"></i>
                <i class="fas fa-circle"></i>
                <i class="fas fa-circle"></i>
                <i class="fas fa-circle"></i>
            </div>

        </div> -->

        <?php if ($_SESSION['U_ID'] != $_GET['id'] && $shownUser->Hide[2] == 0) : //Don't draw this entire field ?>
        <?php else : ?>      

        <div class="line">
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">
                    <h6>Email</h6>
                </label>
            </div>
            <div class="col-lg-9">
                <?php
                echo $shownUser->Email;
                ?>
            </div>
        <?php endif; ?>
        </div>

        <div class="line">
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">
                    <h6> Username</h6>
                </label>
            </div>
            <div class="col-lg-9">
                <?php
                echo $shownUser->Username;
                ?>
            </div>

        <?php if ($_SESSION['U_ID'] != $_GET['id'] && $shownUser->Hide[3] == 0) : //Don't draw this entire field ?>
        <?php else : ?>      
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
                <?php
                if (isset($shownUser->Address)) {
                    echo $shownUser->Address;
                }
                ?>
            </div>
        </div>
        <?php endif; ?>

        <?php if ($_SESSION['U_ID'] != $_GET['id'] && $shownUser->Hide[2] == 0) : //Don't draw this entire field ?>
        <?php else : ?>      

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
                echo $shownUser->Phone_Number;
                ?>
            </div>
        </div>
        <?php endif; ?>

        

        <?php if ($_SESSION['U_ID'] != $_GET['id']) : //Don't draw this entire field ?>
        <?php else : ?>  
        <div class="line">
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">
                    <h6>Wallet</h6>
                </label>
            </div>
            <div class="col-lg-9">
                <?php
                if (isset($currUser->Balance)) {
                    echo "$currUser->Balance";
                }
                ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="line">
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">
                    <h6>Type of User</h6> 
                </label>
            </div>
            <div class="col-lg-9">
                <?php
                if (isset($currUser->Developer)) {
                    if ($currUser->Developer == '0')
                    {
                        echo "User";
                    } 
                    else
                    {
                        echo "Developer";
                    }
                }
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