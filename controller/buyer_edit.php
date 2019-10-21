<?php  
require_once '../config.php';
require_once '../lib/session.php';
require_once '../lib/database.php';
//linking Functions


    $conn = db_connection();
	$id = $_POST["id"];  
	$buyer_name = $_POST['buyer_name'];
	$text = $_POST["text"];  

	 
	$sql = "UPDATE buyer SET ".$text."='".$buyer_name."' WHERE BuyerID='".$id."'";  
	if(mysqli_query($conn, $sql))  
	{  
		echo 'Data Updated';  
	}else {
		echo $sql . "<br>" . mysqli_error($conn); 
        
    }  

 ?>