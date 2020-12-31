<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    
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
  <link rel="stylesheet" href="../CSS/user.css">
    <title>Document</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="../PHP/logout.php">Log out</a>
                </li>

            </ul>
        </div>
    </nav>

    </nav>
</header>
<body>
  <h1>Personal info</h1>
    <div class="container mt-3 cont1">
        <div class="row">
            <div class="col-lg-3">
                <label for="">
                    <h6>Profile Picture</h6>
                </label>
            </div>
            <div class="col-lg-9">
                <?php
                     if (session_status() == PHP_SESSION_NONE)
                    {
                       session_start();
                    }
               ?>
                <img class="img-fluid rounded-circle" sty src="<?php 
                echo $_SESSION['Profile_Picture']; ?>" alt="">
            
            </div>

        </div>
        <div class="line">

        </div>

        <div class="row">
           <div class="col-lg-3">
               <label for="">
                   <h6>Name</h6>
               </label>
           </div>
           <div class="col-lg-9">
               <?php
               //TODO Check if another person is viewing someone else's profile
               if (isset( $_SESSION['FName']))
               {
               echo "$_SESSION[FName]";
               }
               if (isset( $_SESSION['LName']))
               {
                echo "$_SESSION[LName]";
               }
               ?>
           </div>
            
        </div>
        <div class="line">
            
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">
                   <h6> Brithday</h6>
                </label>
            </div>
            <div class="col-lg-9">
                <?php
            if (isset($_SESSION['Bdate']))
            {
                echo "$_SESSION[Bdate]";
            }
               ?>
            </div>

        </div>
        <div class="line">
            
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">
                 <h6>   Gender</h6>
                </label>
            </div>
            <div class="col-lg-9">
                <?php
            if (isset($_SESSION['Gender']))
            {
                if ($_SESSION['Gender'] == 'M')
                {
                    echo "Male";
                }
                else
                {
                    echo "Female";
                }
            }
                ?>
            </div>

        </div>
        <div class="line">
            
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">
                   <h6> Password</h6>
                </label>
            </div>
            <div class="col-lg-9">
                <i class="fas fa-circle"></i>
                <i class="fas fa-circle"></i>
                <i class="fas fa-circle"></i>
                <i class="fas fa-circle"></i>
            </div>

        </div>
        <div class="line">
            
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">
                   <h6>Email</h6> 
                </label>
            </div>
            <div class="col-lg-9">
                <?php
                echo "$_SESSION[email]";
                ?>
            </div>

        </div>
        <div class="line">
            
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">
                   <h6> UserName</h6>
                </label>
            </div>
            <div class="col-lg-9">
                <?php
                echo "$_SESSION[username]";
                ?>
            </div>

        </div>
        <div class="line">
            
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">
                    <h6>Address</h6>
                </label>
            </div>
            <div class="col-lg-9">
                <?php
                if (isset($_SESSION['Address']))
                {
                    echo "$_SESSION[Address]";
                }
                ?>
            </div>

        </div>
        <div class="line">
            
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">
                    <h6>Wallet</h6>
                </label>
            </div>
            <div class="col-lg-9">
                <?php
                if (isset( $_SESSION['Balance']))
                {
                   echo "$_SESSION[Balance]";
                }
                ?>
            </div>

        </div>
        <div class="line">
            
        </div>
        <div class="row">
            <div class="col-lg-3">
                <label for="">
                    <h6>Type of User</h6>
                </label>
            </div>
            <div class="col-lg-9">
                <?php
                if (isset($_SESSION['Developer']))
                {
                    if ( $_SESSION['Developer'] == '0')
                    {
                        echo "User";
                    }
                    else
                    {
                        echo "Developer";
                    }
                }
                ?>
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
    <small><p class="ourcopy"> Developed with   <i class="fas fa-heart" style="color:red;"></i> by Clocksmiths Team
    </p></small> 


   </div>
  </div>

</body>
<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
<script src="../bootstrap/bootstrap.js"></script>
</html>