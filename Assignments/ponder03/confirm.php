<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
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
                    </ul>
            
                </div>
            
        </div>
</div>
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


        $first = htmlspecialchars($_GET['first_name']);
        $last = htmlspecialchars($_GET['last_name']);
        $street = htmlspecialchars($_GET['street']);
        $city = htmlspecialchars($_GET['city']);
        $state = htmlspecialchars($_GET['state']);
        $zip = htmlspecialchars($_GET['zip']);

        echo "<center>";
        echo "<div class='table_div'>";

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
echo '</div>';
echo '</center>';

            session_unset();
    ?>
</body>
</html>
