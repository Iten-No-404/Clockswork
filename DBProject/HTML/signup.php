<?php include_once 'signup.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../CSS/SignUp.css">
    <title>sign Up</title>

</head>
<?php include_once '../PHP/header.php' ?>


<body>

    <div class="container-fluid">

        <div class="row">
            <form action="../PHP/signup.php" method="POST">

                <div class="form">
                    <label>Name:</label>
                    <!-- <br> -->
                    <input type="text" placeholder="Esraa" id="name" name="name">
                    <h6 id="h_name"></h6>
                    <!-- <br> -->

                    <label>Email:</label>
                    <!-- <br> -->
                    <input type="email" placeholder="esraa@yahoo.com" id="email" name="email">
                    <h6 id="h_email"></h6>
                    <!-- <br> -->
                    <label>Number:</label>
                    <!-- <br> -->
                    <input type="tel" placeholder="01234567891" id="number" name="number">
                    <h6 id="h_number"></h6>
                    <!-- <br> -->
                    <label>PassWord:</label>
                    <!-- <br> -->
                    <input type="password" placeholder="***----" id="pass1" name="pass1">
                    <h6 id="h_pass1"></h6>
                    <!-- <br> -->

                    <label>Confirm PassWord:</label>
                    <!-- <br> -->
                    <input type="password" placeholder="***----" id="pass2" name="pass2">
                    <h6 id="h_pass2"></h6>
                    <!-- <br>
                <br> -->
                    <br>
                    <button class="btn btn-primary" type="submit" id="submit" name="submit">Sign Up</button>

                    <button class="btn btn-success"> <a href="../HTML/login.php">Log In</a></button>

                </div>

            </form>
        </div>

    </div>



</body>

<script src="../bootstrap/jquery.js"></script>
<script src="../bootstrap/popper.main.js"></script>
<script src="../bootstrap/bootstrap.js"></script>
<script src="../JS/signup.js"></script>

</html>