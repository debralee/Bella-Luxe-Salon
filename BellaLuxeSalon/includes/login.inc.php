<?php
session_start();

if (isset($_POST['submit'])) {

    //getting data
    $username = $_POST['uid'];
    $pwd = $_POST['pwd'];

    //Instantiate signup class
    include "../classes/DBConnect.class.php";
    include "../classes/Login.class.php";
    include "../classes/LoginController.class.php";

    $login = new LoginController($username, $pwd);

    //Running error handlers and user signup
    $login->loginUser();
    //Going back to front page
    header("location: ../view/index.php?signup=none");
}
