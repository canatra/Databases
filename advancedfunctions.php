<?php
include_once('functions.php');


function advancedSearch($option){
	 $conn = connection();

	 switch($option){

	 case "makes":
	    $advancedsearch ="select Manufacturer from makers natural join makes natural join product where productname = '".$_POST['advanced_keyword']."'" ;
	    $result = mysqli_query($conn, $advancedsearch);
//echo mysqli_num_rows($result);
	    	    if (mysqli_num_rows($result) == 0){
	   	     exit ("error");
	    	     }
  print '<td> Manufacturer </td><tr>';

	    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	    {

	    foreach ($row as $val){
		if (!empty($val))    
	   	 print  '<td>'.$val.'</td>';}
	    }

	    break;

	case "sells":
	     $advancedsearch = "select storename from Store natural join carries where carries.pid = (select pid from product where productname = '".$_POST['advanced_keyword']."')";
	    $result = mysqli_query($conn, $advancedsearch);
//echo mysqli_num_rows($result);
	    	    if (mysqli_num_rows($result) == 0){
	   	     exit ("error");
	    	     }
		     
     print '<td> Stores </td>';
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	    {

	    	    foreach ($row as $key => $val){
	    if (!empty($val))    
	   	 print  '<tr><td>'.$val.'</td></tr>';
	
		 }
	    
}
	     break;





}


	    


mysqli_close($conn);
	

	
}



?>
