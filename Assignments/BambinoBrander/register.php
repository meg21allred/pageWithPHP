<?php
    $nameValidation = $_GET['enteredName'];
    $emailVal = $_GET['enteredEmail'];
    $passVal = $_GET['enteredPass'];
    $comPassVal = $_GET['enteredComPass'];
    echo $comPassVal;
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
        <?php if ($nameValidation == 1){
                 echo "<p>Please Enter a user name.</p>";
                 } elseif ($nameValidation == 2) {
                     echo "<p>Name must user letters and/or numbers only.</p>";
                     } else {
                         echo "";
                     }
        ?>
            <label for="userName" class="labels">User name: </label>
            <input type="text" name="userName"><br><br>
            <?php if ($emailVal == 1){
                 echo "<p>Please Enter an email address.</p>";
                 } elseif ($emailVal == 2) {
                     echo "<p>Please Enter a correct email Address.</p>";
                     } elseif ($emailVal == 3) {
                        echo "<p>Email address is already registered.</p>";
                     } else {
                        echo "";
                     }
        ?>
            <label for="email" class="labels">Email: </label>
            <input type="text" name="email"><br><br>
            <?php if ($passVal == 1){
                 echo "<p>Please enter password.</p>";
                 } elseif ($passVal == 2) {
                     echo "<p>Password must be at least 8 Characters long.</p>";
                     } elseif ($passVal == 3) {
                        echo "<p>Password must contain at least one upper-case letter, one lower-case letter and one number in any order.</p>";
                     } else {
                        echo "";
                     }
        ?>
            <label for="userPassword" class="labels">Password: </label>
            <input type="password" name="userPassword"><br><br>
            <?php if ($comPassVal == 1){
                 echo "<p>Please confirm password.</p>";
                 } elseif ($comPassVal == 2) {
                     echo "<p>Passwords do not match. Please try again.</p>";
                     } else {
                         echo "";
                     }
        ?>
            <label for="comfirmPassword" class="labels">Comfirm password: </label>
            <input type="password" name="comfirmPassword"><br><br>
            <button type="submit" class="btn boy">Submit</button>

        </form>
        <br>
        
    </div>
    </center>
</body>
</html>