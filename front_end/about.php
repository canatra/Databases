<!DOCTYPE html>
<html>
  <?php
     include 'main.php';
     ?>
<body>

<h1>About</h1>
<div style="background-color:DarkTurquoise; color:white">
<h3>  <p>This is a project created for a Databases class. The project includes basic functions such as insert, update, delete and a basic search as well as an advanced search. </p>
<p>The insert function includes inserting new information into the category, product, manufacturer, customer, buy (transaction), employee, store and carries table. Inserting an existing product into the product table will increment that product by the quantity input. The update function, changes the values input for the product, manufacturer, employee, customer and store tables only. The delete function specifies the table and the attribute that will be used to find the row that will be deleted. For the basic search some simplifying assumptions were made. For the category, manufacturer, customer, product, employee, it is assumed that the search is done by their respective names. For the buy table the transaction id should be used, and for the carries table the product id should be used in the search. </p>
<p>In the advanced search there are several choices to select a search criteria to use. These include who, what, transaction, and all. Under the who selection, there are three other choices that can be made such as makes to find who makes a certain product (product name should be inserted), sells, to specify which store sells a product (again use product name for results), and works in to find all the employees that work in a specific store, storename should be used. To find what expires on a certain day, the what provides this search. (Possible update to use on, before, or on or before for expiration dates)</p>
<p> The transaction selection searches the transaction history for a transaction made on, before, or on or before to find transactions previously made. For the all selection, all products in a certain category are returned. An input of a category name is assumed.</p>
<p>
Possible upgrades:Finding all products sold on a certain day and/or the sales history of that produc (this could be used to predict trends, and estimate ordering needs), finding all products with quantities less than the threshold, a possible ordering history table could be added to keep track of how much the store has ordered 
</p> </h3>
<p>
<h4>
  Web Design: X. Gan <br>
Backend Dev: J. Bushnell
</h4>
</p>
</div>
</body>
</html>
