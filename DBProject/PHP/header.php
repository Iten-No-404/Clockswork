<?php
include_once '../PHP/functions.php';
include_once '../PHP/user.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$fileName = basename($_SERVER['PHP_SELF']);

// THIS WILL BREAK IF FILENAMES ARE CHANGED
// Place checks in the below blocks if you want them to execute when the user is not logged in
if (!isset($_SESSION['U_ID'])) {
    if ($fileName != "login.php" && $fileName != "signup.php") {
        AlertJS("Please log in!");
        RedirectJS("../HTML/login.php");
    }
}
// And here if you want them to execute each time a logged in user loads a page (that has the header)
else {
    $Ban_End = user::getBanEnd($_SESSION['U_ID']);
    if ($Ban_End > date('Y-m-d')) {
        AlertJS("You are banned until " . $Ban_End);
        RedirectJS('../PHP/logout.php');
    }
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="icon" href="../IMAGES/Clockworks.png" class="img-fluid rounded-circle" type="image/jpg">

</head>
<header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
        <a class="navbar-brand" href="../HTML/Home.php">Clockwork</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <?php if (isset($_SESSION['U_ID'])) : ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="../HTML/Browse.php">Browse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../HTML/Groups_List.php">Groups</a>
                    </li>
                    <?php if (!($_SESSION['Account_Type'] == SUPPORT_ACCOUNT || $_SESSION['Account_Type'] == ADMIN_ACCOUNT)) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../HTML/CreateGroup.php">Create a group!</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../HTML/PublishApp.php">Publish </a>
                        </li>
                    <?php endif; ?>
                    <?php if (!($_SESSION['Account_Type'] == SUPPORT_ACCOUNT || $_SESSION['Account_Type'] == ADMIN_ACCOUNT)) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../HTML/supportticket.php">Support</a>
                        </li>
                    <?php elseif ($_SESSION['Account_Type'] == SUPPORT_ACCOUNT) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../HTML/SupportTicketStaffView.php">Support</a>
                        </li>
                    <?php endif ?>
                    <?php if ($_SESSION['Account_Type'] != ADMIN_ACCOUNT && $_SESSION['Account_Type'] != SUPPORT_ACCOUNT) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../HTML/user.php? id= <?php echo $_SESSION['U_ID']; ?>">Profile</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../HTML/Employee.php? id= <?php echo $_SESSION['U_ID']; ?>">Profile</a>
                        </li>
                    <?php endif; ?>
                    <?php if ($_SESSION['Account_Type'] == DEV_ACCOUNT) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../HTML/Myapp.php" >My applications</a>
                        </li>
                    <?php } ?>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="../HTML/About.php">About</a>
                </li>
                <?php if (isset($_SESSION['U_ID'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../PHP/logout.php">Log out</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    </nav>
</header>