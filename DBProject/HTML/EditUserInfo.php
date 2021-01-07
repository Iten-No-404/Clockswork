<?php include('../PHP/user.php'); ?>
<!DOCTYPE html>
<html lang="en">

<!-- TODO: Check if the user is logged in. If not, alert and redirect to login page -->
<!-- TODO: add a field to update the phone number -->

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

<?php $shownUser = new user($_GET['id']);  ?>

<body>
    <h1>Editing personal info</h1>
    <form id="savechanges" action="../PHP/editUserInfo.php" method="post" enctype="multipart/form-data">
        <div class="container mt-3 cont1">
            <!-- <form id="uploadfile" method="post" enctype="multipart/form-data"></form> -->

            <div class="row">
                <div class="col-lg-9">
                    <button class="btn btn-primary" type="submit" id="move" name="savechangesbtn">Save changes</button>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <label for="">
                        <h6>Profile Picture</h6>
                    </label>
                </div>
                <div class="col-lg-9">
                    <div>
                        Select image to upload:
                        <br>
                        <input type="file" id="userpicture" name="userpicture">
                        <!-- <br>
                    <br>
                    <input type="submit" value="Upload Image" name="uploadImage" form="uploadfile"> -->
                    </div>
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

            <div style="text-align:right; width:100%; padding:0;">
                <input type="checkbox" id="myCheck" name="FNameCB" value="FNameChkBox" <?php if ($shownUser->Hide[0] == 0) : ?> checked <?php endif; ?>>
                <label for="FName">Hide</label><br>
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

            <div style="text-align:right; width:100%; padding:0;">
                <input type="checkbox" id="myCheck" name="LNameCB" value="FNameChkBox" <?php if ($shownUser->Hide[1] == 0) : ?> checked <?php endif; ?>>
                <label for="LName">Hide</label><br>
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

            <div style="text-align:right; width:100%; padding:0;">
                <input type="checkbox" id="myCheck" name="BDateCB" value="FNameChkBox" <?php if ($shownUser->Hide[4] == 0) : ?> checked <?php endif; ?>>
                <label for="BDate">Hide</label><br>
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

            <div style="text-align:right; width:100%; padding:0;">
                <input type="checkbox" id="myCheck" name="GenderCB" value="FNameChkBox" <?php if ($shownUser->Hide[5] == 0) : ?> checked <?php endif; ?>>
                <label for="Gender">Hide</label><br>
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
                    <input type="Password" placeholder="Definitely not 'Password'" id="password" name="password">

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
                    <input type="Email" placeholder="Email@SomeDomain.com" id="email" name="email">

                </div>

            </div>

            <div style="text-align:right; width:100%; padding:0;">
                <input type="checkbox" id="myCheck" name="EmailCB" value="FNameChkBox" <?php if ($shownUser->Hide[2] == 0) : ?> checked <?php endif; ?>>
                <label for="Email">Hide</label><br>
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
                    <input type="Username" placeholder="WackyWohooPizzaMan" id="username" name="username">
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
                    <input type="lname" placeholder="01023456789" id="phone" name="phone">
                </div>
            </div>

            <div style="text-align:right; width:100%; padding:0;">
                <input type="checkbox" id="myCheck" name="PhoneCB" value="FNameChkBox" <?php if ($shownUser->Hide[6] == 0) : ?> checked <?php endif; ?>>
                <label for="Phone">Hide</label><br>
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
                    <input type="Address" placeholder="Some place. some country" id="address" name="address">

                </div>

            </div>

            <div style="text-align:right; width:100%; padding:0;">
                <input type="checkbox" id="myCheck" name="AddressCB" value="FNameChkBox" <?php if ($shownUser->Hide[3] == 0) : ?> checked <?php endif; ?>>
                <label for="Address">Hide</label><br>
            </div>
    </form>

    <?php include_once "../PHP/footer.php" ?>


</body>
<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
<script src="../bootstrap/bootstrap.js"></script>

</html>