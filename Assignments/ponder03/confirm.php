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

    $host = "ec2-3-224-97-209.compute-1.amazonaws.com";
    $user = "rxghsggtzmiezw";
    $password = "c2b6fe631e6453416ef8514e024fba6323e9274d3cd433dc0d6d1cb3aad789a9";
    $dbname = "d9cllninl3psq3";
    $port = "5432";

    $db_connection = pg_connect("host=$host dbname=$dbname user=$user password=$password")
    or die ("Could not connect to server\n");


        $first = $_GET['first_name'];
        $last = $_GET['last_name'];
        $street = $_GET['street'];
        $city = $_GET['city'];
        $state = $_GET['state'];
        $zip = $_GET['zip'];

        echo "<h1>Thank you " . $first . " " . $last . "!</h1>";
        echo "<h2>Your order of:</h2>";
        
        
            echo "<table>
                <tr>
                    <td>Item</td>
                    <td></td>
                    <td>Quantity</td>
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
                    <td>$val</td>
                ";
            } //for each loop
        
        echo "<tr>
                    <td colspan='4'>Grand Total: $ $grand</td>
              </tr>";
        echo "</table>";
        
        
        
        
        echo "<br><h2>will be sent to: " . 
            $street . ", " . $city . ", " . $state . " " . $zip . "</h2>";

            session_unset();
    ?>
</body>
</html>
