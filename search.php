<html>

<?php 
include 'main.php';

?>

 <p style="font-size:25px; color:lightblue;">Search</p>
 <form method ="post">

<ul>
<li>Search for: <input type="text" name="search"></li>

  in

  <select name ="table" style="display:inline-block"> </h3> 
            <option value="none"></option>
			<option value="Category">category</option>
		   <option value="product"> product </option>
            <option value="makers"> manufacturer  </option>
            <option value="Customer"> customer </option>
            <option value="buy"> buy </option>
			<option value="Employee"> employee </option>
			<option value="Store"> store </option>
			<option value="carries"> carries </option>
            </select>

		<input type="submit" name="search_submit">
	</form>		
	 




<table> 

<?php

include 'functions.php';

if (isset($_POST['search_submit'])){

   $option = isset($_POST['table'])?$_POST['table']:false;

    if ($option)
      {

      $table = htmlentities($_POST['table'], ENT_QUOTES, "UTF-8");   
       
       $row = search($table);   

echo "<br><br><br>";       
       foreach( $row as $key => $val){

              if (!empty($val))
       print '<td>'.$key.'</td>';

       }

       print '<tr>';   	    
       foreach( $row as $val){

       if (!empty($val))
       print '<td>'.$val.'</td>';

       }
      print '</tr>';   	    
 }
}
?>

</table>

</html>