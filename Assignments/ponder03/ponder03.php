<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="cart.php">View cart</a>
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
            $_SESSION['cart'][$id] += $quan;
        } else {
            $_SESSION['cart'][$id] = $quan;
        } // checking if item is already in cart
    } else {
        $out = "Please add a whole number to the cart";
    } // checks for bad input
}

echo "<pre>";
print_r($_SESSION['cart']);
echo "</pre>";

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

echo "<a href='ponder03.php?clear=1'>Clear Cart</a>";

pg_close($db_connection);
       
?>
</body>
</html>






