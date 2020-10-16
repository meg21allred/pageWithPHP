<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boy Names</title>
</head>
<body>
<h1>Boy Names</h1>
<input type="button" onClick="location.href='index.php'" value="Home">
    <?php
        // connect to database
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
        
     //get id variable
       $id = $_GET['id'];
   
        echo "<ul>";

        //bind id
        $boyNames = $db->prepare("SELECT * FROM boy_names WHERE id = :id");
                        $boyNames->execute(array(':id' => $id));

        //loop through ids
            while ($sRow = $boyNames->fetch(PDO::FETCH_ASSOC))
            {
                $name = $sRow["girl_name"];
                $def = $sRow["def"];
                $origin = $sRow["origin"];
                $bId = $sRow["id"];

                echo "<li>";
                echo "<strong>$name</strong>: ";
                echo "<a href='boyDetails.php?id=$bId'>Name Details</a>";
                echo "</li>";
                    
               
            }

        echo "</ul>";
    ?>

    <!-- maybe add an add to list button for names you like? -->
    <input type="button" onClick="location.href='boyList.php?id=<?php if ($id < 11) { echo $id+1; } else {$id = 1; echo $id;} ?>'" value="next">

</body>
</html>