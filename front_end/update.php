<?php

include 'main.php';
include 'functions.php';

$table ="";

if(isset($_POST['product_submit'])){ //check if form was submitted
    $table = "product";
}    

elseif(isset($_POST['maker_submit'])){ //check if form was submitted
  	$table = "maker";  
}
elseif(isset($_POST['customer_submit'])){ //check if form was submitted
	$table = "customer";
}
elseif(isset($_POST['employee_submit'])){ //check if form was submitted

	$table = "employee";
}
elseif(isset($_POST['store_submit'])){ //check if form was submitted

	$table = "store";
}
elseif(isset($_POST['carries_submit'])){ //check if form was submitted

	$table = "carries";
}

update($table);

?>
    
     <p style="font-size:25px; color:lightblue;">Submit your update</p>
  choose the table  
 
    
   
  
<?php include 'updateform.php' ?>


<script src="updateShowform.js">

</script>