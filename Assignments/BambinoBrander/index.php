<?php
session_start();
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
                    <?php if (isset($_SESSION['userName'])) {
                        echo "<a href='logout.php'><li>LOG OUT</li></a>";
                    } else {
                        echo "<a href='login.php'><li>LOG IN</li></a>";
                    }
                    ?>
                    </ul>
            
                </div>
            
        </div>
    </div>

<center>
    <br>
    <br>
    <br>
    <h1 class="blueText">Welcome!</h1>
    <img src="babyFaceIcon.svg" alt="baby face" width="300px">
    <h2 class="blueText">Choose a Gender</h2>
    
    <br>

    <input class="btn boy" type="button" value="Boy" onClick="location.href='boyList.php?id=1'">
    <input class="btn girl" type="button" value="Girl" onClick="location.href='girl.php?id=1'">
    

</center>
   
    
</body>
</html>