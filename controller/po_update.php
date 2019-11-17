<?php
$conn = db_connection();
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
	isset($_POST['final_destination']) &&
	isset($_POST['style']) && $_POST['style'] != '' && isset($_POST['color']) && isset($_POST['clr_no']) && isset($_POST['dzs']) && isset($_POST['ppack']) && isset($_POST['units'])  && isset($_POST['size'])  && isset($_POST['ppk']) && isset($_POST['qty'])
) {


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
	$user_id             = get_ses('user_id');

	$sql = "UPDATE po SET
                                  PONumber             = '$po_number',
                                  POFrom               = '$from',
                                  PODate               = '$date',
                                  POCMPWH              = '$cmp_w_wanger',
                                  POCurrency           = '$currency',
                                  POSpecialInstruction = '$special_instruction',
                                  POFinalDestination   = '$final_destination',
                                  POCMP                = '$cmp',
                                  POWASH               = '$wash_cost',
                                  POHANGER             = '$hanger_cost',
                                  FOB                  = '$fob',
                                  AddedBy              = '$user_id'
                            where POID                 = '$id'";

	if (mysqli_query($conn, $sql)) {
		notice('success', 'New PO Updated Successfully');
	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
	}

	
	//prepack table
	$PrePackID = mysqli_real_escape_string($conn, $_POST['PrePackID']);
	$size      = mysqli_real_escape_string($conn, $_POST['size']);
	$ppk       = mysqli_real_escape_string($conn, $_POST['ppk']);
	$qty       = mysqli_real_escape_string($conn, $_POST['qty']);

	for ($i = 0; $i < sizeof($PrePackID); $i++) {

		$sql = "UPDATE prepack SET
                                          PrePackCode = '$ppk[$i]',
                                          PrePackSize = '$size[$i]',
                                          PrepackQty  = '$qty[$i]',
                                          AddedBy     = '$user_id'
                                    where PrePackID   = '$PrePackID[$i]'";

		if (mysqli_query($conn, $sql)) {
			notice('success', 'PO Updated Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}

	// ORDER DESCRIPTION

	$OrderdescriptionID = mysqli_real_escape_string($conn, $_POST['OrderdescriptionID']);
	$style              = mysqli_real_escape_string($conn, $_POST['style']);
	$color              = mysqli_real_escape_string($conn, $_POST['color']);
	$clr_no             = mysqli_real_escape_string($conn, $_POST['clr_no']);
	$dzs                = mysqli_real_escape_string($conn, $_POST['dzs']);
	$ppack              = mysqli_real_escape_string($conn, $_POST['ppack']);
	$units              = mysqli_real_escape_string($conn, $_POST['units']);



	for ($i = 0; $i < sizeof($OrderdescriptionID); $i++) {

		$sql = "UPDATE order_description SET
                                    StyleID     = '$style[$i]',
                                    Color       = '$color[$i]',
                                    ClrNo       = '$clr_no[$i]',
                                    Dzs         = '$dzs[$i]',
                                    PPack       = '$ppack[$i]',
                                    Units       = '$units[$i]',
                                    AddedBy     = '$user_id'
                                    where OrderdescriptionID  = '$OrderdescriptionID[$i]'";

		if (mysqli_query($conn, $sql)) {
			notice('success', 'PO Updated Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}
	nowgo('/index.php?page=po_single&poid=' . $id);
}


if (isset($_GET['orde'])) {
	$orderid = mysqli_real_escape_string($conn, $_GET['orde']);
	$id      = mysqli_real_escape_string($conn, $_GET['poid']);
	$sql     = "UPDATE order_description SET Status=0 where OrderdescriptionID='$orderid'";
	if (mysqli_query($conn, $sql)) {
		notice('success', 'Style Deleted From PO Successfully');
		nowgo('/index.php?page=po_single&poid=' . $id);
	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
	}
}

if (isset($_GET['preid'])) {
	$preid = mysqli_real_escape_string($conn, $_GET['preid']);
	$id    = mysqli_real_escape_string($conn, $_GET['poid']);
	$sql   = "DELETE FROM prepack  where PrePackID='$preid'";
	if (mysqli_query($conn, $sql)) {
		notice('success', ' PrePack Deleted Successfully');
	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
	}
	nowgo('/index.php?page=po_single&poid=' . $id);
}
