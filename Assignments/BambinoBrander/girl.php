<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Girl Names</title>
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
        echo "<h1>Girl Names</h1><br>";
        
     
       $id = $_GET['id'];

        echo $id;

       
        echo "<ul>";

        $girlNames = $db->prepare("SELECT * FROM girl_names WHERE id = :id");
                        $girlNames->execute(array(':id' => $id));

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

        




    // foreach ($db->query("SELECT * FROM girl_names") as $row)
    // {
    // echo "<li>";
    // echo "<strong>" . $row['girl_name'] . "</strong> " . "<br>     Definition: " . $row['def'] . "<br>     Origin: " . $row['origin'];
    // echo "</li>";
    // }

    // echo "</ul>";

    ?>

    <input type="button" onClick="location.href='girl.php?id=<?php echo $id+1; ?>'" value="next">
    
</body>
</html>