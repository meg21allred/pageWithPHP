
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <h1 class="title">Log in</h1><br>
        <div class='userForm'>
            <form action="loginSuccess.php" method="post">
                <label for="userName" class="labels">Enter user name: </label>
                <input type="text" name="userName" ><br><br>
                <label for="userPassword" class="labels">Enter password: </label>
                <input type="password" name="userPassword"><br><br>
                <button type="submit" class="btn boy">Submit</button>
    
            </form>
            <br>
            <label for="register">Don't have an account? </label>
            <a href="register.php" name="register" class="registerLink">Resgister here</a>
        </div>
        </center>
</body>
</html>