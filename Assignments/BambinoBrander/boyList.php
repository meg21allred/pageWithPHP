<?php 
    require_once("config.php"); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boy Names</title>
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
    <br><br><br>
    <center>
        <h1>Boy Names</h1>
        <input type="button" onClick="location.href='index.php'" value="Home">
        <?php
            
        //get id variable
        $id = $_GET['id'];
    
            echo "<ul>";

            //bind id
            $boyNames = $db->prepare("SELECT * FROM boy_names WHERE id = :id");
                            $boyNames->execute(array(':id' => $id));

            //loop through ids
                while ($sRow = $boyNames->fetch(PDO::FETCH_ASSOC))
                {
                    $name = $sRow["boy_name"];
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

    </center>

</body>
</html>