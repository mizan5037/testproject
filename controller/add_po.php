<?php


if (
	isset($_POST['from'])  &&
	isset($_POST['date']) &&
	isset($_POST['po_number']) &&
	isset($_POST['currency']) &&
	isset($_POST['cmp']) &&
	isset($_POST['wash_cost']) &&
	isset($_POST['hanger_cost']) &&
	isset($_POST['cmp_w_wanger']) &&
	isset($_POST['fob']) &&
	isset($_POST['style']) &&
	isset($_POST['color']) &&
	isset($_POST['clr_no']) &&
	isset($_POST['dzs']) &&
	isset($_POST['ppack']) &&
	isset($_POST['units'])  &&
	isset($_POST['size'])  &&
	isset($_POST['ppk']) &&
	isset($_POST['qty'])
) {
	$conn = db_connection();

	$from                = mysqli_real_escape_string($conn, $_POST['from']);
	$date                = mysqli_real_escape_string($conn, $_POST['date']);
	$po_number           = mysqli_real_escape_string($conn, $_POST['po_number']);
	$currency            = mysqli_real_escape_string($conn, $_POST['currency']);
	$cmp                 = mysqli_real_escape_string($conn, $_POST['cmp']);
	$wash_cost           = mysqli_real_escape_string($conn, $_POST['wash_cost']);
	$hanger_cost         = mysqli_real_escape_string($conn, $_POST['hanger_cost']);
	$cmp_w_wanger        = mysqli_real_escape_string($conn, $_POST['cmp_w_wanger']);
	$fob                 = mysqli_real_escape_string($conn, $_POST['fob']);
	$final_destination   = mysqli_real_escape_string($conn, $_POST['final_destination']);
	$special_instruction = mysqli_real_escape_string($conn, $_POST['special_instruction']);
	$division            = mysqli_real_escape_string($conn, $_POST['division']);
	$user_id             = mysqli_real_escape_string($conn, get_ses('user_id'));



	$sql = "INSERT INTO po (PONumber,POFrom,PODate,POCMPWH,POCurrency,POSpecialInstruction,POFinalDestination,POCMP,POWASH,POHANGER,FOB,Division,AddedBy)

	values('$po_number','$from','$date','$cmp_w_wanger' ,'$currency','$special_instruction','$final_destination','$cmp','$wash_cost','$hanger_cost','$fob','$division','$user_id')";

	if (mysqli_query($conn, $sql)) {
		notice('success', 'New PO added Successfully');
		$last_id = mysqli_insert_id($conn);
	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
	}

	//prepack table
	$size = mysqli_real_escape_string($conn, $_POST['size']);
	$ppk  = mysqli_real_escape_string($conn, $_POST['ppk']);
	$qty  = mysqli_real_escape_string($conn, $_POST['qty']);



	for ($i = 0; $i < sizeof($size); $i++) {

		$sql = "INSERT INTO prepack (POID,PrePackCode,PrePackSize,PrepackQty,AddedBy)

		values('$last_id','$ppk[$i]','$size[$i]','$qty[$i]','$user_id') ";



		if (mysqli_query($conn, $sql)) {
			notice('success', 'New PO added Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}

	// ORDER DESCRIPTION

	$style  = mysqli_real_escape_string($conn, $_POST['style']);
	$color  = mysqli_real_escape_string($conn, $_POST['color']);
	$clr_no = mysqli_real_escape_string($conn, $_POST['clr_no']);
	$dzs    = mysqli_real_escape_string($conn, $_POST['dzs']);
	$ppack  = mysqli_real_escape_string($conn, $_POST['ppack']);
	$units  = mysqli_real_escape_string($conn, $_POST['units']);



	for ($i = 0; $i < sizeof($style); $i++) {

		$sql = "INSERT INTO order_description (POID,StyleID,Color,ClrNo,Dzs,PPack,Units,AddedBy)

		values('$last_id','$style[$i]','$color[$i]','$clr_no[$i]','$dzs[$i]','$ppack[$i]','$units[$i]','$user_id')";

		if (mysqli_query($conn, $sql)) {
			notice('success', 'New PO added Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}



	nowgo('/index.php?page=all_po');
}
