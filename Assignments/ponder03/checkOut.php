<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    SESSION_START();

    echo "This is the checkout page";
    ?>

    <div>
    <span>Fill out the following information: </span><br><br>
    <form action="confirm.php" method="get">
        <label for="first_name">First Name: </label><input type="text" name="first_name"><br>
        <label for="last_name"></label>Last Name: <input type="text" name="last_name"><br>
        <label for="street"></label>Street Address: <input type="text" name="street"><br>
        <label for="city"></label>City: <input type="text" name="city"><br>
        <label for="state"></label>State:<input type="text" name="state"><br>
        <label for="zip"></label>Zip Code: <input type="text" name="zip"><br>
        <input type="submit" value="Confirm Purchase">
    </form>
    </div>


</body>
</html>

