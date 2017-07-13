 
 <!-- TABLE SELECTION -->
 <select id="tablemenu" name ="tablemenu" onchange = "showForm()" > </h3> 
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

<!-- FORM PRODCUCT -->  
<form name="product" id="product" style="display:none" action="" method="post" onSubmit="alert('insert in a new tuple!')";>
<h2>form product</h2>
<ul>
<li>pid: <input type="text" name="pid"></li>
</ul>
<ul>
<li>productname: <input type="text" ></li>
</ul>
<ul>
<li>exp_date: <input type="text" ></li>
</ul>
<ul>
<li>unitcost: <input type="text" ></li>
</ul>
<ul>
<li>min_threshold: <input type="text" ></li>
</ul>
<ul>
<li>quantity: <input type="text" ></li>
</ul>
<ul>
<li>unitprice: <input type="text" ></li>
</ul>
<ul>
<li>cid: <input type="text" ></li>
</ul>
<ul>
<li>mid: <input type="text" ></li>
</ul>
<p><input type="submit" name="product_submit"/></p>
</form>

<!-- FORM CATEGORY -->  
<form name="category" id="category" style="display:none" action="" method="post" onSubmit="alert('insert in a new tuple!')";>
<h2>form category</h2>
<ul>
<li>cid: <input type="text" name="cid"></li>
</ul>
<ul>
<li>categoryname: <input type="text" ></li>
</ul>
<ul>
<li>image: <input type="text" ></li>
</ul>
<ul>
<li>description: <input type="text" ></li>
</ul>

<p><input type="submit" name="category_submit"/></p>
</form>

<!-- FORM MAKER -->  
<form name="maker" id="maker" style="display:none" action="" method="post" onSubmit="alert('insert in a new tuple!')";>
<h2>form maker</h2>
<ul>
<li>mid: <input type="text" name="mid"></li>
</ul>
<ul>
<li>makername: <input type="text" ></li>
</ul>
<ul>
<li>address: <input type="text" ></li>
</ul>
<ul>
<li>phone: <input type="text" ></li>
</ul>
<ul>
<li>email: <input type="text" ></li>
</ul>
<p><input type="submit" name="maker_submit"/></p>
</form>

<!-- CUSTOMER FORM -->
<form name="customer" id="customer" style="display:none" action="" method="post" onSubmit="alert('insert in a new tuple!')";>
<h2>form customer </h2>
<ul>
<li>Card_num: <input type="text" ></li>
</ul>
<ul>
<li>customername: <input type="text" ></li>
</ul>
<ul>
<li>email: <input type="text" ></li>
</ul>
<ul>
<li>address: <input type="text" ></li>
</ul>
<p><input type="submit" name="customer_submit"/></p>
</form>

<!-- BUY FORM -->
<form name="buy" id="buy" style="display:none" action="" method="post" onSubmit="alert('insert in a new tuple!')";>
<h2>form buy</h2>
<ul>
<li>tid: <input type="text" ></li>
</ul>
<ul>
<li>pid: <input type="text" ></li>
</ul>
<ul>
<li>quantitySold: <input type="text" ></li>
</ul>
<ul>
<li>date: <input type="text" ></li>
</ul>
<ul>
<li>storeid: <input type="text" ></li>
</ul>
<ul>
<li>card_num: <input type="text" ></li>
</ul>
<p><input type="submit" name="buy_submit"/></p>
</form>

<!-- EMPLOYEE FORM -->
<form name="employee" id="employee" style="display:none" action="" method="post" onSubmit="alert('insert in a new tuple!')";>
<h2>form employee</h2>
<ul>
<li>employeeid: <input type="text" ></li>
</ul>
<ul>
<li>employeename: <input type="text" ></li>
</ul>
<ul>
<li>storeid: <input type="text" ></li>
</ul>
<ul>
<li>job_type: <input type="text" ></li>
</ul>
<ul>
<li>hoursperweek: <input type="text" ></li>
</ul>
<ul>
<li>wages: <input type="text" ></li>
</ul>
<ul>
<li>phone: <input type="text" ></li>
</ul>
<ul>
<li>email: <input type="text" ></li>
</ul>
<ul>
<li>direct_deposit: <input type="text" ></li>
</ul>
<ul>
<li>SSN: <input type="text" ></li>
</ul>
<p><input type="submit" name="employee_submit"/></p>
</form>

<!-- STORE FORM -->
<form name="store" id="store" style="display:none" action="" method="post" onSubmit="alert('insert in a new tuple!')";>
<h2>form store</h2>
<ul>
<li>storeid: <input type="text" ></li>
</ul>
<ul>
<li>email: <input type="text" ></li>
</ul>
<ul>
<li>storename: <input type="text" ></li>
</ul>
<ul>
<li>location: <input type="text" ></li>
</ul>
<ul>
<li>phone: <input type="text" ></li>
</ul>
<p><input type="submit" name="store_submit"/></p>
</form>

<!-- CARRIES FORM -->
<form name="carries" id="carries" style="display:none" action="" method="post" onSubmit="alert('insert in a new tuple!')";>
<h2>form carries</h2>
<ul>
<li>pid: <input type="text" ></li>
</ul>
<ul>
<li>storeid: <input type="text" ></li>
</ul>
<p><input type="submit" name="carries_submit"/></p>
</form>