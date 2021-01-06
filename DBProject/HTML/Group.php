<?php require_once '../PHP/Group.php';
require_once '../PHP/user.php';
require_once '../PHP/post.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../CSS/Group.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <link rel="stylesheet" href="../CSS/Footer.css">
    <title>Document</title>
</head>
<?php include_once '../PHP/header.php' ?>

<body>

    <div class="container mb-2 ">
        <?php $id = $_GET['id'];
        $obj = new GRoup($id); ?>
        <img class="img-fluid" width="100%" src="<?php $obj->getGroupPicture2($id); ?>" alt="">
        <?php
        ?>

        <div class="grouptitleborder mt-3">
            <?php $id = $_GET['id'];
            $obj = new GRoup($id);
            ?> <H1><?php $obj->getGroupName($id); ?></H1>
            <H6><?php $obj->GetNumMembers($id); ?></H6>
            <h6><?php $obj->getGroupDescription($id); ?></h6>

        </div>
    </div>

    <div class="line"></div>
    <div class="container my-3">
        <div class="row">
            <div class="col-lg-1">
                <a href="../HTML/user.php?id=<?php echo $_SESSION['U_ID'] ?>">
                    <?php $user = new User($_SESSION['U_ID']);
                    $user->getProfilePicture($_SESSION['U_ID']);
                    ?>
                </a>

            </div>
            <div class="col-lg-11 posts" onclick="display()">

                <h5 class="mt-3">What is on Your mind,<?php $user = new User($_SESSION['U_ID']);
                                                        $user->getUserName($_SESSION['U_ID']); ?> ?</h5>

            </div>
        </div>
    </div>

    <div class="line"></div>
    <div class="container my-5 cla10">
        <form action="../PHP/insertpost.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">

            <div class="row">
                <div class="col-lg-1">
                    <a href="../HTML/user.php?id=<?php echo $_SESSION['U_ID'] ?>">
                        <?php $user = new User($_SESSION['U_ID']);
                        $user->getProfilePicture($_SESSION['U_ID']);
                        ?>
                    </a>


                </div>
                <div class="col-lg-11">
                    <textarea name="TEXTpost" id="" cols="80" rows="5"></textarea>
                    <br>
                    <div style="display: flex;">
                        <!-- <input id="my-input" type="file" name="post_picture" class="form-control-file"> -->
                        <input id="my-input" class="form-control-file" type="file" name="picture">
                        <button class="btn btn-light" type="submit" name="">Post</button>
                        <span onclick="hide()">&times;</span>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <div class="line"></div>
    <?php
    $obj = new post();
    $result = $obj->select($_GET['id']);
    ?>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
            <div class="container my-3">
                <div class="row mt-2">
                    <div class="col-lg-1">
                        <a href="../HTML/user.php?id=<?php echo $row['U_ID'] ?>">
                            <?php $user = new User($row['U_ID']);
                            $user->getProfilePicture($row['U_ID']);
                            ?>
                        </a>
                    </div>

                    <div class="col-lg-11">
                        <h6> <a href="../HTML/user.php?id=<?php echo $row['U_ID'] ?>">
                                <?php $user = new User($row['U_ID']);
                                $user->getUserName($row['U_ID']);
                                ?>
                            </a>
                        </h6>

                        <p> <?php $obj->getTEXTpost($row['Post_id']); ?> </p>
                        <img class="img" src="<?php $obj->getpicture($row['Post_id']); ?>" alt="">

                    </div>
                </div>
            </div>
            <div class="line"></div>
    <?php
        }
    }
    ?>
    <?php include_once "../PHP/footer.php" ?>

</body>
<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
<script src="../bootstrap/bootstrap.js"></script>
<script src="../JS/jav.js"></script>

</html>