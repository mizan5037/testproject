<?php

$sqlp     = "SELECT POID, PONumber FROM po";
$resultps = mysqli_query($conn, $sqlp);
$poArr    = array();
while ($resultp = mysqli_fetch_assoc($resultps)) {
    $poArr[] = $resultp;
}

$sqls     = "SELECT StyleID, StyleNumber FROM style";
$resultss = mysqli_query($conn, $sqls);
$styleArr = array();
while ($results = mysqli_fetch_assoc($resultss)) {
    $styleArr[] = $results;
}

$sqli     = "SELECT ItemID, ItemName FROM item";
$resultis = mysqli_query($conn, $sqli);
$itemArr  = array();
while ($resulti = mysqli_fetch_assoc($resultis)) {
    $itemArr[] = $resulti;
}

if (
    isset($_POST['masterlcid']) &&
    isset($_POST['b2blcnumber']) &&
    isset($_POST['suppliername']) &&
    isset($_POST['contactperson']) &&
    isset($_POST['contactnumber']) &&
    isset($_POST['address']) &&
    isset($_POST['issuedate']) &&
    isset($_POST['maturitydate']) &&
    isset($_POST['item']) &&
    isset($_POST['style']) &&
    isset($_POST['po']) &&
    isset($_POST['qty']) &&
    isset($_POST['ppu']) &&
    isset($_POST['tp'])
) {
    $masterlcid    = mysqli_real_escape_string($conn, $_POST['masterlcid']);
    $b2blcnumber   = mysqli_real_escape_string($conn, $_POST['b2blcnumber']);
    $suppliername  = mysqli_real_escape_string($conn, $_POST['suppliername']);
    $contactperson = mysqli_real_escape_string($conn, $_POST['contactperson']);
    $contactnumber = mysqli_real_escape_string($conn, $_POST['contactnumber']);
    $address       = mysqli_real_escape_string($conn, $_POST['address']);
    $issuedate     = mysqli_real_escape_string($conn, $_POST['issuedate']);
    $maturitydate  = mysqli_real_escape_string($conn, $_POST['maturitydate']);
    $user_id       = get_ses('user_id');

    $sql = "INSERT INTO b2blc (B2BLCNumber, MasterLCID, SupplierName, ContactPerson, ContactNumber, SupplierAddress, Issuedate, Maturitydate, AddedBy)

	values('$b2blcnumber','$masterlcid','$suppliername' , '$contactperson','$contactnumber', '$address', '$issuedate','$maturitydate','$user_id')";

    if (mysqli_query($conn, $sql)) {
        notice('success', 'New B2B LC added Successfully');
        $last_id = mysqli_insert_id($conn);
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }

    //array items
    $item  = mysqli_real_escape_string($conn, $_POST['item']);
    $style = mysqli_real_escape_string($conn, $_POST['style']);
    $po    = mysqli_real_escape_string($conn, $_POST['po']);
    $qty   = mysqli_real_escape_string($conn, $_POST['qty']);
    $ppu   = mysqli_real_escape_string($conn, $_POST['ppu']);
    $tp    = mysqli_real_escape_string($conn, $_POST['tp']);

    for ($i = 0; $i < sizeof($item); $i++) {

        $totalprice  = $qty[$i] * $price_per_unit[$i];

        $sql = "INSERT INTO b2b_item (B2BLCID, ItemID, StyleID, POID, Qty, PricePerUnit, TotalPrice, AddedBy)

		values('$last_id','$item[$i]','$style[$i]','$po[$i]','$qty[$i]','$ppu[$i]','$tp[$i]','$user_id') ";

        if (mysqli_query($conn, $sql)) {
            notice('success', 'New B2B LC added Successfully');
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }
    }

    nowgo('/index.php?page=all_b2b_lc');
}
