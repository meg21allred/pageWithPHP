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

$host = "ec2-3-224-97-209.compute-1.amazonaws.com";
$user = "rxghsggtzmiezw";
$password = "c2b6fe631e6453416ef8514e024fba6323e9274d3cd433dc0d6d1cb3aad789a9";
$dbname = "d9cllninl3psq3";
$port = "5432";

$db_connection = pg_connect("host=$host dbname=$dbname user=$user password=$password")
or die ("Could not connect to server\n");

//$query = "SELECT * FROM saleItems";

//$result = pg_query($db_connection, $query) or die("Cannot execute query: $query \n");


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

    echo "
    <tr>
        <td>{$row['item']}</td>
        <td><image src='{$row['image']}' width='150px'></td>
        <td>{$row['price']}</td>
        <td>$val</td>
        <td>update quanity</td>
        <td>0</td>
    ";
}

echo "</table>";

echo "<a href='ponder03.php?clear=1'>Clear Cart</a>";

pg_close($db_connection);
       
?>
</body>
</html>






