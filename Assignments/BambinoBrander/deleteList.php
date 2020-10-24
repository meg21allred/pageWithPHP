<?php
    require_once("config.php"); 
    session_start();
    $userName = $_SESSION['userName'];
    $userId = $_SESSION['userId'];

    echo "user id: " . $userId;

    $deleteList = $db->prepare("DELETE FROM picked_names WHERE login_id = :login_id");
    $deleteList->execute(array(':login_id' => $userId));

    //header('Location: ' . $_SERVER['HTTP_REFERER']);

?>