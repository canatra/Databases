<?php
include_once('main.php');
?>
<html>

<p style="font-size:25px; color:lightblue;">Advanced Search</p>

<h3>Find Profit by <select id="findmenu" name ="findmenu" onchange = "advancedForm()"> </h3> 
            <option value="none"></option>
			<option value="profitbyall"> All </option>
		    <option value="profitbyproduct"> Product </option>
			<option value="profitbydate"> Date </option>
			<option value="profitbystore"> Store </option>
			</select>
		<form id="alllist" name ="alllist" style="display:none" method="post">	
	   
			 <input type="submit" name="all_submit">
		</form>	
		
		<form id="productlist" name ="productlist" style="display:none" method="post">	
	    
			 <input type="text"  name="product_profit">
			 <input type="submit" name="product_submit">
		</form>	
		<form id="datelist" name ="datelist" style="display:none" method="post">	
	         <input type="date"  name="date_profit">
			 <input type="submit" name="date_submit">
		</form>
		
		<form id="storelist" name ="storelist" style="display:none" method="post">	
	    
			 <input type="text"  name="store_profit">
			 <input type="submit" name="store_submit">
		</form>	
	


<script>
function advancedForm(){
	var selopt = document.getElementById("findmenu").value;
 if(selopt=="profitbyproduct"){
	document.getElementById("productlist").style.display="inline-block";
	document.getElementById("alllist").style.display="none";
	document.getElementById("datelist").style.display="none";
		document.getElementById("storelist").style.display="none";
}
if(selopt=="profitbyall"){
	document.getElementById("alllist").style.display="inline-block";
	document.getElementById("productlist").style.display="none";
	document.getElementById("datelist").style.display="none";
		document.getElementById("storelist").style.display="none";
	
}
if(selopt=="profitbydate"){
	document.getElementById("datelist").style.display="inline-block";
	document.getElementById("productlist").style.display="none";
	document.getElementById("alllist").style.display="none";
		document.getElementById("storelist").style.display="none";
	
}
if(selopt=="profitbystore"){
	document.getElementById("storelist").style.display="inline-block";
	document.getElementById("productlist").style.display="none";
	document.getElementById("alllist").style.display="none";
	document.getElementById("datelist").style.display="none";
}
}
</script>


<body>


<?php
include ('advancedfunctions.php');
if (isset($_POST['product_submit'])){
	$option ="profitbyproduct";
	advancedSearch($option);
	
}
elseif (isset($_POST['all_submit'])){
   
   $option ="profitbyall";
	advancedSearch($option);
}
elseif (isset($_POST['date_submit'])){
  $option ="profitbydate";
	advancedSearch($option);
}
elseif (isset($_POST['store_submit'])){
       $option = "profitbystore";
       advancedSearch($option);
}


?>




</body>
</html>

