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
    <link rel="stylesheet" type="text/css" href="css/demo.css">
    <link rel="stylesheet" type="text/css" href="css/demo.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="http://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/demo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title><?php $id = $_GET['id'];
            $obj = new App();
            $obj->getname($id);
            echo " - App" ?></title>
</head>
<?php include_once '../PHP/header.php' ?>

<body>
    <div class="container blockapp my-3">
        <div class="container my-5">
            <div class="row">
                <div class="col col-lg-4 mt-3 animate__animated  animate__zoomIn">
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
                        $obj->getRating($id);
                        ?>
                    </p>
                    <a href="../PHP/installapp.php?id=<?php $obj = new App();
                                                        $id = $_GET['id'];
                                                        echo $id; ?>"> <button class="btn btn-primary" type="button" name="install">Install
                        </button></a>
                    <?php if ($_SESSION['Account_Type'] == ADMIN_ACCOUNT) { ?>
                        <a href="../PHP/deleteapp.php?id=<?php $obj = new App();
                                                            $id = $_GET['id'];
                                                            echo $id; ?>"> <button class="btn btn-primary" type="button" id="destroy" name="destroy">Delete</button></a>
                        <a href="../PHP/hideAppAdmin.php?id=<?php $obj = new App();
                                                            $id = $_GET['id'];
                                                            echo $id; ?>"> <button class="btn btn-primary" type="button" id="destroy" name="destroy">Hide</button></a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="container my-3 animate__animated animate__zoomIn">
            <?php $obj = new App();
            $obj->getAppTrailer($_GET['id']);
            ?>
            <!-- <div id="my-carousel" class="carousel slide" data-ride="carousel">
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
            </div> -->
        </div>
        <!-- <a href=""></a> -->
        <div class="container mt-3">
            <h1>Description</h1>
            <p class=" animate__animated animate__slideInDown">
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
            <h1>System Requirements</h1>
            <p>
                <?php
                $obj = new App();
                $id = $_GET['id'];

                $obj->getSystem_Requirements($id); ?>
                <br>
            </p>
        </div>
        <?php if ($_SESSION['Account_Type'] != ADMIN_ACCOUNT && $_SESSION['Account_Type'] != SUPPORT_ACCOUNT) : ?>
        <div class="line"> </div>
        <div>
            <form action="../PHP/addreview.php?id=<?php echo $_GET['id']; ?>" method="post">
                <div class="row">
                    <div class="col-lg-1">
                        <a href="../HTML/user.php?id=<?php echo $_SESSION['U_ID'] ?>">
                            <?php $user = new User($_SESSION['U_ID']);
                            $user->getProfilePicture($_SESSION['U_ID']);
                            ?>
                        </a>
                    </div>
                    <div class="col-lg-11">
                        <textarea name="Review_Description" id="Review_Description" cols="40" rows="5"></textarea>
                        <h6 id="Review"></h6>

                        <br>
                        <label for="">Stars</label>
                        <select id="" name="Stars">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <button class="btn btn-primary" id="review" type="submit" name="submit">Review</button>
                    </div>
                </div>
            </form>
        </div>
        <?php endif; ?>
        <div class="line"> </div>
        <div class="container">
            <h1>Reviews</h1>
            <div class="row mt-2">
                <?php
                $review = new review();

                $id = $_GET['id'];
                $result = $review->getuseridsandreviewids($id);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) { ?>
                        <div class="col-lg-1">
                            <a href="../HTML/user.php?id=<?php echo $row['UserID']; ?>">
                                <?php
                                $user = new user($row['UserID']);
                                $user->getProfilePicture($row['UserID']);
                                ?>
                            </a>
                        </div>
                        <div class="col-lg-11">
                            <a href="../HTML/user.php?id=<?php echo $row['UserID']; ?>">
                                <h6><?php $user = new user($row['UserID']);
                                    $user->getUserName($row['UserID']);
                                    ?></h6>
                            </a>

                            <?php
                            $review->getStars($row["ReviewID"]);
                            ?>
                            <p> <?php $review->getReview_Description($row["ReviewID"]);
                                echo "<br>";
                                $review->getReviewDate($row["ReviewID"]);
                                ?>
                            </p>
                            <?php    
                            
                                   if($_SESSION['U_ID']==$row['UserID'] ||  $_SESSION['Account_Type'])
                                    {?>
                                    
                                      <a href="../PHP/deletereview.php?id=<?php echo $row['ReviewID']; ?>"> <button class="btn btn-danger"  type="button">Delete</button></a>
                                      <a href="editmyreview.php?id=<?php echo $row['ReviewID']; ?>"> <button class="btn btn-dark"  type="button">Edit</button></a>

                                <a href="../PHP/deletereview.php?id=<?php echo $row['ReviewID']; ?>"> <button class="btn btn-danger" type="button">Delete</button></a>
                                <a href="editmyreview.php?id=<?php echo $row['ReviewID']; ?>"> <button class="btn btn-dark" type="button">Edit</button></a>
                            <?php }
                            ?>
                            <br>
                            <?php if ($_SESSION['Account_Type'] != ADMIN_ACCOUNT && $_SESSION['Account_Type'] != SUPPORT_ACCOUNT) : ?>
                            <a href="../PHP/up.php?id=<?php echo $row["ReviewID"];?>"><i class="far fa-thumbs-up"></i></a>
                           <a href="../PHP/down.php?id=<?php echo $row["ReviewID"];?>"><i class="far fa-thumbs-down"></i></a>
                           <?php endif; ?>
                           <br>
                          <?php $review-> selectup($row["ReviewID"]);
                               
                                    $review->selectdown($row["ReviewID"]);
                              ?>

                            $review->selectdown($row["ReviewID"]);
                            ?>
                        </div>
                        <div class="line"></div>
                <?php }
                }
                ?>
            </div>
        </div>
        <br>
    </div>

    <?php include_once "../PHP/footer.php" ?>
</body>

<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
<script src="../bootstrap/bootstrap.js"></script>
<script src="../js/Review.js"></script>

</html>