<?php 
//Functions.php will be used to hold the functions that will be called from other scripts: connect, insert,delete, search-->

static $conn;

function connection(){


if(!isset($conn)){

	 define('DB_SERVER', 'localhost');
	 define('DB_USER', 'root');
	 define('DB_PASSWORD',"{$_POST['pwd']}");
	 define('DB', 'Databases_Project');


	$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
	if($conn) { echo 'Connected <BR>';}
	else{ exit("Unable to connect to DB");}
	$db_selected = mysqli_select_db($conn, DB);
	if($db_selected) {echo 'Database selected'.'<BR>';}
	else { exit("$DB not selected");}
	}

	if($conn === false){
	return mysqli_connect_error();
	}
	return $conn;
}//function connection() 

function connectiontest(){

	 if(!isset($conn)){

	$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
	
	}
	return $conn;

}


function insert($table){          
	 $conn = connectiontest();


//------------------------insert into product table----------------------------

		if ($table == "product"){
		   $catquery = "select cid from category where catname = {$_POST['cat']}";
		   $result = mysqli_query($conn, $catquery);
		   
		   if (!$result){ //if category not found insert into category table
		      $addCat ="INSERT INTO Category(catname)VALUE ({$_POST['cat']})";
		      if (mysqli_query($conn, $addCat)){
		      	 $result = mysqli_query($conn, $catquery);
			 }//if(mysli_query($conn, $addCat))			 
		   }//if(!result)		   
		   
		   $catrow = mysqli_fetch_array($result, MYSQLI_ASSOC);

		  // strtotime($_POST(expdate));
		   //if ($_

		   $prod = "INSERT INTO product(productname, expdate, unit_cost, quantity, min_threshold, unit_price, cid) VALUES ({$_POST['pname']}, {$_POST['expdate']}, {$_POST['cost']}, {$_POST['quantity']}, {$_POST['threshold']}, {$_POST['price']}, {$catrow['cid']}";
		   if ( mysqli_query($conn, $prod)){
		   echo "product insert Success!" ;	       
		   }else
			echo "unable to insert";
		}//if($table == "product")
		
//------------------------insert into category table------------------------------------		
		elseif($table == "category"){
		$cat = "INSERT INTO Category(catname, Aisle, description) VALUES ({$_POST['catname']}, {$_POST['Aisle']}, {$_POST['description']}";
   		if ( mysqli_query($conn, $cat)){
		   echo "category insert Success!" ;	       
		   }else
			echo "unable to insert";
			
		}//elseif ($table == "category")
		
//--------------------------insert into maker table----------------------------------------

	 elseif ($table == "maker"){

		$maker = "INSERT INTO makers(Manufacturer, Address, Website) VALUES ({$_POST['maker']}, {$_POST['address']}, {$_POST['phone']}, {$_POST['website']}";
   		if ( mysqli_query($conn, $maker)){
		   echo "Manufacturer insert Success!" ;	       
		   }else
			echo "unable to insert";
		             }

//-------------------------insert into customer table---------------------------

	   elseif ($table == "customer"){
	$customer = "INSERT INTO Customer(customername, email, address) VALUES ({$_POST['customername']}, {$_POST['email']}, {$_POST['address']}";
   		if ( mysqli_query($conn, $customer)){
		   echo "customer insert Success!" ;	       
		   }else
			echo "unable to insert";
}			
//----------------------insert into Buy------------------------------------
	   elseif ($table == "buy"){

//search product table for pid and customer table for customerid
	$buy = "INSERT INTO buy(customername, email, address) VALUES ({$_POST['customername']}, {$_POST['email']}, {$_POST['address']}";
   		if ( mysqli_query($conn, $buy)){
		   echo "Transaction Added!" ;	       
		   }else
			echo "unable to insert";
}
			    
	   


	   

	}//function insert
	




?>