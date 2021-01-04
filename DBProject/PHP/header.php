<?php
include_once '../PHP/functions.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$fileName = basename($_SERVER['PHP_SELF']);

// THIS WILL BREAK IF FILENAMES ARE CHANGED
if (!isset($_SESSION['U_ID']) && $fileName != "login.php" && $fileName != "signup.php") {
    AlertJS("Please log in!");
    RedirectJS("../HTML/login.php");
}?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="icon" href="../IMAGES/clock.jpg"  class="img-fluid rounded-circle" type="image/jpg">

</head>
<header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
        <a class="navbar-brand" href="../HTML/Home.php">Clockwork</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../HTML/Browse.php">Browse</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../HTML/Groups_List.php">Groups</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../HTML/PublishApp.php">Publish </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../HTML/supportticket.php">Support</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../HTML/user.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../HTML/About.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../PHP/logout.php">Log out</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstleyVEVO">CLICK ME</a>
                </li>

            </ul>
        </div>
    </nav>

    </nav>
</header>
