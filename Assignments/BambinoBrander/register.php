<?php
    $nameValidation = $_GET['enteredName'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
    <br><br><br><br>
<center>
    <h1 class="title">Resgister</h1><br>
    <h2 class="small_title">Enter the following:</h2>
    <div>
        <form class="userForm" action="registrationSuccess.php" method="post">
        <?php if($nameValidation == 1) {echo "<p>Please Enter a user name.</p>";} elseif ($nameValidation = 2) {echo "<p>Name must user letters and/or numbers only.</p>";} ?>
            <label for="userName" class="labels">User name: </label>
            <input type="text" name="userName"><br><br>
            <label for="email" class="labels">Email: </label>
            <input type="text" name="email"><br><br>
            <label for="userPassword" class="labels">Password: </label>
            <input type="password" name="userPassword"><br><br>
            <label for="comfirmPassword" class="labels">Comfirm password: </label>
            <input type="password" name="comfirmPassword"><br><br>
            <button type="submit" class="btn boy">Submit</button>

        </form>
        <br>
        
    </div>
    </center>
</body>
</html>