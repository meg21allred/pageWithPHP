<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

try
{
$dbUrl = getenv('DATABASE_URL');

$dbOpts = parse_url($dbUrl);

$dbHost = $dbOpts["host"];
$dbPort = $dbOpts["port"];
$dbUser = $dbOpts["user"];
$dbPassword = $dbOpts["pass"];
$dbName = ltrim($dbOpts["path"],'/');

$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
echo 'Error!: ' . $ex->getMessage();
die();
}
echo "<h1>Name Details</h1><br>";

$id = $_GET['id'];
   
   echo "<ul>";

   //bind id
   $girlNames = $db->prepare("SELECT * FROM girl_names WHERE id = :id");
                   $girlNames->execute(array(':id' => $id));

   //loop through ids
       while ($sRow = $girlNames->fetch(PDO::FETCH_ASSOC))
       {
           $name = $sRow["girl_name"];
           $def = $sRow["def"];
           $origin = $sRow["origin"];
           echo "<li>";
           echo "<strong>$name</strong> <br> Definition: $def <br> Origin: $origin";
           echo "</li>";
               
          
       }

   echo "</ul>";

   ?>
</body>
</html>