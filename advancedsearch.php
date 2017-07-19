<?php
include_once('main.php');
?>
<html>
<table>
<?php
include ('advancedfunctions.php');




if (isset($_POST['advanced_submit'])){


	$option= isset($_POST['who'])?$_POST['who']:false;
	
	if ($option)
	{
	 
	advancedSearch($option);
	echo "<br><br><br>";	

/*	switch($option){

	case "makes":
	    print '<td> Manufacturer </td>';

	    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	    {	if (!empty($val))    
	   	 print  '<td>'.$row['Manufacturer'].'</td>';
	    }
	    break;

	  case "sells":
	     print '<td> Stores </td>';


	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	    {	if (!empty($val))    
	   	 print  '<tr><td>'.$row['storename'].'</td></tr>';
	
		 }

	  break;

	 	 }*/


	}





}

?>
</table>

<p style="font-size:25px; color:lightblue;">Advanced Search</p>

<h3>Find  <select id="findmenu" name ="findmenu" onchange = "advancedForm()"> </h3> 
            <option value="none"></option>
			<option value="who">who</option>
		     <option value="what">what</option>
			<option value="transaction">transaction</option>
            </select>
		<form id="wholist" name ="wholist" style="display:none" method="post">	
	   	<select name="who">  
            <option value="makes">makes</option>
			<option value="sells">sells</option>
		    <option value="works in">works in</option>
			
            </select>
			<input type="text" name="advanced_keyword">
			 <input type="submit" name="advanced_submit">
		</form>	
		
		<form id="whatlist" name ="whatlist" style="display:none" method="post">	
	    <select name="expire">  
            <option value="expires">expires</option>
		
            </select>
			 
			 <input type="date"  name="advanced_keyword">
			 <input type="submit" name="advanced_submit">
		</form>	
		
		<form id="transactionlist" name ="transactionlist" style="display:none" method="post" >	
	        <select name ="transaction">  
            <option value="on"> on </option>
			<option value="before"> before </option>
			<option value="on_before"> on and before </option>
			</select>
			 <input type="date"  name="advanced_keyword">
			 <input type="submit" name="advanced_submit">

		</form>	
<!--		
<table>
<?php
if (isset($_POST['advanced_submit'])){


	 echo "here";
	$option= isset($_POST['who'])?$_POST['who']:false;
	
	if ($option)
	{
	 
	$row = advancedSearch($option);

	switch($option){

	case "makes":
	echo "<br><br><br>";
	    print '<td> Manufacturer </td>';

	    foreach ($row as $val)
	    	if (!empty($val))    
	   	 print  '<td>'.$val.'<td>';
	    
	    break;
	 	 }


	}





}


?>
</table>
</html>
-->



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

