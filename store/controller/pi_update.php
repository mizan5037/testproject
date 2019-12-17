<?php

if (isset($_POST['refno'])  && isset($_POST['date']) && isset($_POST['supplier']) && isset($_POST['po']) && isset($_POST['item']) && isset($_POST['description']) && isset($_POST['qty']) && isset($_POST['ppu']) && isset($_POST['totalprice'])) {
	$conn = db_connection();

	$reference_no = mysqli_real_escape_string($conn, $_POST['refno']);
	$date         = mysqli_real_escape_string($conn, $_POST['date']);
	$supplier     = mysqli_real_escape_string($conn, $_POST['supplier']);
	$user_id      = get_ses('user_id');

	$sql = "UPDATE pi SET RefNo='$reference_no',IssueDate='$date',SupplierName='$supplier' where PIID=" . $id;

	if (mysqli_query($conn, $sql)) {
		notice('success', ' PI updated Successfully');
		$last_id = mysqli_insert_id($conn);
	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
	}

	//PI Description Table
	$pidesid        = ($_POST['pidesid']);
	$po_number      = ($_POST['po']);
	$item           = ($_POST['item']);
	$description    = ($_POST['description']);
	$qty            = ($_POST['qty']);
	$price_per_unit = ($_POST['ppu']);
	$totalprice     = ($_POST['totalprice']);

	for ($i = 0; $i < sizeof($item); $i++) {

		$sql = "UPDATE pi_description SET POID='$po_number[$i]', ItemID='$item[$i]', Description='$description[$i]', Qty='$qty[$i]',PricePerUnit='$price_per_unit[$i]',TotalPrice='$totalprice[$i]' where PIDescriptionID=" . $pidesid[$i];

		if (mysqli_query($conn, $sql)) {
			notice('success', 'PI Updated Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}
	nowgo('/index.php?page=single_pi&piid=' . $id);
}
