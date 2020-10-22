<?php 
    require_once("config.php"); 

    $user = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['userPassword'];
    $num = 0;

    $checkEmail = $db->prepare("SELECT email FROM user_login Where email = :email");
    $checkEmail->execute(array(':email' => $email));

    while ($row = $checkEmail->fetch(PDO::FETCH_ASSOC)) {
        $num++;
    }

    echo $num;

    if($num > 0) {
        echo "user name already taken";
    } else {
        $reg = $db->prepare("INSERT INTO user_login(userName, userPassword, email) 
                            VALUES (:userName, :userPassword, :email)");
        $reg->execute(array(':userName' => $user, 'userPassword' => $password, ':email' => $email));

        echo "registration successful!" . $user . " " . $email . " " . $password;
    }
  
?>