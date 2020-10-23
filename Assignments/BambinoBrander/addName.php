<?php 
    require_once("config.php"); 
    session_start();
    $userName = $_SESSION['userName'];
    $id = $_GET['id'];
    
    echo "name id: " . $id; 
    echo "<br> user name: " . $userName . "<br>";
    echo "this is the addname page";
?>