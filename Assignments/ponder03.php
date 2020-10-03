
    <?php

$host = "ec2-3-224-97-209.compute-1.amazonaws.com";
$user = "rxghsggtzmiezw";
$password = "c2b6fe631e6453416ef8514e024fba6323e9274d3cd433dc0d6d1cb3aad789a9";
$dbname = "d9cllninl3psq3";
$port = "5432";

$db_connection = pg_connect("host=$host dbname=$dbname user=$user password=$password")
or die ("Could not connect to server\n");

$query = "SELECT * FROM saleItems";

$result = pg_query($db_connection, $query) or die("Cannot execute query: $query \n");


echo "<table>";
while ($row = pg_fetch_assoc($result)) {

   echo "
    <tr>
        <td>
            {$row['item']}
        </td>
        <td> <image src='{$row['image']}' width='100px'> </td>
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





