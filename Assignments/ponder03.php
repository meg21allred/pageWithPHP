
    <?php

$host = "ec2-3-224-97-209.compute-1.amazonaws.com";
$user = "rxghsggtzmiezw";
$password = "c2b6fe631e6453416ef8514e024fba6323e9274d3cd433dc0d6d1cb3aad789a9";
$dbname = "d9cllninl3psq3";
$port = "5432";

$db_connection = pg_connect("host=$host dbname=$dbname user=$user password=$password");

$result = pg_query($db_connection, "SELECT * FROM saleItems");

echo $result;
echo "is it working?";
echo "<br>";
echo "<table>";
while($row = pq_fetch_row($result)) {
    echo " $row[0] $row[1] $row[2] $row[3] \n";
}
    // <tr>
    //     <td>
    //         {$row['name']}
    //     </td>
    //     <td> $ {$row['price']}</td>
    //     <td>
    //         <form action='{$_SERVER['PHP_SELF']}'}>
    //             <input type='text' name='quan' id='quan'>
    //             <input type='hidden' name='id' id='id' value='{$row['id']}'>
    //             <input type='sumbit' value='Add to Cart'>
    //         </form>
    //     </td>
    // </tr>


    echo "</table>";

?>





