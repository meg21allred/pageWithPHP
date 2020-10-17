<?php 
    require_once("config.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Girl Names</title>
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
    <h1 class="pinkText">Girl Names</h1>

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
                echo "<strong class='girlBabyName'>$name</strong>: ";
                echo "<br>";
                echo "<a class='detailsLink' href='details.php?id=$gId'>Name Details</a>";
                echo "</li>";
                    
               
            }

        echo "</ul>";

    ?>

    <br><br>

    <!-- maybe add an add to list button for names you like? -->
    <input class="btn girl" type="button" onClick="location.href='girl.php?id=<?php if ($id < 10) { echo $id+1; } else {$id = 1; echo $id;} ?>'" value="next">

    </center>
    
</body>
</html>