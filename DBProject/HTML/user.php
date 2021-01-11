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
    <title><?php $shownUser = new user($_GET['id']); if ($shownUser->Username[strlen($shownUser->Username) - 1] != 's') {
                echo $shownUser->Username . "'s Profile";
            } else {
                echo $shownUser->Username . "' Profile"; } ?></title>
</head>

<?php require_once '../PHP/header.php' ?>
<?php require_once '../PHP/Employee.php' ?>

<body>
    <?php
        #$shownUser = new user($_GET['id']);
    ?>

    <?php if ($_SESSION['U_ID'] == $_GET['id']) : ?>
        <h1 class="mt-3">Personal info</h1>
        <div class="container mt-3 cont1">
            <div class="row">
                <div class="col-lg-9">
                    <button class="btn btn-success" id="move"> <a href="../HTML/EditUserInfo.php? id= <?php echo $_SESSION['U_ID'] ?>">Edit Info</a></button>
                </div>
            </div>
        <?php else : ?>
            <?php
            #$shownUser = new user($_GET['id']);
            if ($shownUser->Username[strlen($shownUser->Username) - 1] != 's') {
                echo '<h1 class="mt-3">' . $shownUser->Username . "'s info" . '</h1>';
            } else {
                echo '<h1>' . $shownUser->Username . "' info" . '</h1>';
            }
            ?>
            <div class="container mt-3 cont1">
            <?php endif; ?>
            <?php
            // If the currently viewing user is an administrator
            if ($_SESSION['Account_Type'] == ADMIN_ACCOUNT && $_SESSION['U_ID'] != $_GET['id']) { ?>
                <form action="../PHP/banuser.php?id=<?php echo $_GET['id'] ?>" method="POST">
                    <!-- <div class="row"> -->
                    <div class="col-lg-7">
                        <input type="text" placeholder="Ban end date (YYYY-MM-DD)" name="ban_end_date" id="ban">
                        <button class="btn btn-success" id="ban">Ban</button>
                        <button class="btn btn-success" id="move"> <a href="../HTML/EditUserInfo.php? id= <?php echo $_GET['id']; ?>">Edit Info</a></button>
                    </div>
                    <!-- </div> -->
                </form>
            <?php } ?>
            <div class="row">
                <div class="col-lg-9">
                </div>
            </div>
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
                        #$currUser = new user($_SESSION['U_ID']);
                    ?>
                    <img class="img-fluid rounded-circle" sty src="<?php echo $shownUser->Profile_Picture ?>" alt="">
                </div>
            </div>

            <?php if ($_SESSION['U_ID'] != $_GET['id'] && $shownUser->Hide[0] == 0 && $shownUser->Hide[1] == 0 && $_SESSION['Account_Type'] != SUPPORT_ACCOUNT) : //Don't draw this entire field 
            ?>
            <?php else : ?>

                <div class="line">
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <label for="">
                            <h6>Name</h6>
                        </label>
                    </div>
                    <div class="col-lg-6">
                        <?php
                        if (isset($shownUser->FName)) {
                            if ($shownUser->Hide[0] == 1 || $_SESSION['U_ID'] == $_GET['id'] || $_SESSION['Account_Type'] == SUPPORT_ACCOUNT) {
                                echo $shownUser->FName;
                            }
                        }
                        if (isset($shownUser->LName)) {
                            if ($shownUser->Hide[1] == 1 || $_SESSION['U_ID'] == $_GET['id'] || $_SESSION['Account_Type'] == SUPPORT_ACCOUNT) {
                                echo " " . $shownUser->LName;
                            }
                        }
                        ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($_SESSION['U_ID'] != $_GET['id'] && $shownUser->Hide[4] == 0 && $_SESSION['Account_Type'] != SUPPORT_ACCOUNT) : //Don't draw this entire field 
            ?>
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

            <?php if ($_SESSION['U_ID'] != $_GET['id'] && $shownUser->Hide[5] == 0 && $_SESSION['Account_Type'] != SUPPORT_ACCOUNT) : //Don't draw this entire field 
            ?>
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
                            } else if ($shownUser->Gender == 'F') {
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

            <?php if ($_SESSION['U_ID'] != $_GET['id'] && $shownUser->Hide[2] == 0 && $_SESSION['Account_Type'] != SUPPORT_ACCOUNT) : //Don't draw this entire field 
            ?>
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
                </div>
            <?php endif; ?>

            <div class="line">
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <label for="">
                        <h6> Username </h6>
                    </label>
                </div>
                <div class="col-lg-9">
                    <?php
                    echo $shownUser->Username;
                    if ($shownUser->Ban_End > date('Y-m-d')) {
                        echo " (banned until " . $shownUser->Ban_End . ")";
                    }
                    ?>
                </div>
            </div>

            <?php if ($_SESSION['U_ID'] != $_GET['id'] && $shownUser->Hide[3] == 0 && $_SESSION['Account_Type'] != SUPPORT_ACCOUNT) : //Don't draw this entire field 
            ?>
            <?php else : ?>
                <div class="line">
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <label for="">
                            <h6> Address </h6>
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

            <?php if ($_SESSION['U_ID'] != $_GET['id'] && $shownUser->Hide[2] == 0 && $_SESSION['Account_Type'] != SUPPORT_ACCOUNT) : //Don't draw this entire field 
            ?>
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
                        if ($shownUser->Phone_Number != '0')
                            echo $shownUser->Phone_Number;
                        ?>
                    </div>
                </div>
            <?php endif; ?>



            <?php if ($_SESSION['U_ID'] != $_GET['id'] && $_SESSION['Account_Type'] != SUPPORT_ACCOUNT) : //Don't draw this entire field 
            ?>
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
                        if (isset($shownUser->Balance)) {
                            echo "$shownUser->Balance";
                        }
                        ?>
                     <form action="../PHP/AddBalance.php? id=<?php echo $_GET['id'] ?>" method="POST">  
                     <button class="btn btn-primary" type="submit" id="move1" name="AddBalance">Add Balance</button>
                    </form>
                    </div>
                </div>
            <?php endif; ?>

            <div class="line">
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <label for="">
                        <h6>Account Type</h6>
                    </label>
                </div>
                <div class="col-lg-9">
                    <?php
                    if (isset($shownUser->Account_Type)) {
                        if ($shownUser->Account_Type == USER_ACCOUNT) {
                            echo "User";
                        } else if ($shownUser->Account_Type == DEV_ACCOUNT) {
                            echo "Developer";
                           
                        } else if ($shownUser->Account_Type == ADMIN_ACCOUNT) {
                            echo "Administrator";
                        } else if ($shownUser->Account_Type == SUPPORT_ACCOUNT) {
                            echo "Support";
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