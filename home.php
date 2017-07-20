<html>
<body>
<?php

include 'main.php';
include 'functions.php';
?>


<?php
 $curr_date = getdate(date("U"));
 echo " $curr_date[weekday],  $curr_date[month],  $curr_date[mday],  $curr_date[year] ";
echo "<h2>Welcome to your grocery store database</h2>";



$conn = connection();
?>
<table>
<?php
$expiresSoon = "select exp_date as 'Expiration Date', product.pid as 'Productid', productname as 'Product', expires_soon.quantity = 'Quantity' from product, (select * from Databases_Project.Expires where exp_date between CURDATE() and DATE_ADD(CURDATE(), INTERVAL 2 week)) as expires_soon where product.pid = expires_soon.pid order by exp_date";

$result = mysqli_query($conn, $expiresSoon);

if (mysqli_num_rows($result) != 0){
   $title = "Expires Soon";
   printTable($conn, $expiresSoon, $title);

}else{
	echo "<br> No items scheduled to expire <br>";
}



?>
</table>

<br><br>
<table>
<?php


$OrderSoon= "select pid as 'Product id', productname as 'Product Name', quantity as 'Quantity', min_threshold as 'Minimum', Manufacturer from makers,(select product.pid, productname, quantity, min_threshold, mid from product, makes where product.pid = makes.pid and quantity < min_threshold) as makesprod where makesprod.mid = makers.mid";

$result = mysqli_query($conn, $OrderSoon);
if (mysqli_num_rows($result) != 0){
   $title = "Order Soon";
   printTable($conn, $OrderSoon, $title);

}else{
	echo "<br> No items below minimum <br>";
}



?>
</table>
</body></html>