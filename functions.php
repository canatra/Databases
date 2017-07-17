<?php
//Functions.php will be used to hold the functions that will be called from other scripts: connect, insert,delete, search, etc


function connection(){


if(!isset($conn)){

	 define('DB_SERVER', 'localhost');
	 define('DB_USER', 'root');
	 define('DB_PASSWORD',
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
		   $pname = $_POST['pname'];

		   $prod = "INSERT INTO product(productname, exp_date, unit_cost, quantity, min_threshold, unit_price, cid) VALUES ('".$pname."', '".$_POST['expdate']."', {$_POST['cost']}, {$_POST['quantity']}, {$_POST['threshold']}, {$_POST['price']}, {$catrow['cid']})";

		   echo $prod."<br>";
		   if ( mysqli_query($conn, $prod)){
		   echo "product insert Success!" ;	       
		   }else
			echo "unable to insert";
	


		$pid = "SELECT pid FROM product where productname ='".$pname."'";
		$result2 = mysqli_query($conn, $pid);
		$pidrow = mysqli_fetch_array($result2, MYSQLI_ASSOC);	
		
		$mid = "SELECT mid FROM makers where Manufacturer ='".$_POST['maker']."'";
		
		 $result3 = mysqli_query($conn, $mid);
		
		  if (!$result3){//if manufacturer not found insert into manufacturer table
		      $addMan ="INSERT INTO makers(Manufacturer)VALUE ({$_POST['maker']})";
		      if (mysqli_query($conn, $addMan)){
		      	 $result3 = mysqli_query($conn, $mid);
			 }//if(mysli_query($conn, $mid))			 
		   }//if(!result3)		   
		 

		$midrow = mysqli_fetch_array($result3, MYSQLI_ASSOC);	
			
		$makes = "INSERT INTO makes(pid, mid) VALUES (".$pidrow['pid'].",".$midrow['mid'].")";
		
   		if (mysqli_query($conn, $makes)){
		   echo "<br>";
			 }//if(mysli_query($conn, $mid))			 
		 


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
	
	if ( mysqli_query($conn, $customer)){
		   echo "customer insert Success!" ;	       
		   }else
			echo "unable to insert";
}			
//----------------------insert into Buy------------------------------------
	   elseif ($table == "buy"){

//search product table for pid and customer table for customerid

//find pid, find storeid, find card_num
       //product, quantity, date, store, customer_name

       $pidQuery = "select pid from product where productname = '".$_POST['product']."'";
       		        $result1 = mysqli_query($conn, $pidQuery);

       if (!$result1){
        exit("Product does not exist");
	}

   	$pidrow = mysqli_fetch_array($result1, MYSQLI_ASSOC);

       $storeidQuery = "select storeid from Store where storename = '".$_POST['store']."'";

       $result2 = mysqli_query($conn, $storeidQuery);

       if (!$result2){
        exit("store does not exist");
	}

   	$sidrow = mysqli_fetch_array($result2, MYSQLI_ASSOC);

       $cidQuery = "select card_num from Customer where customername = '".$_POST['customer_name']."'";
      
       $result3 = mysqli_query($conn, $cidQuery);

       if (!$result3){
        exit("Customer does not exist");
	}

   	$cidrow = mysqli_fetch_array($result3, MYSQLI_ASSOC);
	$date = date("Y-m-d");

	$buy = "INSERT INTO buy(pid, quantity, tdate, storeID, card_num) VALUES ( " . $pidrow['pid'] . " , ".$_POST['quantity'] . " , '" . $date . "' , " . $sidrow['storeid'] . " , " . $cidrow['card_num'] . " )";
	echo $buy."<br>";


   		if ( mysqli_query($conn, $buy)){
		   echo "Transaction Added!" ;	       
		   }else
			echo "unable to insert";
}


//-----------------------------Insert into Employee table-----------------------
//ename, storename, job_type, wages, phone, email,ssn
//find storeid first
	 	   
  elseif ($table == "employee"){
  

       $storeidQuery = "select storeid from Store where storename = '".$_POST['storename']."'";

       $result2 = mysqli_query($conn, $storeidQuery);

       if (!$result2){
        exit("store does not exist");
	}
	$sidrow = mysqli_fetch_array($result2, MYSQLI_ASSOC);
  
	$employee = "INSERT INTO Employee(employeename, storeid, job_type, hoursperweek, wages, phone, email, SSN, totalhours) VALUES ('". $_POST['ename']."',".$sidrow['storeid'].",'".$_POST['job_type']."',".$_POST['hoursperweek'].",".$_POST['wages'].",'".$_POST['phone']."','".$_POST['email']."','".$_POST['ssn']."', NULL)";


   		if ( mysqli_query($conn, $employee)){
		   echo "Employee Added!" ;	       
		   }else
			echo "unable to insert";
  

  }
	   
//------------------------------Add a Store ---------------------------
//Adds a new store to the store table

  elseif ($table == "store"){

  $store = "INSERT INTO Store(storename, email, location, phone) VALUES ('". $_POST['store']."','".$_POST['email']."','".$_POST['location']."','".$_POST['phone']."')";


   		if ( mysqli_query($conn, $store)){
		   echo "Store Added!" ;	       
		   }else
			echo "unable to insert";



}

//----------------------------Add to Carries table--------------------

elseif ($table == "carries") {

     $pname = $_POST["pname"];
     $pidQuery = "select pid from product where productname = '".$pname."'";
     echo $pidQuery."<br>";
       $result1 = mysqli_query($conn, $pidQuery);

       if (!$result1){
        exit("Product does not exist");
	}

   	$pidrow = mysqli_fetch_array($result1, MYSQLI_ASSOC);
	$store = $_POST["storename"];
       $storeidQuery = "select storeid from Store where storename = '".$store."'";

       echo $storeidQuery."<br>";
       $result2 = mysqli_query($conn, $storeidQuery);

       if (!$result2){
        exit("store does not exist");
	}

   	$sidrow = mysqli_fetch_array($result2, MYSQLI_ASSOC);



     $carries = "INSERT INTO carries(pid, storeid) VALUES (".$pidrow['pid']. ",".$sidrow['storeid'].")";
     
   		if ( mysqli_query($conn, $carries)){
		   echo "Product ".$pname. " added to ".$store."!" ;	       
		   }else
			echo "unable to insert";

     
}

	mysqli_close($conn);

	}//function insert
	

//---------------------Update function--------------------------


?>