<?php
include_once('functions.php');

function printTable($conn, $advancedsearch, $title){

	 	    $result = mysqli_query($conn, $advancedsearch);

	    	    if (mysqli_num_rows($result) == 0){
	   	     exit ("<br> Could not find {$title}<br>");
	    	     }

$counter = 0;
$size = 0;
	
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	    {

	    if ($counter == 0)
	    {
	     $size= sizeof($row);	     
	     print "<th colspan=$size>".$title.'</th>';
	     print '<tr>';
	     }

	if ($counter == 0 && $size > 1){	

		foreach ($row as $key => $val){
	    if (!empty($key))    
	   	 print  '<td>'.$key.'</td>';
	
		
	    
	    }
	    print '<tr>';
}
	    
	    	    foreach ($row as $key => $val){
	    if (!empty($val))    
	   	 print  '<td>'.$val.'</td>';
	
		 }
	    print '</tr>';

	    $counter++;

}}


function advancedSearch($option){
	 $conn = connection();

	 switch($option){

	 //--------------------------Who makes-----------------------------------------------
	 case "makes":
	    $advancedsearch ="select Manufacturer from makers natural join makes natural join product where productname = '".$_POST['advanced_keyword']."'" ;
	    $title = "Manufacturer";
	    printTable($conn, $advancedsearch, $title);
	    break;
//-----------------------------------Who Sells------------------------------------
	case "sells":
	     $advancedsearch = "select storename from Store natural join carries where carries.pid = (select pid from product where productname = '".$_POST['advanced_keyword']."')";
	     $title = "Store";
	     printTable($conn, $advancedsearch, $title);

	     break;
//----------------------------------who works in---------------------------------------
	     case "works in":

	     $advancedsearch ="select employeename from Employee where storeid = (select storeid from Store where storename ='".$_POST['advanced_keyword']."')";
	     $title = "Employee(s)";
	      printTable($conn, $advancedsearch, $title);
	      

	     break;

//----------------------------------expires on--------------------------------------------
	     	     
	     case "expires":
	     $advancedsearch ="select productname from product where pid in (select pid from Expires where exp_date ='".$_POST['advanced_keyword']."')";
	      $title = "Product(s) that expire on ".$_POST['advanced_keyword'].":";
	      printTable($conn, $advancedsearch, $title);
	    
	     break;
//-----------------------------------transactions on------------------------------------
	     case "on":
	     $advancedsearch = "select customername as 'Customer', productname as 'Product', quantity as 'Quantity', storename as 'Store' from Store, (select customername, productname, customerbought.quantity as 'quantity', date, storeid from product, (select customername, buy.quantity, pid, storeid, date from buy natural join Customer where date = '".$_POST['advanced_keyword']."') as customerbought where product.pid = customerbought.pid) as transactioninfo where Store.storeid = transactioninfo.storeid";
	      $title = "Transaction(s) on ".$_POST['advanced_keyword'].":";
	      printTable($conn, $advancedsearch, $title);


	     break;

//------------------------------------transactions before-----------------------------------

	     case "before":
	     $advancedsearch = "select date as 'Date', customername as 'Customer', productname as 'Product', quantity as 'Quantity', storename as 'Store' from Store, (select customername, productname, customerbought.quantity as 'quantity', date, storeid from product, (select customername, buy.quantity, pid, storeid, date from buy natural join Customer where date < '".$_POST['advanced_keyword']."') as customerbought where product.pid = customerbought.pid) as transactioninfo where Store.storeid = transactioninfo.storeid";
	     
  $title = "Transaction(s) before ".$_POST['advanced_keyword'].":";
	      printTable($conn, $advancedsearch, $title);


	     break;

//--------------------------------------transactions on or before---------------------------------

	     case "on_before":
	     	     $advancedsearch = "select date as 'Date', customername as 'Customer', productname as 'Product', quantity as 'Quantity', storename as 'Store' from Store, (select customername, productname, customerbought.quantity as 'quantity', date, storeid from product, (select distinct tid, customername, buy.quantity, pid, storeid, date from buy natural join Customer where date <= '".$_POST['advanced_keyword']."') as customerbought where product.pid = customerbought.pid) as transactioninfo where Store.storeid = transactioninfo.storeid";
	     
  $title = "Transaction(s) before ".$_POST['advanced_keyword'].":";
	      printTable($conn, $advancedsearch, $title);


	     break;
	     
//-----------------------------------------all products within a category
	     case "products":
	     $advancedsearch = "select pid as 'Product id', productname as 'Product Name' from product natural join Category where catname = '".$_POST['advanced_keyword']."'";
	       $title = "Products in ".$_POST['advanced_keyword'].":";
	      printTable($conn, $advancedsearch, $title);

	     break;

//-------------------------profit calculations---------------------

case "profitbyproduct":

$prodprofit ="select productname, sum(buy.quantity) as 'summation', unit_cost, unit_price from product, buy where product.pid = buy.pid and productname = '".$_POST['product_profit']."' group by buy.pid";

$result = mysqli_query($conn, $prodprofit);

if (mysqli_num_rows($result) == 0)
{
  exit ("could not calculate profit");	
}

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$profit = ($row['unit_price'] - $row['unit_cost'])*$row['summation'];
print '<br><br><br><td> Profit for '.$row['productname'].' is : $'.$profit.'<td><br>';

break;

case "profitbyall":

$profitAll ="select product.pid, productname, sum(buy.quantity) as 'summation', unit_cost, unit_price from product, buy where product.pid = buy.pid group by buy.pid";

$result = mysqli_query($conn, $profitAll);

if (mysqli_num_rows($result) == 0)
{
  exit ("could not calculate profit");	
}

$sumofprofit = 0;
echo '<br><br><br>';
print '<th colspan="2"> Profit </th>';
print '<tr><td>Product Name </td><td>Product Profit</td></tr>';

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

$profit = ($row['unit_price'] - $row['unit_cost'])*$row['summation'];
$sumofprofit += $profit;

print '<tr><td>'.$row['productname'].'</td><td> $'.$profit.'</td></tr>';

}//end of while loop


print '<tr><td colspan="2"> Total Product Profit is: $'.$sumofprofit.'</td></tr>';

break;
	     

}


	    


mysqli_close($conn);
	

	
}



?>
