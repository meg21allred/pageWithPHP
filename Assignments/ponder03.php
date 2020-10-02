<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ponder03:Shopping Cart</title>
</head>
<body>
    <ul>
    <li id= 1>
    <label name="name1">Diapers</label>
    <image src="diapers.jpg" name="photo1">
    <span name="price1">9.95</span>
    <input type="hidden" value="0" name="quan1">
    </li>

    </ul>
</body>
</html>



<?php

// $host = "ec2-3-224-97-209.compute-1.amazonaws.com";
// $user = "rxghsggtzmiezw";
// $password = "c2b6fe631e6453416ef8514e024fba6323e9274d3cd433dc0d6d1cb3aad789a9";
// $dbname = "d9cllninl3psq3";
// $port = "5432";

// $db = parse_url(getenv("postgres://rxghsggtzmiezw:c2b6fe631e6453416ef8514e024fba6323e9274d3cd433dc0d6d1cb3aad789a9@ec2-3-224-97-209.compute-1.amazonaws.com:5432/d9cllninl3psq3"));
// $db["path"] = ltrim($db["path"], "/");

// // $db = pg_connect("host=ec2-3-224-97-209.compute-1.amazonaws.com
// //                   port=5432
// //                   dbname=d9cllninl3psq3
// //                   user=rxghsggtzmiezw
// //                   password=c2b6fe631e6453416ef8514e024fba6323e9274d3cd433dc0d6d1cb3aad789a9");

// $conn = pg_connect($db["path"]);

// $sql = "SELECT * FROM saleItems";
// $result = pg_query($sql);

// foreach ($result as $key) {
//     echo $key['item'] . " ";
//     echo $key['id'] . " ";
//     echo $key['quan'] . " ";
//     echo $key['price'];
// }

// echo "do you see a table?";

// class item {
//     var $id;
//     var $name;
//     var $photo;
//     var $quan;
//     var $price;

//     public function print_item() {
//         echo $this->name . " ";
//         echo "<image src='{$this->photo}' width='100px'>" . " ";
//         echo "$" . $this->price;

//     }

// }

// $item_1 = new item;
// $item_1->name = "Diapers";
// $item_1->photo = "diapers.jpg";
// $item_1->quan = 0;
// $item_1->price = "9.95";

// $item_1->print_item();

// echo "<form action='cart.php' method='post'>
//         <input value='0' name='quan1'>
//         <button type='submit'>add +</button>
//         </form>";

// $item_2 = new item;

// $item_2->name = "Onsie";
// $item_2->photo = "onsie.jpg";
// $item_2->quan = 0;
// $item_2->price = "12.95";

// $item_2->print_item();




 ?>