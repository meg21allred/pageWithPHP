<?php 
    require_once("config.php"); 

    session_start();

    require_once("config.php"); 

    $user = $_POST['userName'];
    $password = $_POST['userPassword'];
    $num = 0;

    $checkEmail = $db->prepare("SELECT userName, userPassword FROM user_login Where userName = :userName");
    $checkEmail->execute(array(':userName' => $user));

    while ($row = $checkEmail->fetch(PDO::FETCH_ASSOC)) {
        
        $dPassword = $row['userPassword'];
        if ($password == $dPassword){
            $num++;
        }
        
    }

    if($num == 1) {
        $_SESSION['userName'] = $user;
        echo "login successful";
        header('location:index.php');
    } else {
        echo "login unsuccessful";

    }
?>