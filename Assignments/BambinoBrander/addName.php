<?php 
    require_once("config.php"); 
    session_start();
    $userName = $_SESSION['userName'];
    $id = $_GET['id'];
    $userId = $_SESSION['userId'];
    $name;
    $checkForName;
    
    echo "name id: " . $id;
    echo "<br>";

    if (isset($_SESSION['userName'])) {
        $getName = $db->prepare("SELECT boy_name FROM boy_names WHERE id = :id");
        $getName->execute(array(':id' => $id));
        while ($row = $getName->fetch(PDO::FETCH_ASSOC)) {
            $name = $row['boy_name'];
        }

        $checkName = $db->prepare("SELECT picked_name FROM picked_names WHERE picked_name = :picked_name AND login_id = :login_id");
        $checkName->execute(array(':picked_name' => $name, 'login_id' => $userId));
        while ($row = $checkName->fetch(PDO::FETCH_ASSOC)) {
            $checkForName = $row['picked_name'];
        }
       echo "name: " . $name . " " . "checked name: " . $checkForName;

        if($checkForName != $name){
            $insert = $db->prepare("INSERT INTO picked_names(picked_name, login_id) VAlUES (:picked_name, :login_id)");
            $insert->execute(array(':picked_name' => $name, ':login_id' => $userId));
        } 
        
       //header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        header('location:login.php');
    }

   
?>