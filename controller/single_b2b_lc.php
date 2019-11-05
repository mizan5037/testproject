<?php
$conn = db_connection();

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
} else {
    nowgo('/index.php?page=all_b2b_lc');
}


$sqlp = "SELECT POID, PONumber FROM po";
$resultps = mysqli_query($conn, $sqlp);
$poArr = array();
while ($resultp = mysqli_fetch_assoc($resultps)) {
    $poArr[] = $resultp;
}

$sqls = "SELECT StyleID, StyleNumber FROM style";
$resultss = mysqli_query($conn, $sqls);
$styleArr = array();
while ($results = mysqli_fetch_assoc($resultss)) {
    $styleArr[] = $results;
}

$sqli = "SELECT ItemID, ItemName FROM item";
$resultis = mysqli_query($conn, $sqli);
$itemArr = array();
while ($resulti = mysqli_fetch_assoc($resultis)) {
    $itemArr[] = $resulti;
}

$sqlm = "SELECT MasterLCID, MasterLCNumber FROM masterlc";
$resultms = mysqli_query($conn, $sqlm);
$masterlcArr = array();
while ($resultm = mysqli_fetch_assoc($resultms)) {
    $masterlcArr[] = $resultm;
}


//this function will return the value aginst ID from array
function searchForVal($id, $array, $IDcolumnName, $valueColumnName)
{
    for ($i = 0; $i < sizeof($array); $i++) {
        if ($array[$i][$IDcolumnName] == $id) {
            return $array[$i][$valueColumnName];
        }
    }
    return 'Error';
}

$sql = "SELECT * FROM b2blc WHERE B2BLCID =  $id";
$blc = mysqli_fetch_assoc(mysqli_query($conn, $sql));

if (isset($_POST['pono']) && isset($_POST['style']) && isset($_POST['qty']) && isset($_POST['unitname']) && isset($_POST['price']) && isset($_POST['lsdate'])) {
    //array MasterLC Description
    $pono  = $_POST['pono'];
    $style  = $_POST['style'];
    $qty  = $_POST['qty'];
    $unitname  = $_POST['unitname'];
    $price  = $_POST['price'];
    $lsdate  = $_POST['lsdate'];
    $user_id = get_ses('user_id');

    for ($i = 0; $i < sizeof($pono); $i++) {
        if ($pono[$i] != '') {

            $sql = "INSERT INTO masterlc_description (MasterLCID, POID, StyleID, Qty, Unit, Price, LSDate, AddedBy)

            values('$id','$pono[$i]','$style[$i]','$qty[$i]','$unitname[$i]','$price[$i]','$lsdate[$i]','$user_id')";

            if (mysqli_query($conn, $sql)) {
                notice('success', 'Master LC Added Successfully.');
                nowgo('/index.php?page=single_masterlc&id=' . $id);
            } else {
                notice('error', $sql . "<br>" . mysqli_error($conn));
                die();
            }
        }
    }
}


if (
    isset($_POST['blcnumber']) &&
    isset($_POST['blcissuedate']) &&
    isset($_POST['blcmaturitydate']) &&
    isset($_POST['masterlc']) &&
    isset($_POST['supplier']) &&
    isset($_POST['person']) &&
    isset($_POST['number']) &&
    isset($_POST['address'])
) {
    $blcnumber = $_POST['blcnumber'];
    $blcissuedate  = $_POST['blcissuedate'];
    $blcmaturitydate  = $_POST['blcmaturitydate'];
    $masterlc  = $_POST['masterlc'];
    $supplier  = $_POST['supplier'];
    $person  = $_POST['person'];
    $number  = $_POST['number'];
    $address  = $_POST['address'];

    $sql = "UPDATE b2blc SET
    B2BLCNumber = '$blcnumber',
    MasterLCID = '$masterlc',
    SupplierName = '$supplier',
    ContactPerson = '$person',
    ContactNumber = '$number',
    SupplierAddress = '$address',
    Issuedate = '$blcissuedate',
    Maturitydate = '$blcmaturitydate'
    WHERE B2BLCID = '$id'";

    if (mysqli_query($conn, $sql)) {
        notice('success', 'B2B LC Updated Successfully.');
        nowgo('/index.php?page=single_b2b_lc&id=' . $id);
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sid = $_GET['id'];
    $sql = "DELETE FROM b2b_item  WHERE ID=" . $id;

    if (mysqli_query($conn, $sql)) {
        notice('success', 'B2B Order Deleted Successfully');
        nowgo('/index.php?page=single_b2b_lc&id=' . $sid);
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
}
