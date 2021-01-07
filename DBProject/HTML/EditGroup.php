<!DOCTYPE html>
<html lang="en">

<!-- TODO -->
<!-- 
    GROUP_ID (AUTO)
    GroupName
    Date_Created (AUTO)
    Group_picture
    Group_Description
    U_ID (Owner)
    -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../CSS/PublishApp.css">
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
    <title>Create a Group!</title>
</head>
<?php include_once '../PHP/header.php' ?>


<body>
    <h1>Edit Group Info</h1>
    <!-- <H2 style="text-align: center;">Become a Developer!!</H2> -->
    <div style="text-align: center; margin-left: 5%; margin-right: 5%;">
        <form action="../PHP/EditGroup.php? id= <?php echo (int)$_GET['id']; ?>" method="POST" enctype="multipart/form-data">
            <div class="container mt-3 cont1">
                
               <style> .alignright{ text-align: right} </style>
               <p class="alignright">
                    <button class="btn btn-primary" type="submit" id="destroy" name="destroy">Delete Group</button>
                </p>
                <label>Group Name:</label>
                <input type="text" placeholder="Cool name here!" name="GroupN">
                <br>
                <br>

                <label>Group Picture:</label>
                <input type="file" name="GroupP">
                <br>
                <br>
                
                <label>Group Description:</label>
                <br>
                <textarea cols="80" rows="5" placeholder="Describe your group in an appealing way!" name="GroupD"></textarea>
                <br>
                <br>

                <button class="btn btn-primary" type="submit" id="save" name="save">Save</button>
            </div>
        </form>
    </div>

    <?php include_once "../PHP/footer.php" ?>


</body>
<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
<script src="../bootstrap/bootstrap.js"></script>
<script src="../Js/publishapp.js"></script>

</html>