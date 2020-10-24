<?php 
    require_once("config.php"); 
    session_start();
    $userName = $_SESSION['userName'];
    $id = $_GET['id'];
    $userId = $_SESSION['userId'];
    $name;
    
    if (isset($_SESSION['userName'])) {
        $getName = $db->prepare("SELECT boy_name FROM boy_names WHERE id = :id");
        $getName->execute(array(':id' => $id));
        while ($row = $getName->fetch(PDO::FETCH_ASSOC)) {
            $name = $row['boy_name'];
        }

        $insert = $db->prepare("INSERT INTO picked_names(picked_name, login_id) VAlUES (:picked_name, :login_id)");
        $insert->execute(array(':picked_name' => $name, ':login_id' => $userId));

        echo "Name: " . $name . " " . "user id: " . $userId . "<br><br><br>";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        header('location:login.php');
    }

    echo "name id: " . $id; 
    echo "<br> user name: " . $userName . "<br>";
    echo "this is the addname page";
?>