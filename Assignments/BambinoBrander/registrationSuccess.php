<?php 
    require_once("config.php"); 

    $user = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['password'];


   echo "registration successful!" . $user . $email . $password;
?>