<?php 
    require_once("config.php"); 
    session_start();

    $id = $_GET['id'];
    
    echo "name id: " . $id; 
    echo "<br> user name: " . $_Session['userName'] . "<br>";
    echo "this is the addname page";
?>