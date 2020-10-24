<?php
    require_once("config.php"); 
    session_start();
    $userName = $_SESSION['userName'];
    $userId = $_SESSION['userId'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bambino Brander</title>
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

    <ol>
    <?php
    
    if(isset($_SESSION['userName'])) {
        $list = $db->prepare("SELECT picked_name FROM picked_names WHERE login_id = :login_id");
        $list->execute(array(':login_id' => $userId));
       
        while ($row = $list->fetch(PDO::FETCH_ASSOC)) {
        echo "<li>" . $row['picked_name'] . "</li>";
        }
    } else {
        header('location:login.php');
    }
     
         
     

    ?>
    
    </ol>

    </body>
</html>