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
        <form action="registrationSuccess.php" method="post">
            <label for="userName" class="labels">User name: </label>
            <input type="text" name="userName" placeholder="user name..."><br>
            <label for="email" class="labels">Email: </label>
            <input type="text" name="email" placeholder="email..."><br>
            <label for="userPassword" class="labels">Password: </label>
            <input type="text" name="userPassword" placeholder="password..."><br>
            <label for="comfirmPassword" class="labels">Comfirm password: </label>
            <input type="password" name="comfirmPassword" placeholder="comfirm password..."><br>
            <button type="submit" class="btn boy">Submit</button>

        </form>
        <br>
        
    </div>
    </center>
</body>
</html>