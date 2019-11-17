<?php
$conn = db_connection();
if (isset($_POST['item']) && $_POST['suppliername'] != '' && isset($_POST['chalan']) && isset($_POST['qty']) && isset($_POST['sortexs'])) {
    
    $item         = mysqli_real_escape_string($conn, $_POST['item']);
    $suppliername = mysqli_real_escape_string($conn, $_POST['suppliername']);
    $chalan       = mysqli_real_escape_string($conn, $_POST['chalan']);
    $qty          = mysqli_real_escape_string($conn, $_POST['qty']);
    $sortexs      = mysqli_real_escape_string($conn, $_POST['sortexs']);
    $user_id      = mysqli_real_escape_string($conn, get_ses('user_id'));

    
	for ($i = 0; $i < sizeof($item); $i++) {

		$sql = "INSERT INTO stationary_receive (ItemID,SupplierName,ChallanNo,ReceivedQty,Shortage,AddedBy)
		values('$item[$i]','$suppliername[$i]','$chalan[$i]','$qty[$i]','$sortexs[$i]','$user_id')";

		if (mysqli_query($conn, $sql)) {
			notice('success', 'New Item Received Stationary Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}
 
}
