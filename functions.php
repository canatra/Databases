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
	
function insert(){
		
		
		
	}
	
}//function connection() 





?>
