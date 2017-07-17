<?php
//Functions.php will be used to hold the functions that will be called from other scripts: connect, insert,delete, search, etc


function connection(){


if(!isset($conn)){

	 define('DB_SERVER', 'localhost');
	 define('DB_USER', 'root');
	 define('DB_PASSWORD',"3624Leno");//{$_POST['pwd']}");
	 $_SESSION["DB"]= 'Databases_Project';


	$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, 'Databases_Project');
	if($conn) { $_SESSION["connection"] = $conn;
	return $conn;
	}
	else{ exit("Unable to connect to DB");}
	
	}

}//function connection() 



function insert($table){          
	 $conn = connection();//$_SESSION["connection"];

//copy and paste connection
//close connection at the end

//------------------------insert into product table----------------------------

			if ($table == "product"){
		  $catquery = "SELECT cid FROM Category WHERE catname ='".$_POST['cat']."'";
		  
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

		   $prod = "INSERT INTO product(productname, exp_date, unit_cost, quantity, min_threshold, unit_price, cid) VALUES ('".$_POST['pname']."', {$_POST['expdate']}, {$_POST['cost']}, {$_POST['quantity']}, {$_POST['threshold']}, {$_POST['price']}, {$catrow['cid']})";

		   echo $prod."<br>";
		   if ( mysqli_query($conn, $prod)){
		   echo "product insert Success!" ;	       
		   }else
			echo "unable to insert";
		mysqli_close($conn);
		}//if($table == "product")
		
//------------------------insert into category table------------------------------------	
		elseif($table == "category"){
		$cat = "INSERT INTO Category(catname, Aisle, description) VALUES ('".$_POST['catname']."', {$_POST['aisle']},'".$_POST['description']."')";
   		if ( mysqli_query($conn, $cat)){
		   echo "category insert Success!" ;	       
		   }else
			echo "unable to insert";
			
		}//elseif ($table == "category")
		
//--------------------------insert into maker table----------------------------------------

	 elseif ($table == "maker"){


$maker = "INSERT INTO makers(Manufacturer, Address,phone, Website) VALUES ('" .  $_POST['maker'] . "', '" . $_POST['address'] . "', '" . $_POST['phone'] . "', '" . $_POST['website'] . "')";
       //echo $maker."<br>";
       if ( mysqli_query($conn, $maker)){
		   echo "Manufacturer insert Success!" ;	       
		   }else
			echo "unable to insert";
		             }

//-------------------------insert into customer table---------------------------

	   elseif ($table == "customer"){
	$customer = "INSERT INTO Customer(customername, email, address) VALUES ('".$_POST['customername']."', '".$_POST['email']."', '".$_POST['address']."')";
	echo $customer."<br>";
	if ( mysqli_query($conn, $customer)){
		   echo "customer insert Success!" ;	       
		   }else
			echo "unable to insert";
}			
//----------------------insert into Buy------------------------------------
	   elseif ($table == "buy"){

//search product table for pid and customer table for customerid
//	$buy = "INSERT INTO buy(customername, email, address) VALUES ({$_POST['customername']}, {$_POST['email']}, {$_POST['address']}";
  // 		if ( mysqli_query($conn, $buy)){
//		   echo "Transaction Added!" ;	       
//		   }else
//			echo "unable to insert";
}
			    
	   

	   

	}//function insert
	




?>