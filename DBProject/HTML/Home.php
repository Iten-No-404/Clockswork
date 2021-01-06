<!-- TODO: 
    Run "Home.php" on page load so it check for session.
    Load Apps from the database and display them instead of the current static layout.
 -->
 <?php
require '../PHP/app.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../CSS/Home.css">
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
    <title>Document</title>
</head>
<?php include_once '../PHP/header.php' ?>


<body>

<?php
    $textcounter = 0;
    $textarray = array(' Best Entertainment apps ',' Popular Apps & Games', 'Recommended For You', 'Take a look At These');
    $count = 0; 
    $obj = new App();
    $result = $obj->getallids();
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc() and $textcounter<4) {
            $var = $row["App_ID"]; 
            if($count%6==0)  {?>
    <div class="container-fluid mt-3" style="height: 10%; width: 100%;">
        <div class="head">
            <h4> <?php echo $textarray[$textcounter]; ?> </h4>
            <a href="../HTML/Browse.php">
            <button class="btn btn-primary btn1" style="width: 100px;" type="button">See More</button>
            </a>
        </div>
        <div class="row mt-3">
        <?php } ?>
            <div class="col-lg-2 mb-3">
                <div class="card">
                <a href="../HTML/Application.php ?id=<?php echo $var; ?>">
                    <?php echo $obj->getApplication_Pictureformain($var); ?>
                </a>
                    <div class="card-body">
                        <div class="appname">
                        <a href="../HTML/Application.php ?id=<?php echo $var; ?>">
                            <h5 class="card-title"><?php $obj->getname($var) ?></h5>
                            </a>
                            <a href="../PHP/installapp.php?id=<?php echo $var; ?>">   
                            <button class="btn btn-primary" type="button" name="install">Install</button></a>
                        </div>
                        <?php $obj->getRating($var); ?>
                    </div>
                </div>
            </div>
            <?php if($count%6==5) { ?>
        </div>
    </div> 
    <br> <?php $textcounter++; } ?>
    <?php $count++; } } ?>

        <?php include_once "../PHP/footer.php" ?>
</body>
<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
<script src="../bootstrap/bootstrap.js"></script>

</html>