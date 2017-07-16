

<?php
session_start();
include_once('functions.php');
include_once('main.php');
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
	 insert($table);

?>
    
     <p style="font-size:25px; color:lightblue;">Submit your insertion</p>
  choose the table  
 
    
   
  
<?php include 'form.php' ?>


<script src="Showform.js">

</script>

