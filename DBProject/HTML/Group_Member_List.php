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
<?php include_once '../PHP/connection.php' ?>
<?php include_once '../PHP/group.php' ?>
<?php include_once '../PHP/user.php' ?>

<body>
    <div>
        <div class="subtitle">
            <h1>Members</h1>
            <div class="container blockapp my-3">
        </div>

    <div class="container blockapp my-3">
        <?php
            $groupMembers = group::GetAllGroupMembers($_GET['id']);
            while ($currUID = mysqli_fetch_assoc($groupMembers)) 
            {
                $currUser = new user($currUID['U_ID']);
        ?>
        <div class="container my-3">
            <div class="line">
            </div>
            <div class="row">
                <div class="col-lg-1">
                    <a href="../HTML/user.php? id=<?php echo $currUser->U_ID ?>">
                        <?php
                            $currUser->getProfilePicture($currUser->U_ID);
                        ?>
                    </a>
                </div>
                <a class="catlinks" href="user.php ?id=<?php echo $currUser->U_ID?>">
                    <h5><?php echo $currUser->Username ?></h5>
                </a>

        <?php } ?>
</body>

<?php include_once "../PHP/footer.php" ?>
</body>
<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
<script src="../bootstrap/bootstrap.js"></script>

</html>