<?php

require '../PHP/app.php';
require_once '../PHP/review.php';
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
    <title>edit review</title>
</head>

<?php include_once '../PHP/header.php' ?>


<body>
   <div class="container my-3">
      <div class="row">
       
 
                <form action="../PHP/editreview.php?id=<?php echo (int)$_GET['id'];?>" method="POST">

                <div class="col-lg-12">
                    <textarea name="Review_Description" id="Review_Description" cols="40" rows="5"> <?php  $review=new Review(); $id=(int)$_GET['id']; $review->getReview_Description($id); ?></textarea>
                    <h6 id="Review"></h6>

                   </div>
                   <div class="col-lg-12">
                    <label for="">Stars</label>
                        <?php if($review->getStarscount($id)==1) { ?>
                            <select id="" name="Stars">
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                            </select> 
                                    <?php } else if($review->getStarscount($id)==2) { ?>
                                        <select id="" name="Stars">
                                    <option value="1">1</option>
                                    <option value="2" selected>2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    </select> 
                                    <?php } else if($review->getStarscount($id)==3) { ?>
                                        <select id="" name="Stars">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3" selected>3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    </select> 
                                    <?php } else if($review->getStarscount($id)==4) { ?>
                                        <select id="" name="Stars">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4" selected>4</option>
                                    <option value="5">5</option>
                                    </select> 
                                    <?php } else { ?>
                                        <select id="" name="Stars">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5" selected>5</option>
                                    </select> 
                                    <?php } ?>
                        
                           <button class="btn btn-primary" id="review"  type="submit" name="submit">Edit</button></a>
       
                   </div>
                </form>
                   
      </div>
    </div>
   
 

    <?php include_once "../PHP/footer.php" ?>
    
<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
<script src="../bootstrap/bootstrap.js"></script>
    <!-- <script src="../js/Review.js"></script> -->


</body>

</html>