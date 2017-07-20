<?php
//Functions.php will be used to hold the functions that will be called from other scripts: connect, insert,delete, search, etc
include_once('advancedfunctions.php');

function connection(){


if(!isset($conn)){

	 $DB_SERVER = 'localhost';
	 $DB_USER = 'root';
	 $DB_PASSWORD = "3624Leno";//{$_POST['pwd']}");
	 $_SESSION["DB"]= 'Databases_Project';

	 
	$conn = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASSWORD, 'Databases_Project');
	if($conn) { $_SESSION["connection"] = $conn;
	return $conn;
	}
	else{ exit("Unable to connect to DB");}
	
	}

}//function connection() 



function insert($table){          
	 $conn = connection();//$_SESSION["connection"];

//------------------------insert into product table----------------------------

			if ($table == "product"){
			

		$pid = "SELECT pid,quantity FROM product where productname ='".$_POST['productname']."'";
		$result2 = mysqli_query($conn, $pid);
		$pidrow = mysqli_fetch_array($result2, MYSQLI_ASSOC);			    
		
		if ( !empty($pidrow))//product already exists in the table
		{
		
		$_POST['pid'] = $pidrow['pid'];	
		carries($pidrow['pid'], $_POST['store'], $conn, $_POST['quantity']);		echo $_POST['exp_date'];
		 if (!empty($_POST['exp_date']))
		addexpiration($conn, $_POST['quantity'], $_POST['exp_date'], $pidrow['pid']);
		$_POST['quantity'] += $pidrow['quantity'];
		
		
		update($table);
		

		
		}else{ //new product
 
		  $cat = $_POST['cat'];
		  $catquery = "SELECT cid FROM Category WHERE catname ='".$cat."'";
		   $result = mysqli_query($conn, $catquery);
		   
		   if (mysqli_num_rows($result)== 0){ //if category not found insert into category table
		      $addCat ="INSERT INTO Category(catname) VALUE ('".$cat."')";
		      echo $addCat."<br>";
		      if (mysqli_query($conn, $addCat)){
		      	 $result = mysqli_query($conn, $catquery);
			 }//if(mysli_query($conn, $addCat))			 
		   }//if(!result)		   
		   
		   $catrow = mysqli_fetch_array($result, MYSQLI_ASSOC);
		   
		   $pname = $_POST['productname'];

		   $prod = "INSERT INTO product(productname, unit_cost, quantity, min_threshold, unit_price, cid) VALUES ('".$pname."', {$_POST['unit_cost']}, {$_POST['quantity']}, {$_POST['min_threshold']}, {$_POST['unit_price']}, {$catrow['cid']})";

		 
		   if ( mysqli_query($conn, $prod)){
		   echo "product insert Success!" ;
		  
		   
		$maker = $_POST['maker'];	
		$mid = "SELECT mid FROM makers where Manufacturer ='".$maker."'";
		
		 $result3 = mysqli_query($conn, $mid);
		
		  if (mysqli_num_rows($result3) ==0){ //if manufacturer not found insert into manufacturer table
		   
		      $addMan ="INSERT INTO makers(Manufacturer) VALUE ('".$maker."')";
		      if (mysqli_query($conn, $addMan)){
		      	 $result3 = mysqli_query($conn, $mid);
			 }//if(mysli_query($conn, $mid))			 
		   }//if(!result3)	

			 
		$midrow = mysqli_fetch_array($result3, MYSQLI_ASSOC);	

		 
		$pid = "SELECT pid FROM product where productname ='".$pname."'";
		
		$result2 = mysqli_query($conn, $pid);
		
		
		$pidrow = mysqli_fetch_array($result2, MYSQLI_ASSOC);		
		
			
		$makes = "INSERT INTO makes(pid, mid) VALUES (".$pidrow['pid'].",".$midrow['mid'].")";
		
   		if (mysqli_query($conn, $makes)){
		   echo "<br>";
			 }//if(mysli_query($conn, $mid))			 
		
			 

		 if (!empty($_POST['exp_date'])){
		addexpiration($conn, $_POST['quantity'], $_POST['exp_date'], $pidrow['pid']);    
		 }
/*		 $expires = "INSERT INTO Expires(pid, exp_date, quantity) VALUES (".$pidrow['pid'].", '". $_POST['expdate']."', {$_POST['quantity']})";
	 	
		if (mysqli_query($conn, $expires)){
		
		   echo "<br>";
			 }//if(mysli_query($conn, $expires))			 
			 else echo "Did not add expiration date";
			}	 

*/
		
		 carries($pidrow['pid'], $_POST['store'], $conn, $_POST['quantity']);	       
		 }else
			exit("unable to insert");
		if($conn)
     	mysqli_close($conn);

}

}//if($table == "product")

		
//------------------------insert into category table------------------------------------	
		elseif($table == "category"){
		$cat = "INSERT INTO Category(catname, Aisle, description) VALUES ('".$_POST['catname']."', {$_POST['aisle']},'".$_POST['description']."')";
   		if ( mysqli_query($conn, $cat)){
		   echo "category insert Success!" ;	       
		   }else
			echo "unable to insert";
	if($conn)
     	mysqli_close($conn);
			

		}//elseif ($table == "category")
		
//--------------------------insert into maker table----------------------------------------

	 elseif ($table == "maker"){


$maker = "INSERT INTO makers(Manufacturer, Address,phone, Website) VALUES ('" .  $_POST['maker'] . "', '" . $_POST['address'] . "', '" . $_POST['phone'] . "', '" . $_POST['website'] . "')";
       //echo $maker."<br>";
       if ( mysqli_query($conn, $maker)){
		   echo "Manufacturer insert Success!" ;	       
		   }else
			echo "unable to insert";
	if($conn)
     	mysqli_close($conn);


		             }

//-------------------------insert into customer table---------------------------

	   elseif ($table == "customer"){
	$customer = "INSERT INTO Customer(customername, email, address) VALUES ('".$_POST['customername']."', '".$_POST['email']."', '".$_POST['address']."')";
	
	if ( mysqli_query($conn, $customer)){
		   echo "customer insert Success!" ;	       
		   }else
			echo "unable to insert";
	if($conn)
     	mysqli_close($conn);

}			
//----------------------insert into Buy------------------------------------
	   elseif ($table == "buy"){

//search product table for pid and customer table for customerid

	 $pidrow = $_POST['product'];
   

       $storeidQuery = "select storeid from Store where storename = '".$_POST['store']."'";

       $result2 = mysqli_query($conn, $storeidQuery);

       if (mysqli_num_rows($result2)== 0){
        exit("store does not exist");
	}

   	$sidrow = mysqli_fetch_array($result2, MYSQLI_ASSOC);

       $cidQuery = "select card_num from Customer where customername = '".$_POST['customer_name']."'";
      
       $result3 = mysqli_query($conn, $cidQuery);

       if (mysqli_num_rows($result3)== 0){
        exit("Customer does not exist");
	}

   	$cidrow = mysqli_fetch_array($result3, MYSQLI_ASSOC);
	$date = date("Y-m-d");

	$buy = "INSERT INTO buy(pid, quantity, date, storeID, card_num) VALUES ( " . $pidrow . " , ".$_POST['quantity'] . " , '" . $date . "' , " . $sidrow['storeid'] . " , " . $cidrow['card_num'] . " )";
	
   		if ( mysqli_query($conn, $buy)){
		   echo "Transaction Added! <br>" ;	       
		   $quantity = "select productname, quantity, min_threshold from product where pid = ".$pidrow;
		   $result = mysqli_query($conn, $quantity);	
		  
		   $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ;    
		   
		   if ($row['quantity'] < $row['min_threshold'])
		      echo $row['productname']. " is below the threshold, time to reorder!";
		
  
		   
		   }else
			echo "unable to insert";

	if($conn)
     	mysqli_close($conn);


			}


//-----------------------------Insert into Employee table-----------------------
//ename, storename, job_type, wages, phone, email,ssn
//find storeid first
	 	   
  elseif ($table == "employee"){
  

       $storeidQuery = "select storeid from Store where storename = '".$_POST['storename']."'";

       $result2 = mysqli_query($conn, $storeidQuery);

       if (mysqli_num_rows($result2)== 0){
        exit("store does not exist");
	}
	$sidrow = mysqli_fetch_array($result2, MYSQLI_ASSOC);
  
	$employee = "INSERT INTO Employee(employeename, storeid, job_type, hoursperweek, wages, phone, email, SSN, totalhours) VALUES ('". $_POST['ename']."',".$sidrow['storeid'].",'".$_POST['job_type']."',".$_POST['hoursperweek'].",".$_POST['wages'].",'".$_POST['phone']."','".$_POST['email']."','".$_POST['ssn']."', NULL)";


   		if ( mysqli_query($conn, $employee)){
		   echo "Employee Added!" ;	       
		   }else
			echo "unable to insert";
  
	if($conn)
     	mysqli_close($conn);

  }
	   
//------------------------------Add a Store ---------------------------
//Adds a new store to the store table

  elseif ($table == "store"){

  $store = "INSERT INTO Store(storename, email, location, phone) VALUES ('". $_POST['store']."','".$_POST['email']."','".$_POST['location']."','".$_POST['phone']."')";


   		if ( mysqli_query($conn, $store)){
		   echo "Store Added!" ;	       
		   }else
			echo "unable to insert";


	if($conn)
     	mysqli_close($conn);

}

}	//function insert


