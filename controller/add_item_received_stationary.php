<?php
$conn = db_connection();
if (isset($_POST['item']) && $_POST['suppliername'] != '' && isset($_POST['chalan']) && isset($_POST['qty']) && isset($_POST['sortexs'])) {

    $item         = ($_POST['item']);
    $suppliername = ($_POST['suppliername']);
    $chalan       = ($_POST['chalan']);
    $qty          = ($_POST['qty']);
    $sortexs      = ($_POST['sortexs']);
    $user_id      = (get_ses('user_id'));


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
