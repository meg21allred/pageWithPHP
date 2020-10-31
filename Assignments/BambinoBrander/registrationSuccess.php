<?php 
    session_start();

    require_once("config.php"); 

    $user = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['userPassword'];
    $num = 0;
    $nameValidation = "/^[a-zA-Z0-9]*$/";


//Validate username
    if ($user == NULL) {
        header('location:register.php?enteredName=1');
        return;
    } elseif (!preg_match($nameValidation, $user)) {
        header('location:register.php?enteredName=2');
        return;
    }

    //Validate user email
    if ($email == NULL) {
        header('location:register.php?enteredEmail=1');
        return;
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('location:register.php?enteredEmail=2');
        return;
    }

    $checkEmail = $db->prepare("SELECT email FROM user_login Where email = :email");
    $checkEmail->execute(array(':email' => $email));

    while ($row = $checkEmail->fetch(PDO::FETCH_ASSOC)) {
        $num++;
    }
    if($num > 0) {
        header('location:register.php?enteredEmail=3');
        return;
    } else {
        $reg = $db->prepare("INSERT INTO user_login(userName, userPassword, email) 
                            VALUES (:userName, :userPassword, :email)");
        $reg->execute(array(':userName' => $user, 'userPassword' => $password, ':email' => $email));

        echo "registration successful!" . $user . " " . $email . " " . $password;
        
       header('location:login.php');
    }
  
?>