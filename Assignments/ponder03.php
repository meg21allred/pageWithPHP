<?php

$host = "ec2-3-224-97-209.compute-1.amazonaws.com";
$user = "rxghsggtzmiezw";
$password = "c2b6fe631e6453416ef8514e024fba6323e9274d3cd433dc0d6d1cb3aad789a9";
$dbname = "d9cllninl3psq3";
$port = "5432";

$db = parse_url(getenv("postgres://rxghsggtzmiezw:c2b6fe631e6453416ef8514e024fba6323e9274d3cd433dc0d6d1cb3aad789a9@ec2-3-224-97-209.compute-1.amazonaws.com:5432/d9cllninl3psq3"));
$db["path"] = ltrim($db["path"], "/");

// $db = pg_connect("host=ec2-3-224-97-209.compute-1.amazonaws.com
//                   port=5432
//                   dbname=d9cllninl3psq3
//                   user=rxghsggtzmiezw
//                   password=c2b6fe631e6453416ef8514e024fba6323e9274d3cd433dc0d6d1cb3aad789a9");

$sql = "SELECT * FROM saleItems";
$result = pg_query($sql);

foreach ($result as $key) {
    echo $key['item'] . " ";
    echo $key['id'] . " ";
    echo $key['quan'] . " ";
    echo $key['price'];
}


 ?>