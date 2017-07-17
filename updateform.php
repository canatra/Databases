
<!-- TABLE SELECTION -->
 <select id="tablemenu" name ="tablemenu" onchange = "showForm()" > </h3> 
            <option value="none"></option>
	    <option value="product"> Product </option>
            <option value="maker"> Manufacturer  </option>
            <option value="customer"> Customer </option>
            <option value="buy"> Transaction </option>
			<option value="employee"> Employee </option>
			<option value="store"> Store </option>
			<option value="carries"> Carries </option>
            </select>

<!-- FORM PRODUCT -->  
<form name="product" id="product" style="display:none" action="" method="post";>
<h2>Update Product Information</h2>
<ul>
<li>product id: <input type="text" name="pid"></li>
</ul>
<ul>
<li>product name: <input type="text" name="productname"></li>
</ul>
<ul>
<li>expiration date: <input type="date"  name="exp_date" ></li>
</ul>
<ul>
<li>cost per unit: <input type="text" name="unit_cost"></li>
</ul>
<ul>
<li>quantity: <input type="text" name="quantity"></li>
</ul>
<ul>
<li>minimum quantity: <input type="text" name="min_threshold""></li>
</ul>
<ul>
<li>price per unit: <input type="text" name="unit_price"></li>
</ul>
<p><input type="submit" name="product_submit"/></p>
</form>

<!-- FORM MAKER -->  
<form name="maker" id="maker" style="display:none" action="" method="post";>
<h2>Update Manufacturer Information</h2>
<ul>
<li>manufacturer id: <input type="text" name="mid"></li>
</ul>
<ul>
<li>manufacturer: <input type="text" name="Manufacturer"></li>
</ul>
<ul>
<li>address: <input type="text" name="Address"></li>
</ul>
<ul>
<li>phone: <input type="tel" name="Phone"></li>
</ul>
<ul>
<li>website: <input type="url" name="Website"></li>
</ul>
<p><input type="submit" name="maker_submit"/></p>
</form>

<!-- CUSTOMER FORM -->
<form name="customer" id="customer" style="display:none" action="" method="post";>
<h2>Update Customer Information</h2>
<ul>
<li>customername: <input type="text" name="customername"></li>
</ul>
<ul>
<li>email: <input type="email" name="email"></li>
</ul>
<ul>
<li>address: <input type="text" name="address"></li>
</ul>
<p><input type="submit" name="customer_submit"/></p>
</form>

<!-- EMPLOYEE FORM -->
<form name="employee" id="employee" style="display:none" action="" method="post" ;>
<h2>Add a New Employee</h2>
<ul>
<li>employee name: <input type="text" name="ename"></li>
</ul>
<ul>
<li>store name: <input type="text" name="storename"></li>
</ul>	  	
<ul>
<li>job type (hourly or salary): <input type="text" name="job_type"></li>
</ul>
<ul>
<li>hours per week: <input type="text" name="hoursperweek"></li>
</ul>
<ul>
<li>wages: <input type="text" name="wages"></li>
</ul>
<ul>
<li>phone: <input type="tel" name="phone"></li>
</ul>
<ul>
<li>email: <input type="email" name="email"></li>
</ul>
<ul>
<li>SSN: <input type="text" name="ssn"></li>
</ul>
<p><input type="submit" name="employee_submit"/></p>
</form>

<!-- STORE FORM -->
<form name="store" id="store" style="display:none" action="" method="post";>
<h2>Add a New Store</h2>
<ul>
<li>store name: <input type="text" name="store"></li>
</ul>
<ul>
<li>email: <input type="email" name="email"></li>
</ul>
<ul>
<li>location: <input type="text" name="location"></li>
</ul>
<ul>
<li>phone: <input type="tel" name="phone"></li>
</ul>
<p><input type="submit" name="store_submit"/></p>
</form>

<!-- CARRIES FORM -->
<form name="carries" id="carries" style="display:none" action="" method="post";>
<h2>Carries</h2>
<ul>
<li>Enter the product: <input type="text" name="pname"></li>
</ul>
<ul>
<li>Enter the Store that carries the product: <input type="text" name="store"></li>
</ul>
<p><input type="submit" name="carries_submit"/></p>
</form>