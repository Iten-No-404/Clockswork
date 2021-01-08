<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../CSS/Footer.css">
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
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../CSS/supportticket.css">
    <title>Document</title>
</head>

<?php include_once '../PHP/header.php' ?>
<?php require '../PHP/supportticket.php' ?>


<body>
    <div class="container my-3">
        <form action="../PHP/AddSupportTicket.php? id= <?php echo $_SESSION['U_ID']; ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">
                    <textarea name="SupportTicketInfo" id="SupportTicketInfo" cols="80" rows="5"></textarea>
                </div>
            </div>
            <div class="row">
                <div style="display: flex;">
                    <button class="btn btn-primary" type="submit" id="Post" name="Post">Post</button>
                    <input type="file"  class="form-control-file" id="AdditionalSupportTicket" name="AdditionalSupportTicket">
                </div>
            </div>
        </form>
    </div>

    <?php
            $result = supportticket::getAllSupportTicketsForUser($_SESSION['U_ID']);
            $currUser = new user($_SESSION['U_ID']);
            while ($row = $result->fetch_assoc())
            {
                $currSupport = new supportticket($row['TicketID'])
        ?>
    <div class="line"></div>
    <div class="container my-3">
        <div class="row mt-2">
            <div class="col-lg-1">
                <?php $currUser->getProfilePicture($_SESSION['U_ID']); ?>
            </div>
            <div class="col-lg-11">
                <a href="../HTML/user.php?id=<?php echo $currUser->U_ID;?>">
                    <h6 style="font-weight: bold;">
                        <?php
                            echo "$currUser->Username";
                        ?>
                </a>
                <div class="float-lg-right">
                    <H6 class= "float-lg-right"> Ticket Status :  
                        <?php if ($currSupport->Closed == 'W')
                        {
                            echo "Awaiting Confirmation";
                        }
                        else if ($currSupport->Closed == 'B')
                        {
                            echo "Confirmed";
                        }
                        else
                        {
                            echo "Resolved";
                        }
                        ?>
                    </H6>
                </div>
                <p> <?php echo $currSupport->ReportDescription; ?></p>
            </div>
           <?php  } ?>
        </div>
    </div>
    <div class="line"></div>
    <!--<div class="container my-3">

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
    </div> -->
    <?php include_once "../PHP/footer.php" ?>
</body>
<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
<script src="../bootstrap/bootstrap.js"></script>

</html>