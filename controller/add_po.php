<?php

if (isset($_POST['from'])  && isset($_POST['date']) && isset($_POST['po_number']) && isset($_POST['currency']) && isset($_POST['cmp']) && isset($_POST['wash_cost']) && isset($_POST['hanger_cost']) && isset($_POST['cmp_w_wanger']) && isset($_POST['final_destination'])) {
	$conn = db_connection();

	$from = $_POST['from'];
	$date = $_POST['date'];
	$po_number = $_POST['po_number'];
	$currency = $_POST['currency'];
	$cmp = $_POST['cmp'];
	$wash_cost = $_POST['wash_cost'];
	$hanger_cost = $_POST['hanger_cost'];
	$cmp_w_wanger = $_POST['cmp_w_wanger'];
	$final_destination = $_POST['final_destination'];
	$special_instruction = $_POST['special_instruction'];
	$user_id = get_ses('user_id');

	$sql = "INSERT INTO po (PONumber,POFrom,PODate,POCMPWH,POCurrency,POSpecialInstruction,POFinalDestination,POCMP,POWASH,POHANGER,AddedBy)

	   		values('$po_number','$from','$DATE','$cmp_w_wanger' ,'$currency','$special_instruction','$final_destination','$cmp','$wash_cost','$hanger_cost','$user_id')";

	if (mysqli_query($conn, $sql)) {
		notice('success', 'New PO added Successfully');
	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
	}
	

	//nowgo('/index.php?page=all_po');
}


if (isset($_POST['po_number']) && isset($_POST['size'])  && isset($_POST['ppk']) && isset($_POST['qty'])) {

	$conn = db_connection();
	$po_number = $_POST['po_number'];
	$size = $_POST['size'];
	$ppk = $_POST['ppk'];
	$qty = $_POST['qty'];
	$user_id = get_ses('user_id');



	for ($i = 0; $i < sizeof($size); $i++) {

		$sql = "INSERT INTO prepack (POID,PrePackCode,PrePackSize,PrepackQty,AddedBy)

		   		values('$po_number','$ppk[$i]','$size[$i]','$qty[$i]','$user_id' ";

		   var_dump($sql);

		if (mysqli_query($conn, $sql)) {
			notice('success', 'New Order added Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}


}

if ( isset($_POST['po_number']) && isset($_POST['style']) && $_POST['style'] != '' && isset($_POST['color']) && isset($_POST['clr_no']) && isset($_POST['dzs']) && isset($_POST['ppack']) && isset($_POST['units'])) {

	$conn = db_connection();
	$po_number = $_POST['po_number'];
	$style = $_POST['style'];
	$color = $_POST['color'];
	$clr_no = $_POST['clr_no'];
	$dzs = $_POST['dzs'];
	$ppack = $_POST['ppack'];
	$units = $_POST['units'];
	$user_id = get_ses('user_id');


	for ($i = 0; $i < sizeof($style); $i++) {

		$sql = "INSERT INTO order_description (POID,StyleID,Color,ClrNo,Dzs,PPack,Units,AddedBy)

		   		values('$po_number','$style[$i]','$color[$i]','$clr_no[$i]','$dzs[$i]','$ppack[$i]','$units[$i]','$user_id')";

		if (mysqli_query($conn, $sql)) {
			notice('success', 'New Pre-Pack Assort added Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}

	nowgo('/index.php?page=all_item');
}
