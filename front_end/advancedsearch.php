<?php
include_once('main.php');
?>
<html>

<p style="font-size:25px; color:lightblue;">Advanced Search</p>

<h3>Find  <select id="findmenu" name ="findmenu" onchange = "advancedForm()"> </h3> 
            <option value="none"></option>
			<option value="who">Who</option>
		     <option value="what">What</option>
			<option value="transaction">Transaction</option>
			<option value="all">All</option>
			</select>
			
		<form id="wholist" name ="wholist" style="display:none" method="post">	
	   	<select name="selection">  
            <option value="makes">makes</option>
			<option value="sells">sells</option>
		    <option value="works in">works in</option>
			
            </select>
			<input type="text" name="advanced_keyword">
			 <input type="submit" name="advanced_submit">
		</form>	
		
		<form id="whatlist" name ="whatlist" style="display:none" method="post">	
	    <select name="selection">  
            <option value="expires">expires</option>
		
            </select>
			 
			 <input type="date"  name="advanced_keyword">
			 <input type="submit" name="advanced_submit">
		</form>	
		
		<form id="transactionlist" name ="transactionlist" style="display:none" method="post" >	
	        <select name ="selection">  
            <option value="on"> on </option>
			<option value="before"> before </option>
			<option value="on_before"> on or before </option>
			</select>
			 <input type="date"  name="advanced_keyword">
			 <input type="submit" name="advanced_submit">

		</form>


		<form id="alllist" name ="alllist" style="display:none" method="post" >	
	        <select name ="selection">  
            		<option value="products"> products </option>
			<option value="prod_sold">products sold</option>
			</select>
			in
			<input type="text"  name="advanced_keyword">
			 <input type="submit" name="advanced_submit">

		</form>	


<script>
function advancedForm(){
	var selopt = document.getElementById("findmenu").value;
if(selopt=="who"){
	document.getElementById("wholist").style.display="inline-block";
	document.getElementById("whatlist").style.display="none";
	document.getElementById("transactionlist").style.display="none";
	document.getElementById("alllist").style.display="none";
}
else if(selopt=="what"){
	document.getElementById("whatlist").style.display="inline-block";
	document.getElementById("wholist").style.display="none";
	document.getElementById("transactionlist").style.display="none";
	document.getElementById("alllist").style.display="none";
}
else if(selopt=="transaction"){
	document.getElementById("transactionlist").style.display="inline-block";
	document.getElementById("wholist").style.display="none";
	document.getElementById("whatlist").style.display="none";
	document.getElementById("alllist").style.display="none";
}

else if(selopt=="all"){
	
	document.getElementById("transactionlist").style.display="none";
	document.getElementById("wholist").style.display="none";
	document.getElementById("whatlist").style.display="none";
	document.getElementById("alllist").style.display="inline-block";
}
}
</script>

<body>



<table>
<?php
include ('advancedfunctions.php');




if (isset($_POST['advanced_submit'])){


	$option= isset($_POST['selection'])?$_POST['selection']:false;
	
	if ($option)
	{
	 
	advancedSearch($option);
	echo "<br><br><br>";	

	}
}

?>
</table>

</body>
</html>