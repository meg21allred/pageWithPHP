<?php 
    require_once("config.php"); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
</head>
<body>
<?php

echo "<h1>Name Details</h1><br>";

$id = $_GET['id'];
   
   echo "<ul>";

   //bind id
   $girlNames = $db->prepare("SELECT * FROM boy_names WHERE id = :id");
                   $girlNames->execute(array(':id' => $id));

   //loop through ids
       while ($sRow = $girlNames->fetch(PDO::FETCH_ASSOC))
       {
           $name = $sRow["boy_name"];
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