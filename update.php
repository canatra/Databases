<?php

include 'main.php';
include 'functions.php';

$table ="";

if(isset($_POST['product_submit'])){ //check if form was submitted
    $table = "product";
}    

if(isset($_POST['maker_submit'])){ //check if form was submitted
  $table = "maker";  
}

update($table);

?>
    
     <p style="font-size:25px; color:lightblue;">Submit your update</p>
  choose the table  
 
    
   
  
<?php include 'updateform.php' ?>


<script src="updateShowform.js">

</script>