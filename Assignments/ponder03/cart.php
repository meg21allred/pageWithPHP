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
       //update quantity
       $_SESSION['cart'][$id] = $quan;
    } elseif($quan == 0) {
        //remove item
        unset($_SESSION['cart'][$id]);
    } else {
        $out = "Please add a whole number to the cart";
    } // checks for bad input
}// end of isset

$host = "ec2-3-224-97-209.compute-1.amazonaws.com";
$user = "rxghsggtzmiezw";
$password = "c2b6fe631e6453416ef8514e024fba6323e9274d3cd433dc0d6d1cb3aad789a9";
$dbname = "d9cllninl3psq3";
$port = "5432";

$db_connection = pg_connect("host=$host dbname=$dbname user=$user password=$password")
or die ("Could not connect to server\n");

echo $out;
$grand = 0;
if(!empty($_SESSION['cart'])) {
    echo "<table>
        <tr>
            <td>Item</td>
            <td></td>
            <td>Price</td>
            <td>Quantity</td>
            <td></td>
            <td>SubTotal</td>
            </tr>";

    foreach ($_SESSION['cart'] as $key => $val) {
        $sql = "SELECT * FROM saleItems WHERE id = '$key'";
        $result = pg_query($db_connection, $sql) or die("cannot querey the database");
        $row = pg_fetch_assoc($result);

        $sub = $row['price']*$val;
        $grand += $sub;
        echo "
        <tr>
            <td>{$row['item']}</td>
            <td><image src='{$row['image']}' width='150px'></td>
            <td>$ {$row['price']}</td>
            <form action='cart.php' method='get'>
                <td>
                    <input value='$val' name='quan'>
                    <input type='hidden' value='$key' name='id'>
                </td>
                <td><input type='submit value='update'></td>
            </form>
            <td>$ $sub</td>
        ";
    } //for each loop

echo "<tr>
            <td colspan='4'>Grand Total: $ $grand</td>
      </tr>";
echo "</table>";
} else {
    echo "<h1>Your Cart is Empty</h1>";
} //end of if cart is not empty


echo "<a href='cart.php?clear=1'>Clear Cart</a>";

pg_close($db_connection);
       
?>
</body>
</html>


