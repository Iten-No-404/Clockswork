<?php include('../PHP/user.php'); ?>
<!DOCTYPE html>
<html lang="en">

<!-- TODO: Check if the user is logged in. If not, alert and redirect to login page -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">

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
    <link rel="stylesheet" href="../CSS/user.css">
    <title>Statistics</title>
</head>

<?php include_once '../PHP/header.php' ?>
<?php require_once '../PHP/Employee.php' ?>
<?php require_once '../PHP/statistics.php' ?>

<body>
    <div class="container mt-3 cont1">
        <h1 class="mt-3">General statistics</h1>
        <?php $stats = new statistics(); ?>
        <div class="container mt-3 cont1">

            <div class="row">
                <div class="col-lg-3">
                    <label for="">
                        Total Number of users:
                    </label>
                </div>
                <div class="col-lg-9">
                    <?php echo $stats->getNumUsers(); ?> users
                </div>
            </div>

            <div class="line"></div>

            <div class="row">
                <div class="col-lg-3">
                    <label for="">
                        Total Number of applications:
                    </label>
                </div>
                <div class="col-lg-9">
                    <?php echo $stats->getNumApps(); ?> applications
                </div>
            </div>

            <div class="line"></div>

            <div class="row">
                <div class="col-lg-3">
                    <label for="">
                        Total Number of groups:
                    </label>
                </div>
                <div class="col-lg-9">
                    <?php echo $stats->getNumGroups(); ?> groups
                </div>
            </div>

            <div class="line"></div>

            <div class="row">
                <div class="col-lg-3">
                    <label for="">
                        Mastermind ID:
                    </label>
                </div>
                <div class="col-lg-9">
                    <?php echo $stats->getMastermindID(); ?>
                </div>
            </div>

            <div class="line"></div>

            <div class="row">
                <div class="col-lg-3">
                    <label for="">
                        Average user age:
                    </label>
                </div>
                <div class="col-lg-9">
                    <?php echo $stats->getAvgUserAge(); ?> years
                </div>
            </div>

            <div class="line"></div>

            <div class="row">
                <div class="col-lg-3">
                    <label for="">
                        Average applicataion rating:
                    </label>
                </div>
                <div class="col-lg-9">
                    <?php echo $stats->getAvgAppRating(); ?> stars
                </div>
            </div>

            <div class="line"></div>

            <div class="row">
                <div class="col-lg-3">
                    <label for="">
                        Average upvotes per post:
                    </label>
                </div>
                <div class="col-lg-9">
                    <?php echo $stats->getAvgUpvotes(); ?> upvotes
                </div>
            </div>

            <div class="line"></div>

            <div class="row">
                <div class="col-lg-3">
                    <label for="">
                        Average number of users per app:
                    </label>
                </div>
                <div class="col-lg-9">
                    <?php echo $stats->getAvgNumAppUsers(); ?> users
                </div>
            </div>

            <div class="line"></div>

            <div class="row">
                <div class="col-lg-3">
                    <label for="">
                        Average number of members per group:
                    </label>
                </div>
                <div class="col-lg-9">
                    <?php echo $stats->getAvgNumGroupMembers(); ?> users
                </div>
            </div>

            <div class="line"></div>

            <div class="row">
                <div class="col-lg-3">
                    <label for="">
                        The app with the most users:
                    </label>
                </div>
                <div class="col-lg-9">
                    <?php $mostInstalled = $stats->getMostInstalledApp(); ?>
                    <a href="../HTML/Application.php ?id=<?php echo $mostInstalled['App_ID'] ?>">
                        <?php echo $mostInstalled['Application_Name']; ?>
                    </a>
                    <?php echo " with " . $mostInstalled['NumOfUsers']  . " users!"; ?>
                </div>
            </div>

            <div class="line"></div>

            <div class="row">
                <div class="col-lg-3">
                    <label for="">
                        Average application price:
                    </label>
                </div>
                <div class="col-lg-9">
                    $<?php echo $stats->getAvgAppPrice(); ?>
                </div>
            </div>

        </div>

        <?php
        if ($_SESSION['Account_Type'] == ADMIN_ACCOUNT || $_SESSION['Account_Type'] == SUPPORT_ACCOUNT) { ?>
            <br>

            <h1 class="mt-3">Managerial statistics</h1>
            <div class="container mt-3 cont1">

                <div class="row">
                    <div class="col-lg-3">
                        <label for="">
                            Total Number of employees:
                        </label>
                    </div>
                    <div class="col-lg-9">
                        <?php echo $stats->getNumEmp(); ?> employee(s)
                    </div>
                </div>

                <div class="line"></div>

                <div class="row">
                    <div class="col-lg-3">
                        <label for="">
                            Total Number of support employees:
                        </label>
                    </div>
                    <div class="col-lg-9">
                        <?php echo $stats->getNumSupport(); ?> support staff
                    </div>
                </div>

                <div class="line"></div>

                <div class="row">
                    <div class="col-lg-3">
                        <label for="">
                            Total Number of administration employees:
                        </label>
                    </div>
                    <div class="col-lg-9">
                        <?php echo $stats->getNumAdmin(); ?> admins
                    </div>
                </div>

                <div class="line"></div>

                <div class="row">
                    <div class="col-lg-3">
                        <label for="">
                            Total Number of banned users:
                        </label>
                    </div>
                    <div class="col-lg-9">
                        <?php echo $stats->getNumBanned(); ?> bad users
                    </div>
                </div>

                <div class="line"></div>

                <div class="row">
                    <div class="col-lg-3">
                        <label for="">
                            Total Number of hidden apps:
                        </label>
                    </div>
                    <div class="col-lg-9">
                        <?php echo $stats->getNumHidden(); ?> apps
                    </div>
                </div>

                <div class="line"></div>

                <div class="row">
                    <div class="col-lg-3">
                        <label for="">
                            Average employee salary:
                        </label>
                    </div>
                    <div class="col-lg-9">
                        $<?php echo $stats->getAvgSalary(); ?>
                    </div>
                </div>

                <div class="line"></div>

                <div class="row">
                    <div class="col-lg-3">
                        <label for="">
                            Total number of support tickets:
                        </label>
                    </div>
                    <div class="col-lg-9">
                        <?php echo $stats->getNumSupportTickets(); ?> ticket(s)
                    </div>
                </div>

                <div class="line"></div>

                <div class="row">
                    <div class="col-lg-3">
                        <label for="">
                            The number of support ticket waiting for confirmation:
                        </label>
                    </div>
                    <div class="col-lg-9">
                        <?php echo $stats->getNumSupportTicketsOpen(); ?> ticket(s)
                    </div>
                </div>

                <div class="line"></div>
                <div class="row">
                    <div class="col-lg-3">
                        <label for="">
                            The number of support ticket being worked on
                        </label>
                    </div>
                    <div class="col-lg-9">
                        <?php echo $stats->getNumSupportTicketsWorkedOn(); ?> ticket(s)
                    </div>
                </div>

                <div class="line"></div>
                <div class="row">
                    <div class="col-lg-3">
                        <label for="">
                            The number of closed support tickets
                        </label>
                    </div>
                    <div class="col-lg-9">
                        <?php echo $stats->getNumSupportTicketsClosed(); ?> ticket(s)
                    </div>
                </div>

                <div class="line"></div>


            </div>
        <?php } ?>
    </div>

    <?php include_once "../PHP/footer.php" ?>
</body>
<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
<script src="../bootstrap/bootstrap.js"></script>

</html>