//----------------------------Add to Carries table--------------------

function carries($pid, $store, $conn, $quantity){
    		
       $storeidQuery = "select storeid from Store where storename = '".$store."'";

       $result2 = mysqli_query($conn, $storeidQuery);

       if (mysqli_num_rows($result2)== 0){
        exit("store does not exist");
	}

   	$sidrow = mysqli_fetch_array($result2, MYSQLI_ASSOC);

	$exists = "select quantity from carries where pid = ".$pid;
	$res = mysqli_query($conn, $exists);
	
	if (mysqli_num_rows($res) != 0)
	{
	$orig_quantity = mysqli_fetch_array($res, MYSQLI_ASSOC);
	$newquantity = $_POST['quantity'] + $orig_quantity['quantity'];
	$carries = "update carries set quantity = ".$newquantity. " where pid = ".$pid;

	
	}else{

	
     $carries = "INSERT INTO carries(pid, storeid, quantity) VALUES (".$pid. ",".$sidrow['storeid'].",".$quantity.")";
     }

   		if ( mysqli_query($conn, $carries)){
		   echo "Product added to ".$store."! <br>" ;	       
		
		   }else
			echo "unable to insert into carries <br>";

			
}


//------------------------------insert into expiration table---------------------------------
function addexpiration($conn, $quantity, $exp_date, $pid){

		 $expires = "INSERT INTO Expires(pid, exp_date, quantity) VALUES (".$pid.", '". $exp_date."', {$quantity})";
	
		if (mysqli_query($conn, $expires)){
		
		   echo "Added expiration date <br>";
			 }//if(mysli_query($conn, $expires))			 
			 else echo "Did not add expiration date";
}	 





