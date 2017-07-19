<?php
include_once('functions.php');

function printTable($conn, $advancedsearch, $title){

	 	    $result = mysqli_query($conn, $advancedsearch);

	    	    if (mysqli_num_rows($result) == 0){
	   	     exit ("error");
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

	 case "makes":
	    $advancedsearch ="select Manufacturer from makers natural join makes natural join product where productname = '".$_POST['advanced_keyword']."'" ;
	    $title = "Manufacturer";
	    printTable($conn, $advancedsearch, $title);
	    break;

	case "sells":
	     $advancedsearch = "select storename from Store natural join carries where carries.pid = (select pid from product where productname = '".$_POST['advanced_keyword']."')";
	     $title = "Store";
	     printTable($conn, $advancedsearch, $title);

	     break;

	     case "works in":

	     $advancedsearch ="select employeename from Employee where storeid = (select storeid from Store where storename ='".$_POST['advanced_keyword']."')";
	     $title = "Employee(s)";
	      printTable($conn, $advancedsearch, $title);
	      

	     break;
	     	     
	     case "expires":
	     $advancedsearch ="select productname from product where pid in (select pid from Expires where exp_date ='".$_POST['advanced_keyword']."')";
	      $title = "Product(s) that expire on ".$_POST['advanced_keyword'].":";
	      printTable($conn, $advancedsearch, $title);
	    
	     break;

	     case "on":
	     $advancedsearch = "select customername as 'Customer', productname as 'Product', quantity as 'Quantity', storename as 'Store' from Store, (select customername, productname, customerbought.quantity as 'quantity', date, storeid from product, (select customername, buy.quantity, pid, storeid, date from buy natural join Customer where date = '".$_POST['advanced_keyword']."') as customerbought where product.pid = customerbought.pid) as transactioninfo where Store.storeid = transactioninfo.storeid";
	      $title = "Transaction(s) on ".$_POST['advanced_keyword'].":";
	      printTable($conn, $advancedsearch, $title);


	     break;

	     case "before":
	     $advancedsearch = "select date as 'Date', customername as 'Customer', productname as 'Product', quantity as 'Quantity', storename as 'Store' from Store, (select customername, productname, customerbought.quantity as 'quantity', date, storeid from product, (select customername, buy.quantity, pid, storeid, date from buy natural join Customer where date < '".$_POST['advanced_keyword']."') as customerbought where product.pid = customerbought.pid) as transactioninfo where Store.storeid = transactioninfo.storeid";
	     
  $title = "Transaction(s) before ".$_POST['advanced_keyword'].":";
	      printTable($conn, $advancedsearch, $title);


	     break;

	     case "on_before":
	     	     $advancedsearch = "select date as 'Date', customername as 'Customer', productname as 'Product', quantity as 'Quantity', storename as 'Store' from Store, (select customername, productname, customerbought.quantity as 'quantity', date, storeid from product, (select customername, buy.quantity, pid, storeid, date from buy natural join Customer where date <= '".$_POST['advanced_keyword']."') as customerbought where product.pid = customerbought.pid) as transactioninfo where Store.storeid = transactioninfo.storeid";
	     
  $title = "Transaction(s) before ".$_POST['advanced_keyword'].":";
	      printTable($conn, $advancedsearch, $title);


	     break;

}


	    


mysqli_close($conn);
	

	
}



?>
