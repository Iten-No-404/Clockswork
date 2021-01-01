<!-- TODO: 
    Run "Home.php" on page load so it check for session.
    Load Apps from the database and display them instead of the current static layout.
 -->

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

    <div class="container-fluid mt-3" style="height: 10%; width: 100%;">

        <div class="head">

            <h4> Best Entertainment apps </h4>
            <button class="btn btn-primary btn1" type="button">See More</button>
        </div>

        <div class="row mt-3">
            <div class="col-lg-2 mb-3">
                <div class="card">
                    <img class="card-img-top" src="../IMAGES/download (2).png" alt="">
                    <div class="card-body">
                        <div class="appname">
                            <h5 class="card-title">Pinterset</h5>
                            <button class="btn btn-primary" type="button">download</button>
                        </div>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 mb-3">
                <div class="card">
                    <img class="card-img-top" src="../IMAGES/download.png" alt="">
                    <div class="card-body">
                        <div class="appname">
                            <h5 class="card-title">Twitter</h5>
                            <button class="btn btn-primary" type="button">download</button>
                        </div>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 mb-3">
                <div class="card">
                    <img class="card-img-top" src="../IMAGES/download (1).jpg" alt="">
                    <div class="card-body">
                        <div class="appname">
                            <h6 class="card-title">Instagram</h6>
                            <button class="btn btn-primary" type="button">download</button>
                        </div>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 mb-3">
                <div class="card">
                    <img class="card-img-top" src="../IMAGES/facebook-messenger-2-569346.webp" alt="">
                    <div class="card-body">
                        <div class="appname">
                            <h6 class="card-title">Messenger</h6>
                            <button class="btn btn-primary" type="button">download</button>
                        </div>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 mb-3">

                <div class="card">
                    <img class="card-img-top" src="../IMAGES/linke3(1).png" alt="">
                    <div class="card-body">
                        <div class="appname">
                            <h5 class="card-title">Linkedin</h5>
                            <button class="btn btn-primary" type="button">download</button>
                        </div>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>

                </div>

            </div>

            <div class="col-lg-2 mb-3">

                <div class="card">
                    <img class="card-img-top" src="../IMAGES/pap(3).jpg" alt="">
                    <div class="card-body">
                        <div class="appname">
                            <h5 class="card-title">Pubg</h5>
                            <button class="btn btn-primary" type="button">download</button>
                        </div>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>

                </div>

            </div>

        </div>


    </div>
    <br>

    <!-- breaksection -->
    <div class="container-fluid mt-3">
        <div class="head">
            <h4> Recommended For You</h4>
            <button class="btn btn-primary btn1" type="button">See More</button>
        </div>

        <div class="row mt-3">
            <div class="col-lg-2 mb-3">
                <div class="card">
                    <img class="card-img-top" src="../IMAGES/faecc.png" alt="">
                    <div class="card-body">
                        <div class="appname">
                            <h5 class="card-title">Facebook</h5>
                            <button class="btn btn-primary" type="button">download</button>
                        </div>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>

                </div>
            </div>

            <div class="col-lg-2 mb-3">
                <div class="card">
                    <img class="card-img-top" src="../IMAGES/clash(3).jpg" alt="">
                    <div class="card-body">
                        <div class="appname">
                            <h6 class="card-title">Clashofclans</h6>
                            <button class="btn btn-primary" type="button">download</button>
                        </div>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>

                </div>
            </div>

            <div class="col-lg-2 mb-3">
                <div class="card">
                    <img class="card-img-top" src="../IMAGES/snap(3).png" alt="">
                    <div class="card-body">
                        <div class="appname">
                            <h5 class="card-title">Snapchat </h5>
                            <button class="btn btn-primary" type="button">download</button>
                        </div>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 mb-3">

                <div class="card">
                    <img class="card-img-top" src="../IMAGES/sub.jpg" alt="">
                    <div class="card-body">
                        <div class="appname">
                            <h5 class="card-title">Subway</h5>
                            <button class="btn btn-primary" type="button">download</button>
                        </div>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 mb-3">

                <div class="card">
                    <img class="card-img-top" src="../IMAGES/call.jpg" alt="">
                    <div class="card-body">
                        <div class="appname">
                            <h6 class="card-title">Callofduty</h6>
                            <a href="../HTML/App.html">
                                <button class="btn btn-primary" type="button">download</button>
                            </a>
                        </div>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 mb-3">
                <div class="card">
                    <img class="card-img-top" src="../IMAGES/mail.png" alt="">
                    <div class="card-body">
                        <div class="appname">
                            <h5 class="card-title">Gmail</h5>
                            <button class="btn btn-primary" type="button">download</button>
                        </div>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- break -->
    <div class="container-fluid mt-3">
        <div class="head">
            <h4> Popluar Apps & Games</h4>
            <button class="btn btn-primary btn1" type="button">See More</button>
        </div>

        <div class="row mt-3">
            <div class="col-lg-2 mb-3">
                <div class="card">
                    <img class="card-img-top" src="../IMAGES/tik.png" alt="">
                    <div class="card-body">
                        <div class="appname">
                            <h5 class="card-title">TikTok</h5>
                            <button class="btn btn-primary" type="button">download</button>
                        </div>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 mb-3">
                <div class="card">
                    <img class="card-img-top" src="../IMAGES/sound.png" alt="">
                    <div class="card-body">
                        <div class="appname">
                            <h6 class="card-title">SoundCloud</h6>
                            <button class="btn btn-primary" type="button">download</button>
                        </div>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 mb-3">
                <div class="card">
                    <img class="card-img-top" src="../IMAGES/share.jpg" alt="">
                    <div class="card-body">
                        <div class="appname">
                            <h6 class="card-title">Share it</h6>
                            <button class="btn btn-primary" type="button">download</button>
                        </div>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 mb-3">
                <div class="card">
                    <img class="card-img-top" src="../IMAGES/class(3).jpg" alt="">
                    <div class="card-body">
                        <div class="appname">
                            <h6 class="card-title">Class Room</h6>
                            <button class="btn btn-primary" type="button">download</button>
                        </div>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 mb-3">
                <div class="card">
                    <img class="card-img-top" src="../IMAGES/word2.png" alt="">
                    <div class="card-body">
                        <div class="appname">
                            <h5 class="card-title">Word</h5>
                            <button class="btn btn-primary" type="button">download</button>
                        </div>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 mb-3">
                <div class="card">
                    <img class="card-img-top" src="../IMAGES/drive.png" alt="">
                    <div class="card-body">
                        <div class="appname">
                            <h5 class="card-title">Drive</h5>
                            <button class="btn btn-primary" type="button">download</button>
                        </div>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>

        <?php include_once "../PHP/footer.php" ?>
</body>
<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
<script src="../bootstrap/bootstrap.js"></script>

</html>