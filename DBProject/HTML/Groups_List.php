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
    <title>Groups</title>
</head>

<?php include_once '../PHP/header.php' ?>
<?php include_once '../PHP/connection.php' ?>
<?php include_once '../PHP/user.php' ?>
<?php include_once '../PHP/group.php' ?>

<body>
    <div>
        <div class="subtitle">
            <h1>Groups</h1>
        </div>
        <div class="container blockapp my-3">
            <!-- TODO -->
            <!-- Convert to OOP -->
            <!-- Grab all groups from the DB -->
            <!-- Output the data of X groups according to the template -->
            <?php
            $groupIDs = group::GetAllGroupID();

            while ($currGID = mysqli_fetch_assoc($groupIDs)) {
                $currGroup = new group($currGID['Group_ID']);
            ?>
                <div class="applet">
                    <div class="row mt-2">
                        <div class="col-lg-1  animate__animated  animate__backInLeft">
                            <a href="Group.php?id=<?php echo $currGID['Group_ID'] ?>">
                                <?php $currGroup->getGroupPicture($currGID['Group_ID']); ?>
                            </a>
                        </div>
                        <div class="col-lg-11  animate__animated  animate__backInRight">
                            <div class="float-lg-right">
                                <H6 class="float-lg-right"> Members: <?php echo $currGroup->GetNumMembers($currGroup->GROUP_ID) ?>, Date Created: <?php echo $currGroup->Date_Created ?></H6>
                            </div>
                            <!-- TODO: REDIRECT THE USER TO THE PROPER GROUP PAGE -->
                            <a class="catlinks" href="Group.php?id=<?php echo $currGID['Group_ID']; ?>">
                                <h5><?php echo $currGroup->GroupName; ?></h5>
                            </a>
                            <div>
                                <!-- TODO: REDIRECT THE USER TO THE PROPER USER PAGE -->
                                <?php
                                $UID = $_SESSION['U_ID'];
                                $GID = $currGID['Group_ID'];
                                $query = "SELECT * FROM Member_In WHERE U_ID = '$UID' AND Group_ID = '$GID'";
                                $dbConnection = DBConnection::getInst()->getConnection();
                                $result = $dbConnection->query($query);

                                if ($_SESSION['Account_Type'] == USER_ACCOUNT || $_SESSION['Account_Type'] == DEV_ACCOUNT)
                                    if ($result->num_rows == 0) :
                                ?>
                                    <H6 class="float-lg-right">
                                        <form action="../PHP/Join_Exit_Group.php? id= <?php echo $GID; ?>" method="POST" enctype="multipart/form-data">
                                            <button class="btn btn-primary" type="submit" id="JoinG" name="JoinG">Join Group</button>
                                        </form>
                                    </H6>
                                <?php else : ?>
                                    <H6 class="float-lg-right">Already a member!</H6>
                                <?php endif; ?>
                                <a href="../HTML/user.php?id=<?php echo $currGroup->U_ID; ?>">
                                    <h6 style="font-weight: bold;">
                                        <?php
                                        $groupOwner = new user($currGroup->U_ID);
                                        echo "$groupOwner->Username";
                                        ?>
                                    </h6>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            <?php } ?>
        </div>
    </div>


    <?php include_once "../PHP/footer.php" ?>

</body>

</html>