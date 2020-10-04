<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse</title>
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
                    <a href="cart.php"><li>VIEW CART</li></a>
                    <?php echo "<a href='ponder03.php?clear=1'><li>CLEAR CART</li><a>"; ?>
                    </ul>
            
                </div>
            
        </div>
</div>

<?php
SESSION_START();

if(!(isset($_SESSION['cart']))) {
    $_SESSION['cart'];
} // end of session cart if

if(isset($_GET['clear'])) {
    $_SESSION['cart'] = array();
}//clear the cart

$out = "";

//adding to cart
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $quan = $_GET['quan'];

    if($quan > 0 && filter_var($quan, FILTER_VALIDATE_INT)) {
        if(isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] = $quan;
            
        } else {
            $_SESSION['cart'][$id] = $quan;
        } // checking if item is already in cart
    } else {
        $out = "Please add a whole number to the cart";
    } // checks for bad input
    
}

$host = "ec2-3-224-97-209.compute-1.amazonaws.com";
$user = "rxghsggtzmiezw";
$password = "c2b6fe631e6453416ef8514e024fba6323e9274d3cd433dc0d6d1cb3aad789a9";
$dbname = "d9cllninl3psq3";
$port = "5432";

$db_connection = pg_connect("host=$host dbname=$dbname user=$user password=$password")
or die ("Could not connect to server\n");

$query = "SELECT * FROM saleItems";

$result = pg_query($db_connection, $query) or die("Cannot execute query: $query \n");


echo "<table>
        <tr>
            <td>Item</td>
            <td></td>
            <td>Price</td>
            <td>Quantity</td>
            <td></td>
            </tr>";

echo "$out";
while ($row = pg_fetch_assoc($result)) {

   echo "
    <tr>
        <td>
            {$row['item']}
        </td>
        <td> <image src='{$row['image']}' width='150px'> </td>
        <td> $ {$row['price']}</td>
        <td>
            <form action='{$_SERVER['PHP_SELF']}'}>
                <input type='text' name='quan' id='quan'>
                <input type='hidden' name='id' id='id' value='{$row['id']}'>
                <input type='submit' value='Add to Cart'>
            </form>
        </td>
    </tr>
    ";
}
echo "</table>";


pg_close($db_connection);
       
?>
</body>
</html>






