<?php
// Connecting, selecting database
$db = parse_url(getenv("postgres://rxghsggtzmiezw:c2b6fe631e6453416ef8514e024fba6323e9274d3cd433dc0d6d1cb3aad789a9@ec2-3-224-97-209.compute-1.amazonaws.com:5432/d9cllninl3psq3"));
$db["path"] = ltrim($db["path"], "/");

// Performing SQL query
$query = 'SELECT * FROM saleItems';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

// Printing results in HTML
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);
?>