//---------------------Update function--------------------------

function update($table){          
	 
	 $conn = connection();  //$_SESSION["connection"];


switch($table){

	case("product"):
		
	if (empty($_POST['pid'])){
	   exit("Product not inserted, must have a valid product id");	
	}else{
		$update = "UPDATE product SET ";
				
		foreach ($_POST as $key => $val){
		
		if (!empty($val) && $key != "pid" && $val !="Submit"){
		     
		   if ( $key == "unit_cost" || $key == "unit_price" 
		   || $key == "quantity" || $key == "min_threshold")
		   $update .= $key ."= ".$val; 
		   
		   elseif ($key == "cat" || $key == "maker" || $key == "exp_date" || $key == "store") 
		   	  continue;
		   
		   else
		   $update .= $key ."= '". $val."'";
		   
		   
		   $update .=",";
		
		}//if !empty

		}//foreach		
		
		$update= rtrim($update, ",");
		$update .= " where pid =".$_POST['pid'];
		
      		 if (mysqli_query($conn, $update)){
		    echo "updated successfully!"."<br>";
}	
	else
	 exit( "update not successful");
	 
		
	 
	 }//else

	
	
	break;
	

	case("maker"):
		
	if (empty($_POST['mid'])){
	   exit("Manufacturer id not entered, must have a valid Manufacturer id");	
	}else{
		$update = "UPDATE makers SET ";
				
		foreach ($_POST as $key => $val){
		
		if (!empty($val) && $key != "mid" && $val !="Submit"){
		   $update .= $key ."= '".$val ."' ,"; 
		   }//if !empty
		   
	}
		$update= rtrim($update, ",");
		$update .= "where mid =".$_POST['mid'];
		
      		 if (mysqli_query($conn, $update)){
		    echo "updated ".$_POST['Manufacturer']." successfully!"."<br>";
		    }	
	else
	 echo "update to ".$_POST['Manufacturer']." not successful";
	 }


	break;
	
	case "customer":

		
	if (empty($_POST['card_num'])){
	   exit("customer card number not entered, must have a valid card number");	
	}else{
		$update = "UPDATE Customer SET ";
				
		foreach ($_POST as $key => $val){
		
		if (!empty($val) && $key != "card_num" && $val !="Submit"){
		   $update .= $key ."= '".$val ."' ,"; 
		   }//if !empty
		   
	}
		$update= rtrim($update, ",");
		$update .= " where card_num =".$_POST['card_num'];
		
      		 if (mysqli_query($conn, $update)){
		    echo "updated ".$_POST['customername']." information successfully!"."<br>";
		    }	
	else
	 echo "update to ".$_POST['customername']." not successful";
	 }


	break;

	case "employee":

		
	if (empty($_POST['emplid'])){
	   exit("Employee id not entered, must have a valid employee id");	
	}else{
		$update = "UPDATE Employee SET ";
				
		foreach ($_POST as $key => $val){
		
		if (!empty($val) && $key != "emplid" && $val !="Submit"){
		   
		   if($val == "wages") 
		   $update .= $key ."= ".$val ." ,"; 
		   else
		   $update .= $key ."= '".$val ."' ,"; 
		   }//if !empty
		   
	}
		$update= rtrim($update, ",");
		$update .= " where emplid =".$_POST['emplid'];
		
      		 if (mysqli_query($conn, $update)){
		    echo "updated ".$_POST['employeename']." information successfully!"."<br>";
		    }	
	else
	 echo "update to ".$_POST['employeename']." not successful";
	 }


	break;


	case "store":

		
	if (empty($_POST['storeid'])){
	   exit("Store id not entered, must have a valid Store id");	
	}else{
		$update = "UPDATE Store SET ";
				
		foreach ($_POST as $key => $val){
		
		if (!empty($val) && $key != "storeid" && $val !="Submit"){
			   $update .= $key ."= '".$val ."' ,"; 
	
		   }
	}
		$update= rtrim($update, ",");
		$update .= " where storeid =".$_POST['storeid'];
		
      		 if (mysqli_query($conn, $update)){
		    echo "updated ".$_POST['storename']." information successfully!"."<br>";
		    }	
	else
	 echo "update to ".$_POST['storename']." not successful";
	 }


	break;


}
	mysqli_close($conn);

	}//function update

