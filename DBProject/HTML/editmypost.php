<?php

require '../PHP/Group.php';
require_once '../PHP/post.php';
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
    <title>Edit Post</title>
</head>

<?php include_once '../PHP/header.php' ?>


<body>
   <div class="container my-3">
      <div class="row">
       
 
                <form action="../PHP/editpost.php?id=<?php echo (int)$_GET['id'];?>" method="POST" enctype="multipart/form-data">
                <div class="col-lg-12">
                    <textarea name="TEXTpost" id="" cols="40" rows="5"><?php  $post=new post(); $id=(int)$_GET['id']; $post->getTEXTpost($id); ?></textarea>
                   </div>
                   <div>
                   <label>Choose a new image:</label>
                    <input type="file" id="picture" name="picture">
                   </div>
                   <div class="col-lg-12">                        
                    <label>If you don't choose a new image and click Edit, the previously selected image will still be present in the post</label>
                    </div>
                    <div>
                    <button class="btn btn-primary" id="post"  type="submit" name="submit">Edit</button></a>
                    <button class="btn btn-primary" id="post"  type="submit" name="submitandremove">Edit and Remove any picture from post</button></a>
                    </div>
                </form>
      </div>
    </div>
    <?php include_once "../PHP/footer.php" ?>

</body>

</html>