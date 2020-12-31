<?php

require '../PHP/app.php'

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
     <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
        <a class="navbar-brand" href="../HTML/Home.html">Clockwork</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../HTML/Browse.html">Browse</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../HTML/Groups_List.html">Groups</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../HTML/PublishApp.html">Publish </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../HTML/supportticket.html">Support</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../HTML/About.html">About</a>
                </li>

            </ul>
        </div>
    </nav>

    </nav>
</header>

<body>
    
    <div class="container blockapp my-3">
        <div class="container my-5">
            <div class="row">
                <div class="col col-lg-4 mt-3">
                    <img class="img-fluid" src="../IMAGES/call.jpg" alt="">

                </div>
                <div class="col col-lg-8 mt-3">
                    <h1>  <?php 
                   $obj=new App();
                   $id=3;
               
                  $obj->getname($id );
                  
              
                        
                       
                                     ?></h1>
                    <h6>Activision Publishing, Inc. Action</h6>
                    <p>Contains Ads·Offers in-app purchases
                        <br> This app is compatible with all of your devices.
                    </p>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <br><br>
                    <button class="btn btn-primary" type="button">install</button>

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

        <div class="container mt-3">
            <h1>Description</h1>
            <p>
              <?php
                $obj=new App();
                $id=3;
            
               $obj-> getAppDescription($id);
              ?>
                  


            </p>
        </div>
        <div class="line"> </div>
      
        <div class="container">
            <h1>Reviews</h1>
            <div class="row mt-2">
                
                <div class="col-lg-1">
                    <a href="../HTML/user.html">
                        <img class="img-fluid rounded-circle" src="../IMAGES/118111837_1032480850503383_8251734100101419473_n.jpg" alt="">
                    </a>                    

                </div>
                <div class="col-lg-11">
                    <a href="../HTML/user.html">
                    <h6>Radwa Ahmed</h6>
                    </a>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <p>I love the game, I have been playing for months now. But the direction it is taking could make me to stop playing. Since the start of season 12, performance has been disregarded and it has become more about features and looks. I cannot enjoy the beauty of the game if it cannot perform what it intend...</p>

                </div>
                
                <div class="col-lg-1">
                    <a href="../HTML/user.html">
                    <img class="img-fluid rounded-circle" src="../IMAGES/118111837_1032480850503383_8251734100101419473_n.jpg" alt="">
                </a>
                    

                </div>
                <div class="col-lg-11">
                    <a href="../HTML/user.html">
                        <h6>Radwa Ahmed</h6>
                        </a>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <p>I love the game, I have been playing for months now. But the direction it is taking could make me to stop playing. Since the start of season 12, performance has been disregarded and it has become more about features and looks. I cannot enjoy the beauty of the game if it cannot perform what it intend...</p>

                </div>
            </div>
        </div>
       
    </div>
    <div class="container mt-5 mb-3">
        <footer id="footer"  >
            <a href="#" class="fab fa-facebook"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-google"></a>
    </footer>
    <div class="copy">
    <small><p class="ourcopy">&copy;Copyright Clock Works. All Rights Reserved</p></small> 
    <small><p class="ourcopy"> Developed with   <i class="fas fa-heart" style="color:red;"></i> by Clocksmiths  Team
    </p></small> 

</div>
</body>

<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
<script src="../bootstrap/bootstrap.js"></script>

</html>