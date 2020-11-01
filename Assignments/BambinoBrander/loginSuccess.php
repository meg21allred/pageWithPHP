<?php 
    require_once("config.php"); 

    session_start();

    $user = htmlspecialchars($_POST['userName']);
    $password = htmlspecialchars($_POST['userPassword']);
    $num = 0;
    $dPassword = "";
    $userId;

    $checkUser = $db->prepare("SELECT * FROM user_login Where userName = :userName and userPassword = :userPassword");
    $checkUser->execute(array(':userName' => $user, ':userPassword' => $password));

    while ($row = $checkUser->fetch(PDO::FETCH_ASSOC)) {
        $userId = $row['id']; 
      $num++;  
    }
    
    if($num == 1) {
        $_SESSION['userName'] = $user;
        $_SESSION['userId'] = $userId;
        $_SESSION['nameNum'] = 0;
        echo "login successful";
        header('location:index.php');
    } else {
        echo "login unsuccessful";

    }
?>