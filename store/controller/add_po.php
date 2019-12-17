<?php


if ( isset($_POST['po_number']) ) {
	$conn = db_connection();
	$po_number           = mysqli_real_escape_string($conn, $_POST['po_number']);
	$user_id             = mysqli_real_escape_string($conn, get_ses('user_id'));



	$sql = "INSERT INTO po (PONumber,AddedBy)

	values('$po_number','$user_id')";

	if (mysqli_query($conn, $sql)) {
		notice('success', 'New PO added Successfully');
		$last_id = mysqli_insert_id($conn);
	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
	}

	// //prepack table
	// $size = ($_POST['size']);
	// $ppk  = ($_POST['ppk']);
	// $qty  = ($_POST['qty']);



	// for ($i = 0; $i < sizeof($size); $i++) {

	// 	$sql = "INSERT INTO prepack (POID,PrePackCode,PrePackSize,PrepackQty,AddedBy)

	// 	values('$last_id','$ppk[$i]','$size[$i]','$qty[$i]','$user_id') ";



	// 	if (mysqli_query($conn, $sql)) {
	// 		notice('success', 'New PO added Successfully');
	// 	} else {
	// 		notice('error', $sql . "<br>" . mysqli_error($conn));
	// 	}
	// }

	// // ORDER DESCRIPTION

	// $style  = ($_POST['style']);
	// $color  = ($_POST['color']);
	// $clr_no = ($_POST['clr_no']);
	// $dzs    = ($_POST['dzs']);
	// $ppack  = ($_POST['ppack']);
	// $units  = ($_POST['units']);



	// for ($i = 0; $i < sizeof($style); $i++) {

	// 	$sql = "INSERT INTO order_description (POID,StyleID,Color,ClrNo,Dzs,PPack,Units,AddedBy)

	// 	values('$last_id','$style[$i]','$color[$i]','$clr_no[$i]','$dzs[$i]','$ppack[$i]','$units[$i]','$user_id')";

	// 	if (mysqli_query($conn, $sql)) {
	// 		notice('success', 'New PO added Successfully');
	// 	} else {
	// 		notice('error', $sql . "<br>" . mysqli_error($conn));
	// 	}
	// }



	nowgo('/index.php?page=all_po');
}
