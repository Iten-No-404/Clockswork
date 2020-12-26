<?php
// TODO: Display an alert for a few second before sending the user back to the signup screen if
// a field is empty/ passwords don't match / username or email already in use/
require 'connection.php';
if (isset($_POST['submit'])) {
    // Based on: https://www.youtube.com/watch?v=qjwc8ScTHnY&ab_channel=edureka%21

    // Fetching data from the HTML form
    // The index/key for the _POST array should be whatever we specified in the input tag under the "name" attribute
    $userName = mysqli_real_escape_string($dbConnection, $_POST['name']);
    $email = mysqli_real_escape_string($dbConnection, $_POST['email']);
    $phoneNumber = mysqli_real_escape_string($dbConnection, $_POST['number']);
    $password1 = mysqli_real_escape_string($dbConnection, $_POST['pass1']);
    $password2 = mysqli_real_escape_string($dbConnection, $_POST['pass2']);

    // Validation
    $errors = 0;
    if (empty($userName) || empty($email) || empty($password1) || empty($password2)) {
        echo "<script>alert('A required field is empty')</script>";
        $errors++;
    }

    if ($password1 != $password2) {
        echo "<script>alert('Passwords do not match')</script>";
        $errors++;
    }

    // Checks if the username or email have already been used
    $checkUser = "SELECT * FROM users WHERE Username = '$userName' OR Email = '$email' LIMIT 1";
    $userCheckResult = $dbConnection->query($checkUser);

    if ($userCheckResult->num_rows != 0) {
        echo "<script>alert('Username or Email already in use!')</script>";
        $errors++;
    }

    // If there are no errors, can register
    if ($errors == 0) {
        // PHP uses bcrypt for hashing?
        // Encrypting passwords so that DB access does not risk user data
        $passwordHash = password_hash($password1, PASSWORD_BCRYPT);

        $regUserQuery = "INSERT INTO users (Username, Email, Phone_Number, Password) VALUES ('$userName', '$email', '$phoneNumber', '$passwordHash')";
        mysqli_query($dbConnection, $regUserQuery);
        $_SESSION['username'] = $userName;
        $_SESSION['success'] = "You are now registered!";

        header("Location:../HTML/Home.html");
    }
}
?>
