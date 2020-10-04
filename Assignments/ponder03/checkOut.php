<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="ponder03.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 
</head>
<body>
<div class="header">
        <div class="inner_header">
            <div class="logo_container"><h1>MY<span>BABIES</span></h1></div>
                <div>
                    <ul class="nav">
                    <a href="ponder03.php"><li>HOME</li></a>
                    <a href="cart.php"><li>RETURN TO CART</li></a>
                    </ul>
            
                </div>
            
        </div>
</div>
    <?php
    SESSION_START();

    
    ?>

    <center>
    <div class="user_div">
    <span class="form_span"> Fill out the following information: </span><br><br>
    <form class="user_form" action='confirm.php' method="get">
        <label for="first_name">First Name: </label><input type="text" name="first_name" required><br>
        <label for="last_name"></label>Last Name: <input type="text" name="last_name"><br>
        <label for="street"></label>Street Address: <input type="text" name="street"><br>
        <label for="city"></label>City: <input type="text" name="city"><br>
        <label for="state"></label>State:<input type="text" name="state"><br>
        <label for="zip"></label>Zip Code: <input type="text" name="zip"><br><br>
        <input type="submit" value="Confirm Purchase">
    </form>
    </div>
</center>


</body>
</html>

