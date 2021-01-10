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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../CSS/Footer.css">
    <title><?php $id = $_GET['id'];
            $obj = new GRoup($id);
            $obj->getGroupName($id);
            echo " - Group" ?></title>
</head>
<?php include_once '../PHP/header.php' ?>


<body>
    <?php
    $id = $_GET['id'];
    $obj = new GRoup($id);
    if ($_SESSION['U_ID'] == $obj->U_ID || $_SESSION['Account_Type'] == ADMIN_ACCOUNT) :
    ?>
        <div class="col-lg-9 mt-3">
            <p class="alignright">
                <button class="btn btn-dark" id="move"> <a href="../HTML/EditGroup.php? id= <?php echo $_GET['id'] ?>">Edit Group</a></button>
                <button class="btn btn-dark" id="move"> <a href="../HTML/Group_Member_List.php? id= <?php echo $_GET['id'] ?>">Member List</a></button>
            </p>
        </div>
    <?php elseif ($_SESSION['Account_Type'] = SUPPORT_ACCOUNT) : ?>
        <div class="col-lg-9 mt-3">
            <p class="alignright">
                <button class="btn btn-dark" id="move"> <a href="../HTML/Group_Member_List.php? id= <?php echo $_GET['id'] ?>">Member List</a></button>
            </p>
        </div>
    <?php endif; ?>
    <?php
    $UID = $_SESSION['U_ID'];
    $GID = $_GET['id'];
    $query = "SELECT * FROM Member_In WHERE U_ID = '$UID' AND Group_ID = '$GID'";
    $dbConnection = DBConnection::getInst()->getConnection();
    $result = $dbConnection->query($query);
    if ($result->num_rows == 1)
        if ($_SESSION['U_ID'] != $obj->U_ID) :
    ?>
        <div class="col-lg-9 mt-3">
            <form action="../PHP/Join_Exit_Group.php? id= <?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">
                <p class="alignright">
                    <button class="btn btn-dark" type="submit" id="ExitG" name="ExitG">Exit Group</button>
                    <button class="btn btn-dark" id="move"> <a href="../HTML/Group_Member_List.php? id= <?php echo $_GET['id'] ?>">Member List</a></button>
                </p>
            </form>
        </div>
        </div>
    <?php endif; ?>
    <div class="container mb-2">
        <style>
            .aligncenter {
                text-align: center;
            }

            .alignright {
                text-align: right;
            }
        </style>
        <p class="aligncenter">
            <img class="img-fluid" width="35%" src="<?php $obj->getGroupPicture2($id); ?>" alt="">
        </p>
        <div class="grouptitleborder mt-3">
            <?php $id = $_GET['id'];
            $obj = new GRoup($id);
            ?>
            <H1><?php $obj->getGroupName($id); ?></H1>
            <H6><?php $obj->GetNumMembers($id); ?></H6>
            <h6><?php $obj->getGroupDescription($id); ?></h6>

        </div>
    </div>

    <?php
    $UID = $_SESSION['U_ID'];
    $GID = $_GET['id'];
    $query = "SELECT * FROM Member_In WHERE U_ID = '$UID' AND Group_ID = '$GID'";
    $dbConnection = DBConnection::getInst()->getConnection();
    $result = $dbConnection->query($query);
    if ($result->num_rows == 1 || $_SESSION['Account_Type'] == SUPPORT_ACCOUNT || $_SESSION['Account_Type'] == ADMIN_ACCOUNT) :
    ?>
        <?php if ($_SESSION['Account_Type'] != SUPPORT_ACCOUNT && $_SESSION['Account_Type'] != ADMIN_ACCOUNT) : ?>
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

                        <h5 class="mt-3">What is on Your mind, <?php $user = new User($_SESSION['U_ID']);
                                                                $user->getUserName($_SESSION['U_ID']); ?> ?</h5>

                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- <div class="line"></div> -->
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
                            <input id="picture" class="form-control-file" type="file" name="picture">

                            <button class="btn btn-light" type="submit" name="writeapost">Post</button>

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
                                <?php
                                if ($_SESSION['U_ID'] == $row['U_ID'] || $_SESSION['Account_Type'] == ADMIN_ACCOUNT) { ?>
                                    <a href="editmypost.php?id=<?php echo $row['Post_id']; ?>"> <button class="btn btn-dark" type="button">Edit</button></a>
                                    <a href="../PHP/deletepost.php?id=<?php echo $row['Post_id']; ?>"> <button class="btn btn-danger" type="button">Delete</button></a>

                                <?php }
                                ?>
                            </h6>
                            <!-- Modify and delete to be added here -->
                            <p> <?php $obj->getTEXTpost($row['Post_id']); ?> </p>
                            <img class="img" src="<?php $obj->getpicture($row['Post_id']); ?>" alt="">
                            <br>
                            <?php if ($_SESSION['Account_Type'] != ADMIN_ACCOUNT && $_SESSION['Account_Type'] != SUPPORT_ACCOUNT) : ?>
                                <a href="../PHP/up_post.php?id=<?php echo $row["Post_id"]; ?>"><i class="far fa-thumbs-up"></i></a>
                                <a href="../PHP/down_post.php?id=<?php echo $row["Post_id"]; ?>"><i class="far fa-thumbs-down"></i></a>
                            <?php endif; ?>
                            <br>
                            <?php $obj->selectup($row["Post_id"]);
                            $obj->selectdown($row["Post_id"]);
                            ?>

                        </div>
                    </div>
                </div>

                <div class="line"></div>



        <?php }
        }

        ?>
    <?php else : ?>
        <H2 class="aligncenter">Not a group member, join this group to be able to chat with other members</H2>

    <?php endif; ?>








    <?php include_once "../PHP/footer.php" ?>

</body>
<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
<script src="../bootstrap/bootstrap.js"></script>
<script src="../JS/jav.js"></script>

</html>