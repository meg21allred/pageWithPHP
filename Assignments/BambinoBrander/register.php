<?php 
    require_once("config.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
<center>
    <h1>Resgister</h1>
    <h2>Enter the following:</h2>
    <div>
        <form action="index.php" method="post">
            <label for="userName" class="labels">User name: </label>
            <input type="text" name="userName" placeholder="user name..."><br>
            <label for="email" class="labels">Email: </label>
            <input type="text" name="email" placeholder="email..."><br>
            <label for="userPassword" class="labels">Password: </label>
            <input type="text" name="userName" placeholder="password..."><br>
            <label for="comfirmPassword" class="labels">Comfirm password: </label>
            <input type="password" name="comfirmPassword" placeholder="comfirm password..."><br>
            <button type="submit" class="btn boy">Submit</button>

        </form>
        <br>
        <label for="register">Don't have an account? </label>
        <a href="register.php" name="register" class="registerLink">Resgister here</a>
    </div>
    </center>
</body>
</html>