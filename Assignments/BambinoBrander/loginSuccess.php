<?php 
    require_once("config.php"); 

    session_start();

    require_once("config.php"); 

    $user = $_POST['userName'];
    $password = $_POST['userPassword'];
    $num = 0;
    $dPassword = "";

    $checkUser = $db->prepare("SELECT * FROM user_login Where userName = :userName");
    $checkUser->execute(array(':userName' => $user));

    while ($row = $checkUser->fetch(PDO::FETCH_ASSOC)) {
        
        $dPassword = $row["userPassword"];
        $dUser = $row["userName"];
        echo "userName: " . $dUser . " UserPassword: " . $dPassword;
        if ($password == $dPassword){
            $num++;
        }
        
    }
echo "dpassword: " . $dPassword . " password: " . $password;

    if($num == 1) {
        $_SESSION['userName'] = $user;
        echo "login successful";
        header('location:index.php');
    } else {
        echo "login unsuccessful";

    }
?>