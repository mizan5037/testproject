<?php
$conn = db_connection();
if (isset($_POST['po']) && isset($_POST['item']) && isset($_POST['description']) && isset($_POST['qty']) && isset($_POST['ppu'])) {
	$po_number   = $_POST['po'];
	$item        = $_POST['item'];
	$description = $_POST['description'];
	$qty         		= $_POST['qty'];
	$price_per_unit   = $_POST['ppu'];
	$totalprice  = $qty * $price_per_unit;
	$user_id      = get_ses('user_id');

		$sql = "INSERT INTO pi_description (PIID,POID,ItemID,Description,Qty,PricePerUnit,TotalPrice,AddedBy)

		values('$piid','$po_number','$item','$description','$qty','$price_per_unit','$totalprice','$user_id') ";

		if (mysqli_query($conn, $sql)) {
			notice('success', 'PI Description Added Successfully');
			nowgo('/index.php?page=single_pi&piid=' . $piid);
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	
}


if (isset($_GET['piddel'])) {
	$piddel = $_GET['piddel'];

	$sql = "UPDATE pi_description SET Status=0 where PIDescriptionID=" . $piddel;
	if (mysqli_query($conn, $sql)) {
		notice('success', 'PI Description Deleted Successfully');
		nowgo('/index.php?page=single_pi&piid=' . $piid);
	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
	}
}
