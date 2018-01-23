<?php
include_once('main.php');
include_once('functions.php');
$table ="";

if(isset($_POST['product_submit'])){ //check if form was submitted
    $table = "product";
 
}    

elseif(isset($_POST['category_submit'])){ //check if form was submitted
  $table = "category";
 
}    
elseif(isset($_POST['maker_submit'])){ //check if form was submitted

	$table = "maker";

}
elseif(isset($_POST['customer_submit'])){ //check if form was submitted

	$table = "customer";

}
elseif(isset($_POST['buy_submit'])){ //check if form was submitted

	$table = "buy";

}
elseif(isset($_POST["employee_submit"])){
	$table = "employee";

}

elseif(isset($_POST["store_submit"])){
	$table = "store";
}

elseif (isset($_POST["carries_submit"])){

	$table = "carries"; 
}
	

	 insert($table);

?>
    
     <p style="font-size:25px; color:lightblue;">Submit your insertion</p>
  choose the table  
 
    
   
  
<?php include_once 'form.php' ?>


<script src="Showform.js">

</script>

