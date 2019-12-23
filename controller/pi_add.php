<?php

if (isset($_POST['refno'])  && isset($_POST['date']) && isset($_POST['supplier']) && isset($_POST['po']) && isset($_POST['style']) && isset($_POST['color']) && isset($_POST['item']) && isset($_POST['description']) && isset($_POST['qty']) && isset($_POST['ppu'])) {
	$conn = db_connection();

	$reference_no = mysqli_real_escape_string($conn, $_POST['refno']);
	$date         = mysqli_real_escape_string($conn, $_POST['date']);
	$supplier     = mysqli_real_escape_string($conn, $_POST['supplier']);
	$user_id      = get_ses('user_id');



	$sql = "INSERT INTO pi (RefNo,IssueDate,SupplierName,AddedBy)

	values('$reference_no','$date','$supplier' ,'$user_id')";

	if (mysqli_query($conn, $sql)) {
		notice('success', 'New PI added Successfully');
		$last_id = mysqli_insert_id($conn);

	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
	}

  //PI Description Table

	$po_number      = ($_POST['po']);
	$style      	= ($_POST['style']);
	$color      	= ($_POST['color']);
	$item           = ($_POST['item']);
	$description    = ($_POST['description']);
	$qty            = ($_POST['qty']);
	$price_per_unit = ($_POST['ppu']);
	for ($i = 0; $i < sizeof($item); $i++) {

		$totalprice  = $qty[$i] * $price_per_unit[$i];

		$sql = "INSERT INTO pi_description (PIID,POID,StyleID,color,ItemID,Description,Qty,PricePerUnit,TotalPrice,AddedBy)

		values('$last_id','$po_number[$i]','$style[$i]','$color[$i]','$item[$i]','$description[$i]','$qty[$i]','$price_per_unit[$i]','$totalprice','$user_id') ";



		if (mysqli_query($conn, $sql)) {
			notice('success', 'New PI added Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}

	nowgo('/index.php?page=all_pi');
}
