<?php 
    require_once("config.php"); 

    session_start();

    require_once("config.php"); 

    $user = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['userPassword'];
    $num = 0;

    $checkEmail = $db->prepare("SELECT email FROM user_login Where userName = :userName && userPass = :userPassword");
    $checkEmail->execute(array(':userName' => $user, ':userPassword' =>$password));

    while ($row = $checkEmail->fetch(PDO::FETCH_ASSOC)) {
        $num++;
    }

    if($num == 1) {
        $_SESSION['userName'] = $user;
        echo "login successful";
        header('location:index.php');
    } else {
        echo "login unsuccessful";

    }
?>