<?php 
    require_once("config.php"); 
    session_start();


    if ($_SESSION['userName'] == NULL) {
        header('location:login.php');
    }
?>


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
                    <a href="showNames.php"><li>LIST</li></a>
                    <a href="enterCompareLogin.php"><li>COMPARE LISTS</li></a>
                    <a href="index.php"><li>HOME</li></a>
                    </ul>
            
                </div>
            
        </div>
    </div>
    <br><br><br><br><br>
    <center>
    
    <h1 class="title">Enter user Name and email of who you would like to compare:</h1>
    <br>
    <div class='userForm'>
    <form action="compare.php" method="post">
        <label for="userName" class="labels">Enter user name: </label>
        <input type="text" name="userName" ><br><br>
        <label for="userEmail" class="labels">Enter email address: </label>
        <input type="text" name="userEmail"><br><br>
        <button type="submit" class="btn boy">Submit</button>
    </form>
    </div>
    


    </center>
    </body>
</html>