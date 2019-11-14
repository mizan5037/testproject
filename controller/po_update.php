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


	$from = $_POST['from'];
	$date = $_POST['date'];
	$po_number = $_POST['po_number'];
	$currency = $_POST['currency'];
	$cmp = $_POST['cmp'];
	$wash_cost = $_POST['wash_cost'];
	$hanger_cost = $_POST['hanger_cost'];
	$cmp_w_wanger = $_POST['cmp_w_wanger'];
	$fob = $_POST['fob'];
	$final_destination = $_POST['final_destination'];
	$special_instruction = $_POST['special_instruction'];
	$user_id = get_ses('user_id');

	echo $po_number . "<br>";

	$poid = $id;

	$sql = "UPDATE po SET
                            PONumber            = '$po_number',
                            POFrom              = '$from',
                            PODate              = '$date',
                            POCMPWH             = '$cmp_w_wanger',
                            POCurrency          = '$currency',
                            POSpecialInstruction= '$special_instruction',
                            POFinalDestination  = '$final_destination',
                            POCMP               = '$cmp',
                            POWASH              = '$wash_cost',
                            POHANGER            = '$hanger_cost',
                            FOB            			= '$fob',
                            AddedBy             = '$user_id'
                            where POID          =" . $poid;

	if (mysqli_query($conn, $sql)) {
		notice('success', 'New PO Updated Successfully');
	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
	}

	//prepack table
	$size = $_POST['size'];
	$ppk = $_POST['ppk'];
	$qty = $_POST['qty'];



	for ($i = 0; $i < sizeof($size); $i++) {

		$sql = "UPDATE prepack SET
                                    POID         = '$poid',
                                    PrePackCode  = '$ppk[$i]',
                                    PrePackSize  = '$size[$i]',
                                    PrepackQty   = '$qty[$i]',
                                    AddedBy      = '$user_id',
                                    where POID   =" . $poid;



		if (mysqli_query($conn, $sql)) {
			notice('success', 'PO Updated Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}

	// ORDER DESCRIPTION

	$style = $_POST['style'];
	$color = $_POST['color'];
	$clr_no = $_POST['clr_no'];
	$dzs = $_POST['dzs'];
	$ppack = $_POST['ppack'];
	$units = $_POST['units'];



	for ($i = 0; $i < sizeof($style); $i++) {

		$sql = "UPDATE order_description SET
                                    POID        = '$poid',
                                    StyleID     = '$style[$i]',
                                    Color       = '$color[$i]',
                                    ClrNo       = '$clr_no[$i]',
                                    Dzs         = '$dzs[$i]',
                                    PPack       = '$ppack[$i]',
                                    Units       = '$units[$i]',
                                    AddedBy     = '$user_id'
                                    where POID  =" . $poid;

		if (mysqli_query($conn, $sql)) {
			notice('success', 'PO Updated Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}
	nowgo('/index.php?page=all_po');
}


if (isset($_GET['orde'])) {
	$orderid = $_GET['orde'];
	$id = $_GET['poid'];
	$sql = "UPDATE order_description SET Status=0 where OrderdescriptionID='$orderid'";
	if (mysqli_query($conn, $sql)) {
		notice('success', 'Style Deleted From PO Successfully');
		nowgo('/index.php?page=po_single&poid=' . $id);
	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
	}
}

if (isset($_GET['preid'])) {
	$preid = $_GET['preid'];
	$id = $_GET['poid'];
	$sql = "DELETE FROM prepack  where PrePackID='$preid'";
	if (mysqli_query($conn, $sql)) {
		notice('success', ' PrePack Deleted Successfully');
	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
	}
	nowgo('/index.php?page=po_single&poid=' . $id);
}
