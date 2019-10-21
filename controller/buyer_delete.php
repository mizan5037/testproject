<?php  
require_once '../config.php';
require_once '../lib/session.php';
require_once '../lib/database.php';
//linking Functions


    $conn = db_connection();
	$id = $_POST["id"];  

	$sql = "UPDATE buyer set status=0 where BuyerID=" . $id; 
	if(mysqli_query($conn, $sql))  
	{  
		echo 'Buyer Deleted Succefully';  
	}else {
		echo $sql . "<br>" . mysqli_error($conn); 
        
    }  

 ?>