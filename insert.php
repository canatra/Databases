

<?php
include 'functions.php';
include 'main.php';


/* if(isset($_POST['product_submit'])){ //check if form was submitted
  $input = $_POST['pid']; //get input text
  $message = "Success! You entered: ".$input;
  echo $message;
  
}    */

if(isset($_POST['product_submit'])){ //check if form was submitted
  $input = $_POST['pid']; //get input text
  $message = "product insert Success! You entered: ".$input;
  echo $message;
  
}    

if(isset($_POST['maker_submit'])){ //check if form was submitted
  $input = $_POST['mid']; //get input text
  $message = "maker insert Success! You entered: ".$input;
  echo $message;
  
}    
?>
    
     <p style="font-size:25px; color:lightblue;">Submit your insertion</p>
  choose the table  
 
    
   
  
<?php include 'form.php' ?>


<script src="Showform.js">

</script>

