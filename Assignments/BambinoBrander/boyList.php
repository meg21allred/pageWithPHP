<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boy Names</title>
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
            
            echo "<ul>";

        foreach ($db->query("SELECT * FROM boy_names") as $row)
        {
        echo "<li>";
        echo "<strong>" . $row['boy_name'] . "</strong> " . "<br>     Definition: " . $row['def'] . "<br>     Origin: " . $row['origin'];
        echo "</li>";
        }

        echo "</ul>";

    ?>
</body>
</html>