<?php

require '../PHP/app.php'

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
    <title>Browse</title>
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

    <div class="categories">
        <a class="catlinks" href="../HTML/Category.html">
            <div class="col-12"><i class="icon far fa-fw fa-circle"></i>
                <span class="txt-action idx-27">Art &AMP; Design</span>
            </div>
        </a>
        <a class="catlinks" href="../HTML/Category.html">
            <div class="col-12"><i class="icon far fa-fw fa-circle"></i>
                <span class="txt-action idx-27">Beauty</span>
            </div>
        </a>
        <a class="catlinks" href="../HTML/Category.html">
            <div class="col-12"><i class="icon far fa-fw fa-circle"></i>
                <span class="txt-action idx-27">Business</span>
            </div>
        </a>
        <a class="catlinks" href="../HTML/Category.html">
            <div class="col-12"><i class="icon far fa-fw fa-circle"></i>
                <span class="txt-action idx-27">Communication</span>
            </div>
        </a>
        <a class="catlinks" href="../HTML/Category.html">
            <div class="col-12"><i class="icon far fa-fw fa-circle"></i>
                <span class="txt-action idx-27">Education</span>
            </div>
        </a>
        <a class="catlinks" href="../HTML/Category.html">
            <div class="col-12"><i class="icon far fa-fw fa-circle"></i>
                <span class="txt-action idx-27">Games</span>
            </div>
        </a>
        <a class="catlinks" href="../HTML/Category.html">
            <div class="col-12"><i class="icon far fa-fw fa-circle"></i>
                <span class="txt-action idx-27">Lifestyle</span>
            </div>
        </a>
        <a class="catlinks" href="../HTML/Category.html">
            <div class="col-12"><i class="icon far fa-fw fa-circle"></i>
                <span class="txt-action idx-27">Productivity</span>
            </div>
        </a>
        <a class="catlinks" href="../HTML/Category.html">
            <div class="col-12"><i class="icon far fa-fw fa-circle"></i>
                <span class="txt-action idx-27">Social</span>
            </div>
        </a>
        <a class="catlinks" href="../HTML/Category.html">
            <div class="col-12"><i class="icon far fa-fw fa-circle"></i>
                <span class="txt-action idx-27">Tools</span>
            </div>
        </a>
    </div>

    <div class="appslist">
        <div class="subtitle">
            <h1>Applications Available</h1>
        </div>
        <div class="container blockapp my-3">
           
         
                <div class="row mt-2">
                    <?php
                        $obj=new App();
                        $result= $obj->getallids();
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                $var=$row["App_ID"];?>
                                <div class="col-lg-1">
                                    <a href="../HTML/App.html">
                                       <?php   $obj->getApplication_Picturecircle($var)?>
                                    </a>
                                </div>
                                <div class="col-lg-11">
                                    <div class="float-lg-right">
                                      <?php  $obj-> getRating($var);
                                          ?>
                                    </div>
                                    <a class="catlinks" href="../HTML/App.html">
                                        <h5><?php  $obj-> getname($var )?></h5>
                                    </a>
                                    <div>
                                        <H6  class="float-lg-right"> Users: <?php $obj-> getNumOfUsers($var)  ?>, Age Rating: <?php $obj->getAgeRating($var)  ?>, Price:  <?php $obj-> getPrice($var)  ?></H6>
                                        <a href="../HTML/user.html">
                                            <h6 style="font-weight: bold;">Facebook</h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="line my-2">
            
                                   </div>
                           
                               
                           
                               <?php }
                      
                        }
                    

                    ?>
                    
                </div>
                
          
           
          
           
          
          
            
        </div>
    </div>


    <div class="container mt-5 mb-3">
        <footer id="footer">
            <a href="#" class="fab fa-facebook"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-google"></a>
        </footer>
        <div class="copy">
            <small>
                <p class="ourcopy">&copy;Copyright Clock Works. All Rights Reserved</p>
            </small>
            <small>
                <p class="ourcopy"> Developed with <i class="fas fa-heart" style="color:red;"></i> by Clocksmiths Team
                </p>
            </small>
        </div>
    </div>
</body>

</html>