<?php 
    require_once("config.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="styles.css">

</head>
<body>

<div class="header">
        <div class="inner_header">
            <div class="logo_container"><h1>Bambino<span>Brander</span></h1></div>
                <div>
                    <ul class="nav">
                    <a href="index.php"><li>HOME</li></a>
                    </ul>
            
                </div>
            
        </div>
    </div>

    <br><br><br><br><br>

    <center>
        <?php


            echo "<h1 class='pinkText'>Name Details</h1><br>";

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
                    echo "<strong class='girlBabyName'>$name</strong> <br><span class='details'> Definition: $def <br> Origin: $origin</span>";
                    echo "</li>";
                        
                    
                }

            echo "</ul>";

        ?>

<br>
<form>
 <input class="btn girl" type="button" value="Back to Names" onclick="history.back()">
</form>
    </center>

</body>
</html>