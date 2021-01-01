<?php

require '../PHP/app.php';
require '../PHP/review.php';
require '../PHP/user.php';
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../CSS/app.css">
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
</head>
<?php include_once '../PHP/header.php' ?>

<body>

    <div class="container blockapp my-3">
        <div class="container my-5">
            <div class="row">
                <div class="col col-lg-4 mt-3">

                    <?php
                    $obj = new App();
                    $id = $_GET['id'];

                    $obj->getApplication_Picture($id); 

                     ?>

                </div>
                <div class="col col-lg-8 mt-3">
                    <h1> <?php
                            $obj = new App();
                            $id = $_GET['id'];

                            $obj->getname($id);  ?></h1>
                    <h6><?php
                        $obj = new App();
                        $id = $_GET['id'];
                        $obj->getNumOfUsers($id);

                        ?> Nums of users
                    </h6>
                    <p>
                        <?php
                        $obj = new App();
                        $id = $_GET['id'];

                        $obj->getPrice($id);
                        echo "<br>";
                        $obj-> getAgeRating($id);
                     
                        ?>

                        <br>
                    </p>

                    <?php
                    $obj = new App();
                    $id = $_GET['id'];
                    $obj->getRating($id);
                    ?>
                    <br><br>
                    <button class="btn btn-primary" type="button"><?php
                                                                    $obj = new App();
                                                                    $id = $_GET['id'];
                                                                    $obj->getApplication_Link($id);
                                                                    ?>
                    </button>

                </div>
            </div>
        </div>
        <div class="container my-3">
            <div id="my-carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li class="active" data-target="#my-carousel" data-slide-to="0" aria-current="location"></li>
                    <li data-target="#my-carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="../IMAGES/unnamed.webp" alt="">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../IMAGES/unnamed (1).webp" alt="">
                        <div class="carousel-caption d-none d-md-block">

                        </div>
                    </div>

                </div>
                <a class="carousel-control-prev" href="#my-carousel" data-slide="prev" role="button">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#my-carousel" data-slide="next" role="button">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <a href=""></a>
        <div class="container mt-3">
            <h1>Description</h1>
            <p>
                <?php
                $obj = new App();
                $id = $_GET['id'];

                $obj->getAppDescription($id); ?>
                <br>
                <?php
                $obj->getRelease_Date($id);
                ?>



            </p>
        </div>
        <div class="line"> </div>
        <div class="container mt-3">
            <h1>System_Requirements</h1>
            <p>
                <?php
                $obj = new App();
                $id = $_GET['id'];

                $obj->getSystem_Requirements($id); ?>
                <br>




            </p>
        </div>
        <div class="line"> </div>

        <div class="container">
            <h1>Reviews</h1>
            <div class="row mt-2">
              <?php
                    $review=new review();
                   
                    $id = $_GET['id'];
                   $result= $review->getuseridsandreviewids($id);    
                   if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {?>
                           <div class="col-lg-1">
                    <a href="../HTML/user.php?id=<?php echo $row['UserID']; ?>">
                      <?php  $user=new user($row[" UserID"]);
                            $user->getProfilePicture($row[" UserID"]);
                                ?>
                    </a>

                </div>
                <div class="col-lg-11">
                    <a href="../HTML/user.php?id=<?php echo $row['UserID']; ?>">
                        <h6><?php   $user=new user($row[" UserID"]);
                         $user->getUserName($row[" UserID"]); 
                         $user->getFName($row[" UserID"]);
                         ?></h6>
                    </a>

                    <?php
                      $review-> getStars($row["ReviewID"]);
                               ?>
                    <p> <?php    $review-> getReview_Description($row["ReviewID"]);  ?></p>
                    <?php    $review->getReviewDate($row["ReviewID"]);   ?>

                </div>
                <div class="line"></div>
              


                   <?php }
                  }
                         
                         
                         ?>
              
            </div>
        </div>
        <div>
          <form action="../PHP/addreview.php?id=<?php echo $_GET['id'];?>" method="post">
                <textarea name="Review_Description" id="" cols="40" rows="5">
                    
                </textarea>
                <br>
                <label for="">Stars</label>
                <select id="" name="Stars">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                    </select> 
                <br>
                <button class="btn btn-primary" type="submit" name="submit">Review</button>
          </form>
        </div>
       <br>
    </div>
    <?php include_once "../PHP/footer.php" ?>
</body>

<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
<script src="../bootstrap/bootstrap.js"></script>

</html>