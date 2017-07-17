<?php
include_once('main.php');
include_once('functions.php');
?>

<p style="font-size:25px; color:lightblue;">Advanced Search</p>

<div>
Find  <select id="findmenu" name ="findmenu" onchange = "advancedForm()" > </h3> 
            <option value="none"></option>
			<option value="who">who</option>
		     <option value="what">what</option>
			<option value="transaction">transaction</option>
            </select>
		<form id="wholist" name ="wholist" style="display:none">	
	    <select > </h3> 
            <option value="makes">makes</option>
			<option value="sells">sales</option>
		    <option value="works in">works in</option>
			
            </select>
			<input type="text" name="advanced_keyword">
			 <input type="submit" name="advanced_submit">
		</form>	
		
		<form id="whatlist" name ="whatlist" style="display:none">	
	    <select > </h3> 
            <option value="expires">expires</option>
		
            </select>
			 
			 <input type="date"  name="advanced_keyword">
			 <input type="submit" name="advanced_submit">
		</form>	
		
		<form id="transactionlist" name ="transactionlist" style="display:none">	
	        <select > </h3> 
            <option value="on"> on </option>
			<option value="before"> before </option>
			<option value="on_before"> on and before </option>
			</select>
			 <input type="date"  name="advanced_keyword">
			 <input type="submit" name="advanced_submit">
		</form>	
		
			</div>
			
<script>
function advancedForm(){
	var selopt = document.getElementById("findmenu").value;

if(selopt=="who"){
	document.getElementById("wholist").style.display="inline-block";
	document.getElementById("whatlist").style.display="none";
	document.getElementById("transactionlist").style.display="none";
}

if(selopt=="what"){
	document.getElementById("whatlist").style.display="inline-block";
	document.getElementById("wholist").style.display="none";
	document.getElementById("transactionlist").style.display="none";
}

if(selopt=="transaction"){
	document.getElementById("transactionlist").style.display="inline-block";
	document.getElementById("wholist").style.display="none";
	document.getElementById("whatlist").style.display="none";
	
}
}
</script>
			