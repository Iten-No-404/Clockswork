<?php 

// Shows the alert box at the top of the page
function AlertJS(string $message)
{
    echo "<script>alert('$message');</script>";
}

// Redirecting with php causes the JS alert to not show up
// So we to use the JS redirect instead.
function RedirectJS(string $location)
{
    echo "<script>window.location.href='$location';</script>";
}

?>