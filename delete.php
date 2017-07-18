<?php

include 'main.php';
include 'functions.php';

$table ="";
$choice="";

if(isset($_POST['del_product'])){ //check if form was submitted
    $table = "product";
    $option = isset($_POST['product'])?$_POST['product']:false;
    if ($option)
       $choice = htmlentities($_POST['product'], ENT_QUOTES, "UTF-8");
}    

elseif(isset($_POST['del_cat'])){ //check if form was submitted
  	$table = "Category";  
    $option = isset($_POST['cat'])?$_POST['cat']:false;
    if ($option)
       $choice= htmlentities($_POST['cat'], ENT_QUOTES, "UTF-8");

}
elseif(isset($_POST['del_maker'])){ //check if form was submitted
	$table = "makers";
	$option = isset($_POST['maker'])?$_POST['maker']:false;
    	if ($option)
       	   $choice= htmlentities($_POST['maker'], ENT_QUOTES, "UTF-8");

}
elseif(isset($_POST['del_customer'])){ //check if form was submitted
	$table = "Customer";
	$option = isset($_POST['customer'])?$_POST['customer']:false;
    	if ($option)
       	   $choice= htmlentities($_POST['customer'], ENT_QUOTES, "UTF-8");


}
elseif(isset($_POST['del_employee'])){ //check if form was submitted

	$table = "Employee";
	$option = isset($_POST['employee'])?$_POST['employee']:false;
    	if ($option)
       	   $choice= htmlentities($_POST['employee'], ENT_QUOTES, "UTF-8");

}
elseif(isset($_POST['del_store'])){ //check if form was submitted

	$table = "Store";
	$option = isset($_POST['store'])?$_POST['store']:false;
    	if ($option)
       	   $choice= htmlentities($_POST['store'], ENT_QUOTES, "UTF-8");

}
elseif(isset($_POST['del_carries'])){ //check if form was submitted

	$table = "carries";
	$option = isset($_POST['carries'])?$_POST['carries']:false;
    	if ($option)
       	   $choice= htmlentities($_POST['carries'], ENT_QUOTES, "UTF-8");

}
elseif(isset($_POST['del_buy'])){ //check if form was submitted

	$table = "buy";
	$option = isset($_POST['bye'])?$_POST['bye']:false;
    	if ($option)
       	   $choice= htmlentities($_POST['bye'], ENT_QUOTES, "UTF-8");

}


delete($table, $choice);

?>




 <!-- TABLE SELECTION -->
 <h3>delete from table <select id="deletelist" name ="deletelist" onchange = "deleteForm()" style="display:inline-block" > </h3> 
            <option value="none"></option>
			<option value="category">category</option>
		    <option value="product"> product </option>
            <option value="maker"> manufacter </option>
            <option value="customer"> customer </option>
            <option value="buy"> buy </option>
			<option value="employee"> employee </option>
			<option value="store"> store </option>
			<option value="carries"> carries </option>
            </select>



     <div style="display:inline-block">
		<h3>where 
			<select id="none" name ="none"  style="width:100px"> </select>

        <form id="productlist2" name ="productlist2" style="display:none" method="post";>
            <select name ="product"> </h3>
            <option value="pid">pid</option>
			<option value="productname">product name</option>
		    <option value="exp_date">expiration date</option>
		    <option value="unit_price">unit price</option>
            <option value="unit_cost">unit cost</option>
            <option value="min_threshold"> minimum quantity </option>
            <option value="quantity"> quantity </option>
			<option value="cid"> category id </option>
			</select> is <input type="text" name="deletekeyword">  
			<input type="submit" name="del_product"/>
		</form>
			
		<form id="categorylist2" name ="categorylist2" style="display:none" method="post";>
			<select name="cat"> </h3>
            <option value="cid">cid</option>
			<option value="catname">category name</option>
		    <option value="Aisle">aisle number</option>
            <option value="description">description</option>
                    </select> is <input type="text" name="deletekeyword">  
			 <input type="submit" name="del_cat"/>
		</form> 
			
		
			
		<form id="makerlist" name ="makerlist" style="display:none" method="post";>
			<select name ="maker"> </h3>
            <option value="mid">mid</option>
			<option value="Manufacturer">manufacturer name</option>
		    <option value="address">address</option>
            <option value="phone">phone</option>
            <option value="Website">website</option>
			
            </select> is <input type="text" name="deletekeyword">  
			<input type="submit" name="del_maker"/>
		</form> 
		
		<form id="customerlist" name ="customerlist" style="display:none" method="post";>
			<select name="customer"> </h3>
            <option value="card_num">card number</option>
			<option value="customername">customer name</option>
		    <option value="address">address</option>
            <option value="email">email</option>
			
            </select> is <input type="text" name="deletekeyword">  
			<input type="submit" name="del_customer"/>
		</form> 
		
		<form id="buylist" name ="buylist" style="display:none" method="post";>
			<select name ="bye"> </h3>
            <option value="tid">transaction id</option>
			<option value="pid">product id</option>
		    <option value="quantity">quantity sold</option>
            <option value="date">date</option>
			<option value="storeid">store id</option>
            <option value="card_num ">card number</option>
            </select> is <input type="text" name="deletekeyword">  
			<input type="submit" name="del_buy"/>
		</form> 
		
		<form id="storelist" name ="storelist" style="display:none" method="post";>
			<select name = "store"> </h3>
            <option value="storeid">storeid</option>
			<option value="email">email</option>
		    <option value="storename">store name</option>
            <option value="location">location</option>
			<option value="phone">phone</option>
          
            </select> is <input type="text" name="deletekeyword">  
			<input type="submit" name="del_store"/>
		</form> 
			
		<form id="employeelist" name ="employeelist" style="display:none" method="post";>
			<select name = "employee"> </h3>
            <option value="emplid">employee id</option>
			<option value="storeid">store id</option>
		    <option value="employeename">employee name</option>
            <option value="job_type">job type</option>
			<option value="phone">phone</option>
            <option value="hoursperweek">hours per week</option>
			<option value="wages">wages</option>
		    <option value="email">email</option>
            	    	<option value="SSN">SSN</option>
            </select> is <input type="text" name="deletekeyword">  
			<input type="submit" name="del_employee"/>
		</form> 
		
		<form id="carrieslist" name ="carrieslist" style="display:none" method="post";>
			<select name ="carries"> </h3>
            
			<option value="storeid">store id</option>
		    <option value="pid">product id</option>
            
            </select> is <input type="text" name="deletekeyword">  
			<input type="submit" name="del_carries"/>
		</form> 
		
		
	</div>
    
 



<script src="deleteForm.js">
</script>
