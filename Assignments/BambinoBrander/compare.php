<?php 
    require_once("config.php"); 
    session_start();

   echo " This is compare.php!";

    $compUser = $_POST['userName'];
    $compEmail = $_POST['userEmail'];
    $compData = array();
    $userId = $_SESSION['userId'];
    $compUserId;
    $userData = array();
    $num;

    echo $compUser . " " . $compEmail; 
    $checkCompUser = $db->prepare("SELECT * FROM user_login WHERE username = :userName AND email = :userEmail");
    $checkCompUser->execute(array(':userName' => $compUser, ':userEmail' => $compEmail));

    while ($row = $checkCompUser->fetch(PDO::FETCH_ASSOC)) {
         $compUserId = $row['id']; 
         $num++;  
    }

    echo $num;
    echo "<br> " . $compUserId;
    if($num == 1) {
        echo "user found";

        $getCompUserList = $db->prepare("SELECT picked_name FROM picked_names WHERE login_id = :compUserId");
        $getCompUserList->execute(array(':compUserId' => $compUserId));

        echo "<ul>";
        while ($row = $getCompUserList->fetch(PDO::FETCH_ASSOC)) {
            echo "<li class='nameList'>- " . $row['picked_name'] . "</li>";
            $compData[] = $row;
            }
        echo "</ul><br><br>";

        echo "<ul>";
        foreach ($compData as $data) {
            echo "<li class='nameList'>- " . $data['picked_name'] . "</li>";;
        }
        echo "</ul?";
      
        $getUserList = $db->prepare("SELECT picked_name FROM picked_names WHERE login_id = :compUserId");
        $getUserList->execute(array(':compUserId' => $userId));

        while ($row = $getUserList->fetch(PDO::FETCH_ASSOC)) {
            echo "<li class='nameList'>- " . $row['picked_name'] . "</li>";
            $userData[] = $row;
            }
        echo "</ul><br><br>";
    } else {
        echo "user not found, please try again.";
        echo '<input class="btn boy" type="button" value="try again" onClick="location.href=enterCompareLogin.php">';

    }
?>


