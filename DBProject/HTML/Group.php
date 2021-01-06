<?php require_once '../PHP/Group.php';
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../CSS/Group.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="http://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/demo.css">
    <link rel="stylesheet" type="text/css" href="css/demo.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="http://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/demo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="../CSS/Footer.css">
    <title>Document</title>
</head>
<?php include_once '../PHP/header.php' ?>

<body>

    <div class="container mb-2 ">
       <?php $id=$_GET['id'];
          $obj=new GRoup($id);?>
          <img class="img-fluid"  width="100%"src="<?php $obj->getGroupPicture2($id);?>" alt="">
          <?php
       ?>
       
        <div class="grouptitleborder mt-3">
          <?php $id=$_GET['id'];
                $obj=new GRoup($id);
                  ?>  <H1><?php $obj->getGroupName($id);?></H1>
                    <H6><?php $obj->GetNumMembers($id);?></H6>
                    <h6><?php $obj->getGroupDescription($id);?></h6>
           
        </div>
    </div>

    <div class="line"></div>
    <div class="container my-3">
        <div class="row">
            <div class="col-lg-1">
                <img class="img-fluid rounded-circle"
                    src="../IMAGES/118111837_1032480850503383_8251734100101419473_n.jpg" alt="">


            </div>
            <div class="col-lg-11 posts" onclick="display()">

                <h5 class="mt-2">What is on Your mind,Radwa?</h5>

            </div>
        </div>

    </div>

    <div class="line"></div>
    <div class="container my-5 cla10">
        <div class="row">
            <div class="col-lg-1">
                <img class="img-fluid rounded-circle"
                    src="../IMAGES/118111837_1032480850503383_8251734100101419473_n.jpg" alt="">


            </div>
            <div class="col-lg-11">
                <textarea name="" id="" cols="80" rows="5"></textarea>
                <br>
                <div style="display: flex;">
                    <button class="btn btn-light" type="button">Post</button>

                    <input id="my-input" class="form-control-file" type="file" name="">
                    <span onclick="hide()">&times;</span>

                </div>
            </div>






        </div>
    </div>

    <div class="container my-3">

        <div class="row mt-2">
            <div class="col-lg-1">
                <img class="img-fluid rounded-circle"
                    src="../IMAGES/118111837_1032480850503383_8251734100101419473_n.jpg" alt="">


            </div>

            <div class="col-lg-11">
                <h6>Radwa Ahmed</h6>

                <p>I love the game, I have been playing for months now. But the direction it is taking could make me to
                    stop playing. Since the start of season 12, performance has been disregarded and it has become more
                    about features and looks. I cannot enjoy the beauty of the game if it cannot perform what it
                    intend...</p>

            </div>


        </div>
    </div>
    <div class="line"></div>
    <div class="container my-3">

        <div class="row mt-2">
            <div class="col-lg-1">
                <img class="img-fluid rounded-circle"
                    src="../IMAGES/118111837_1032480850503383_8251734100101419473_n.jpg" alt="">


            </div>

            <div class="col-lg-11">
                <h6>Radwa Ahmed</h6>


                <p>I love the game, I have been playing for months now. But the direction it is taking could make me to
                    stop playing. Since the start of season 12, performance has been disregarded and it has become more
                    about features and looks. I cannot enjoy the beauty of the game if it cannot perform what it
                    intend...</p>
                <img class="img" src="../IMAGES/pp.webp" alt="">
            </div>


        </div>
    </div>
    <!-- <div class="conatiner my-3">
        <div class="row mt-2">
            <div class="col-lg-1">
                <img class="img-fluid rounded-circle" src="../IMAGES/118111837_1032480850503383_8251734100101419473_n.jpg" alt="">
                

            </div>
            <div class="col-lg-11">
                <h6>Radwa Ahmed</h6>
                <p>I love the game, I hav been playing for months now. But the direction </p>
                < -->


    <div class="line"></div>
    
    <?php include_once "../PHP/footer.php" ?>
                
</body>
<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
<script src="../bootstrap/bootstrap.js"></script>
<script src="../JS/jav.js"></script>

</html>