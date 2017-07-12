<?php 
//Functions.php will be used to hold the functions that will be called from other scripts: connect, insert,delete, search-->

function connection(){
  $username='root';
	$password=$_POST['pwd'];
	$localhost = 'localhost';
	$db = 'Databases_Project';
	$conn = mysqli_connect($localhost, $username, $password);
	if($conn) { echo 'Connected <BR>';}
	else{ exit("Unable to connect to $db");}
	$db_selected = mysqli_select_db($conn, $db);
	if($db_selected) {echo 'Database selected'.'<BR>';}
	else { exit("$db not selected");}
	}//function connection() 

function insert($table, $attribute, $values){          
	//https://stackoverflow.com/questions/10054633/insert-array-into-mysql-database-with-php
		
	$columns = implode(", ",array_keys($attributes));
	$escaped_values =array_map('mysqli_real_escape_string', array_values($attributes));
	$values  = implode(", ", $escaped_values);
	$sql = "INSERT INTO $table($columns) VALUES ($values)";
		//not sure if this works
		
	}
	





?>