//--------------------------------function delete--------------------------

function delete($table, $choice){
$conn = connection();  //$_SESSION["connection"];
      
      $delete ="";
       
       switch($choice){

	case "pid":
	case "unit_cost":
	case "quantity":
	case "min_threshold":
	case "unit_price":
	case "cid":
	case "tid":
	case "storeid":
	case "card_num":
	case "Aisle":
	case "wages":
	case "emplid":
	case "hoursperweek":
	     	$delete = "delete from ". $table ." where ". $choice . " = ". $_POST['deletekeyword']; 	     

		break;
	default:	
	     	$delete = "delete from ". $table ." where ". $choice . " = '". $_POST['deletekeyword'] ."'";
 	     
	 }
	 
	 if (!empty($delete)){
    
	 if (mysqli_query($conn, $delete)){
		    echo "deleted successfully!";
		    }	
	else
	 echo "did not delete";
	 	     }
	     
mysqli_close($conn);
}//function delete


//--------------------------------basic search function-------------------------
// Reference: http://idiallo.com/blog/php-mysql-search-algorithm


function limit($query, $lim = 200){
//limits the search string to less than 200 chars in length
	 return substr($query, 0, $lim);

}

function search($table){

	 $conn = connection();  //$_SESSION["connection"];
      	  $query = $_POST['search'];
	  $query = trim($query);
	  

	  if(strlen($query) === 0){
	   exit("Search string empty");	
	  }	 		 
	  $query = limit($query);	  
	  $title = "";

	switch ($table){	 		 
	       
	       case "product":
	       $search = "select pid as 'Product Id', productname as 'Product', quantity as 'Quantity',min_threshold as 'Minimum', unit_cost as 'Cost', unit_price as 'Price', catname as 'Category', Manufacturer from makers, (select makes.pid, productname,quantity, min_threshold, unit_cost, unit_price, catname, mid from makes,(select product.pid, productname, quantity, min_threshold, unit_cost, unit_price, catname from product, Category where productname = '".$query."' and Category.cid = product.cid) as prodcat where makes.pid = prodcat.pid) as prodmak where prodmak.mid = makers.mid";
	       $title = "Product";
	       break;
	       
	       case "Category":
	       	 $search = "select * from ". $table. " where catname = '".$query."'";	
		 $title = "$table";
		break;

	       case "makers":
	       $search = "select * from ". $table. " where Manufacturer = '".$query."'";	
	       $title = "Manufacturer";
	       break;
	       case "Customer":
	       $title = "Customer Information";
	       $search = "select * from ". $table. " where customername = '".$query."'";	
	       break;
	       case "buy":
	       $title = "Transaction Information";
	       $search = "select tid as 'Transaction id', date, customername as 'Customer', productname as 'Product', storebuy.quantity as 'Quantity', storename from Customer, (select tid, productname, buyprod.quantity, date, storename, card_num from Store,(select tid, productname, buy.quantity, date, storeid, card_num from buy, product where buy.pid = product.pid and tid = {$query}) as buyprod where Store.storeid = buyprod.storeid) as storebuy where Customer.card_num = storebuy.card_num";
	       break;

	       case "Employee":
	       $title = "Employee Information";
	       $search = "select emplid as 'Employee id', employeename as 'Employee Name', job_type as 'Job title', hoursperweek as 'Hours', wages as 'Earns', Employee.phone as 'Phone Number', Employee.email as 'Email', storename as 'Store name' from Employee, Store where employeename = '".$query."' and Employee.storeid = Store.storeid";	 
      break;
	       case "Store":
	       $title = "Store Information";
	       $search = "select * from ". $table. " where storename = '".$query."'";	
	     
	       break;
	     
	       case "carries":
	       $title ="Product Found";
	       $search = "select storename as 'Store', productname as 'Product', quantity as 'Quantity' from Store, (select productname, storeid, carries.quantity from carries, product where carries.pid = product.pid and carries.pid = {$query}) as prodcarry where prodcarry.storeid = Store.storeid";
	       

}	

 printTable($conn, $search, $title);
	


	mysqli_close($conn);


}


?>