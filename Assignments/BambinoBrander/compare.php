<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boy Names</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="header">
        <div class="inner_header">
            <div class="logo_container"><h1>Bambino<span>Brander</span></h1></div>
                <div>
                    <ul class="nav">
                    <a href="index.php"><li>HOME</li></a>
                    </ul>
            
                </div>
            
        </div>
    </div>
    <br><br><br><br><br>
    <center>
        <h1 class="blueText">Matched Names</h1>
        <br><br>


<?php 
    require_once("config.php"); 
    session_start();

    $compUser = $_POST['userName'];
    $compEmail = $_POST['userEmail'];
    $compData = array();
    $userId = $_SESSION['userId'];
    $compUserId;
    $userData = array();
    $num;

    //check to see if the comp user exsists
    $checkCompUser = $db->prepare("SELECT * FROM user_login WHERE username = :userName AND email = :userEmail");
    $checkCompUser->execute(array(':userName' => $compUser, ':userEmail' => $compEmail));

    while ($row = $checkCompUser->fetch(PDO::FETCH_ASSOC)) {
         $compUserId = $row['id']; 
         $num++;  
    }

    if($num == 1) {
        echo "user found";

        //user exists, save comp user names into array
        $getCompUserList = $db->prepare("SELECT picked_name FROM picked_names WHERE login_id = :compUserId");
        $getCompUserList->execute(array(':compUserId' => $compUserId));

        while ($row = $getCompUserList->fetch(PDO::FETCH_ASSOC)) {
            $compData[] = $row['picked_name'];
            }
       
        //same logged in users list into an array
        $getUserList = $db->prepare("SELECT picked_name FROM picked_names WHERE login_id = :compUserId");
        $getUserList->execute(array(':compUserId' => $userId));

        while ($row = $getUserList->fetch(PDO::FETCH_ASSOC)) {
            $userData[] = $row['picked_name'];
            }

        //find matches in the users lists
        $matchedNames = array_intersect($userData, $compData);
      
        echo "Matches: <ul>";
        foreach ($matchedNames as $matches) {
            echo "<li class='nameList'>- " . $matches . "</li>";;
        }
       

    } else {
        echo "user not found, please try again.";
        echo '<input class="btn boy" type="button" value="try again" onClick="location.href=enterCompareLogin.php">';

    }
?>
    </center>
</body>
</html>
