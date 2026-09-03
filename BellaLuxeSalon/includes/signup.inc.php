<?php

if (isset($_POST['submit'])) {

    //getting data
    $firstName = $_POST['firstName'];
    $username = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwdRepeat'];
    $email = $_POST['email'];

    //Instantiate signup class
    include "../classes/DbConnect.class.php";
    include "../classes/Signup.class.php";
    include "../classes/SignupController.class.php";

    $signup = new SignupController($firstName, $username, $pwd, $pwdRepeat, $email);

    //Running error handlers and user signup
    $signup->signupUser();
    $success = "You have signed up successfully! Please log in.";
    //Going back to front page
    header("location: ../view/login.php?success=" . urlencode($success));
}
