<?php
$conn = db_connection();
if (isset($_POST['po']) && isset($_POST['style']) && isset($_POST['color']) && isset($_POST['item']) && isset($_POST['description']) && isset($_POST['qty']) && isset($_POST['ppu'])) {
	$po_number      = mysqli_real_escape_string($conn, $_POST['po']);
	$style          = mysqli_real_escape_string($conn, $_POST['style']);
	$color          = mysqli_real_escape_string($conn, $_POST['color']);
	$item           = mysqli_real_escape_string($conn, $_POST['item']);
	$description    = mysqli_real_escape_string($conn, $_POST['description']);
	$qty            = mysqli_real_escape_string($conn, $_POST['qty']);
	$price_per_unit = mysqli_real_escape_string($conn, $_POST['ppu']);
	$totalprice     = $qty * $price_per_unit;
	$user_id        = mysqli_real_escape_string($conn, get_ses('user_id'));

		$sql = "INSERT INTO pi_description (PIID,POID,StyleID,color,ItemID,Description,Qty,PricePerUnit,TotalPrice,AddedBy)

		values('$piid','$po_number','$style','$color','$item','$description','$qty','$price_per_unit','$totalprice','$user_id') ";

		if (mysqli_query($conn, $sql)) {
			notice('success', 'PI Description Added Successfully');
			nowgo('/index.php?page=single_pi&piid=' . $piid);
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	
}


if (isset($_GET['piddel'])) {
	$piddel = mysqli_real_escape_string($conn, $_GET['piddel']);

	$sql = "UPDATE pi_description SET Status=0 where PIDescriptionID=" . $piddel;
	if (mysqli_query($conn, $sql)) {
		notice('success', 'PI Description Deleted Successfully');
		nowgo('/index.php?page=single_pi&piid=' . $piid);
	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
	}
}
