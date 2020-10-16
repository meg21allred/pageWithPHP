<?php 
    require_once("config.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Girl Names</title>
</head>
<body>
<h1>Girl Names</h1>
<input type="button" onClick="location.href='index.php'" value="Home">
<?php
  
     //get id variable
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
                $gId = $sRow["id"];

                echo "<li>";
                echo "<strong>$name</strong>: ";
                echo "<a href='details.php?id=$gId'>Name Details</a>";
                echo "</li>";
                    
               
            }

        echo "</ul>";

    ?>


    <!-- maybe add an add to list button for names you like? -->
    <input type="button" onClick="location.href='girl.php?id=<?php if ($id < 10) { echo $id+1; } else {$id = 1; echo $id;} ?>'" value="next">
    
</body>
</html>