<?php 
include 'functions.php';
include 'main.php';

?>


 <!-- TABLE SELECTION -->
 <h3>delete from table <select id="deletelist" name ="deletelist" onchange = "deleteForm()" style="display:inline-block" > </h3> 
            <option value="none"></option>
			<option value="category">category</option>
		    <option value="product"> product </option>
            <option value="maker"> maker </option>
            <option value="customer"> customer </option>
            <option value="buy"> buy </option>
			<option value="employee"> employee </option>
			<option value="store"> store </option>
			<option value="carries"> carries </option>
            </select>



     <div style="display:inline-block">
		<h3>where 
			<select id="none" name ="none"  style="width:100px"> </select>

        <form id="productlist2" name ="productlist2" style="display:none" >
            <select > </h3>
            <option value="pid">pid</option>
			<option value="productname">productname</option>
		    <option value="exp_date">exp_date</option>
            <option value="unitcost">unitcost</option>
            <option value="min_threshold"> min_threshold </option>
            <option value="quantity"> quantity </option>
			<option value="cid"> cid </option>
			<option value="mid"> mid </option>
			</select> is <input type="text" name="deletekeyword">  
			<input type="submit" name="del_product"/>
		</form>
			
		<form id="categorylist2" name ="categorylist2" style="display:none" >
			<select> </h3>
            <option value="cid">cid</option>
			<option value="categoryname">categoryname</option>
		    <option value="aislenumber">aislenumber</option>
            <option value="descriptionsss">descriptionssss</option>
           
			
            </select> is <input type="text" name="deletekeyword">  
			 <input type="submit" name="del_product"/>
		</form> 
			
		
			
		<form id="makerlist" name ="makerlist" style="display:none" >
			<select> </h3>
            <option value="mid">mid</option>
			<option value="makername">makername</option>
		    <option value="address">address</option>
            <option value="phone">phone</option>
            <option value="email">email</option>
			
            </select> is <input type="text" name="deletekeyword">  
			<input type="submit" name="del_maker"/>
		</form> 
		
		<form id="customerlist" name ="customerlist" style="display:none" >
			<select> </h3>
            <option value="card_num">card_num</option>
			<option value="customername">customername</option>
		    <option value="address">address</option>
            <option value="email">email</option>
			
            </select> is <input type="text" name="deletekeyword">  
			<input type="submit" name="del_customer"/>
		</form> 
		
		<form id="buylist" name ="buylist" style="display:none" >
			<select> </h3>
            <option value="buyid">buyid</option>
			<option value="pid">pid</option>
		    <option value="quantitySold">quantitySold</option>
            <option value="date">date</option>
			<option value="storeid">storeid</option>
            <option value="card_num ">card_num</option>
            </select> is <input type="text" name="deletekeyword">  
			<input type="submit" name="del_buy"/>
		</form> 
		
		<form id="storelist" name ="storelist" style="display:none" >
			<select> </h3>
            <option value="storeid">storeid</option>
			<option value="email">email</option>
		    <option value="storename">storename</option>
            <option value="location">location</option>
			<option value="phone">phone</option>
          
            </select> is <input type="text" name="deletekeyword">  
			<input type="submit" name="del_store"/>
		</form> 
			
		<form id="employeelist" name ="employeelist" style="display:none" >
			<select> </h3>
            <option value="employeeid">employeeid</option>
			<option value="storeid">storeid</option>
		    <option value="employeename">employeename</option>
            <option value="job_type">job_type</option>
			<option value="phone">phone</option>
            <option value="hoursperweek">hoursperweek</option>
			<option value="wages">wages</option>
		    <option value="email">email</option>
            <option value="direct_deposit">direct_deposit</option>
			<option value="SSN">SSN</option>
            </select> is <input type="text" name="deletekeyword">  
			<input type="submit" name="del_employee"/>
		</form> 
		
		<form id="carrieslist" name ="carrieslist" style="display:none" >
			<select> </h3>
            
			<option value="storeid">storeid</option>
		    <option value="productid">productid</option>
            
            </select> is <input type="text" name="deletekeyword">  
			<input type="submit" name="del_carries"/>
		</form> 
		
		
	</div>
    
 



<script src="deleteForm2.js">



</script>

