<?php include('../PHP/login.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>Log In</title>

</head>
<?php include_once '../PHP/header.php' ?>


<body>

    <div class="container-fluid">

        <div class="row">
            <form action="../PHP/login.php" method="post">

                <div class="form">
                    <label>Email:</label>
                    <!-- <br> -->
                    <input type="email" placeholder="esraa@yahoo.com" id="email" name="email">
                    <h6 id="h_email"></h6>
                    <!-- <br> -->
                    <label>Password:</label>
                    <!-- <br> -->
                    <input type="password" placeholder="***----" id="pass1" name="pass1">
                    <h6 id="h_pass1"></h6>
                    <!-- <br><br> -->
                    <br>

                    <button class="btn btn-primary" type="submit" id="submit" name="submit">Log In</button>
                    <button class="btn btn-success"> <a href="../HTML/signup.html">Sign Up</a></button>
                </div>

            </form>
        </div>

    </div>
    
</body>

<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
<script src="../bootstrap/bootstrap.js"></script>
<script src="../JS/login.js"></script>

</html>