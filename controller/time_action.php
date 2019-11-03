<?php

if (isset($_POST['from'])) {
	$conn = db_connection();
	$sql = "INSERT INTO po (PONumber,POFrom,PODate,POCMPWH,POCurrency,POSpecialInstruction,POFinalDestination,POCMP,POWASH,POHANGER,Division,AddedBy)
	values('$po_number','$from','$date','$cmp_w_wanger' ,'$currency','$special_instruction','$final_destination','$cmp','$wash_cost','$hanger_cost','$division','$user_id')";
	if (mysqli_query($conn, $sql)){
		notice('success', 'New PO added Successfully');
		$last_id = mysqli_insert_id($conn);
	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
	}
	nowgo('/index.php?page=all_po');
}
