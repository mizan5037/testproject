<?php

$conn = db_connection();

$sqlpo     = "SELECT POID, PONumber FROM po WHERE status = 1";
$resultpos = mysqli_query($conn, $sqlpo);
$poArr     = array();
while ($resultpo = mysqli_fetch_assoc($resultpos)) {
    $poArr[] = $resultpo;
}

$sqlstyle     = "SELECT StyleID, StyleNumber FROM style WHERE status = 1";
$resultstyles = mysqli_query($conn, $sqlstyle);
$styleArr     = array();
while ($resultstyle = mysqli_fetch_assoc($resultstyles)) {
    $styleArr[] = $resultstyle;
}


if (
    isset($_POST['mlcnumber']) &&
    isset($_POST['mlcissuedate']) &&
    isset($_POST['mlcexpirydate']) &&
    isset($_POST['sender_bank']) &&
    isset($_POST['receiver_bank']) &&
    isset($_POST['buyer']) &&
    isset($_POST['lcissuedby']) &&
    isset($_POST['currency']) &&
    isset($_POST['amount']) &&
    isset($_POST['partialshipment']) &&
    isset($_POST['transshipment']) &&
    isset($_POST['portofloading']) &&
    isset($_POST['portofdischarge']) &&
    isset($_POST['description']) &&
    isset($_POST['pono']) &&
    isset($_POST['style']) &&
    isset($_POST['qty']) &&
    isset($_POST['unitname']) &&
    isset($_POST['price']) &&
    isset($_POST['lsdate'])
) {
    $mlcnumber       = mysqli_real_escape_string($conn, $_POST['mlcnumber']);
    $mlcissuedate    = mysqli_real_escape_string($conn, $_POST['mlcissuedate']);
    $mlcexpirydate   = mysqli_real_escape_string($conn, $_POST['mlcexpirydate']);
    $lcissuedby      = mysqli_real_escape_string($conn, $_POST['lcissuedby']);
    $buyer           = mysqli_real_escape_string($conn, $_POST['buyer']);
    $sender_bank     = mysqli_real_escape_string($conn, $_POST['sender_bank']);
    $receiver_bank   = mysqli_real_escape_string($conn, $_POST['receiver_bank']);
    $currency        = mysqli_real_escape_string($conn, $_POST['currency']);
    $amount          = mysqli_real_escape_string($conn, $_POST['amount']);
    $partialshipment = mysqli_real_escape_string($conn, $_POST['partialshipment']);
    $transshipment   = mysqli_real_escape_string($conn, $_POST['transshipment']);
    $portofloading   = mysqli_real_escape_string($conn, $_POST['portofloading']);
    $portofdischarge = mysqli_real_escape_string($conn, $_POST['portofdischarge']);
    $description     = mysqli_real_escape_string($conn, $_POST['description']);
    $user_id         = get_ses('user_id');

    $sql = "INSERT INTO masterlc (MasterLCNumber, MasterLCIssueDate, MasterLCExpiryDate, MasterLCIssuingCompany, MasterLCBuyer, MasterLCSenderBank, MasterLCReceiverBank, MasterLCCurrency, MasterLCAmount, MasterLCPartialShipment, MasterLCTranshipment, MasterLCPortOfLoading, MasterLCPortOfDischarge, Description, AddedBy)
		   	values('$mlcnumber', '$mlcissuedate', '$mlcexpirydate' ,'$lcissuedby', '$buyer', '$sender_bank', '$receiver_bank', '$currency', '$amount', '$partialshipment', '$transshipment', '$portofloading', '$portofdischarge', '$description', '$user_id')";

    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
        notice('success', 'Master LC Added Successfully.');
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }

    //array MasterLC Description
    $pono     = ($_POST['pono']);
    $style    = ($_POST['style']);
    $qty      = ($_POST['qty']);
    $unitname = ($_POST['unitname']);
    $price    = ($_POST['price']);
    $lsdate   = ($_POST['lsdate']);

    for ($i = 0; $i < sizeof($pono); $i++) {

        $sql = "INSERT INTO masterlc_description (MasterLCID, POID, StyleID, Qty, Unit, Price, LSDate, AddedBy)

		   		values('$last_id','$pono[$i]','$style[$i]','$qty[$i]','$unitname[$i]','$price[$i]','$lsdate[$i]','$user_id')";

        if (mysqli_query($conn, $sql)) {
            notice('success', 'Master LC Added Successfully.');
            nowgo('/index.php?page=all_master_lc');
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
            die();
        }
    }
}
