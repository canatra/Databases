<?php 
include 'functions.php';
include 'main.php';

?>
 <p style="font-size:25px; color:lightblue;">Submit your search</p>
 <form>
 <ul>
<li>Search <input type="text" name="search"></li>

  in <select id="tablemenu" name ="tablemenu" onchange = "showForm()" > </h3> 
            <option value="none"></option>
			<option value="category">category</option>
		   <option value="product"> product </option>
            <option value="maker"> maker  </option>
            <option value="customer"> customer </option>
            <option value="buy"> buy </option>
			<option value="employee"> employee </option>
			<option value="store"> store </option>
			<option value="carries"> carries </option>
            </select>
			</ul>