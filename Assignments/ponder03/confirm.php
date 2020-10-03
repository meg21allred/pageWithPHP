<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "this is the confirmation page.";

        $first = $_GET['first_name'];
        $last = $_GET['last_name'];
        $street = $_GET['street'];
        $city = $_GET['city'];
        $state = $_GET['state'];
        $zip = $_GET['zip'];

        echo "<h1>Thank you " . $first . " " . $last . "!</h1>";
        echo "<h2>Your order will be sent to: " . 
            $street . ", " . $city . ", " . $state . $zip . "</h1>";

    ?>
</body>
</html>
