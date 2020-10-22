<?php 
    require_once("config.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
    <h1>Login</h1>
    <center>
    <div>
        <form action="index.php" method="post">
            <label for="userName" class="labels">Enter user name: </label>
            <input type="text" name="userName" placeholder="user name..."><br>
            <label for="userPassword" class="labels">Enter password: </label>
            <input type="password" name="userPassword" placeholder="password..."><br>
            <button type="submit" class="btn boy">Submit</button>

        </form>
        <br>
        <label for="register">Don't have an account? </label>
        <a href="register.php" name="register" class="registerLink">Resgister here</a>
    </div>
    </center>
    
</body>
</html>