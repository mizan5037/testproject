<?php
$conn = db_connection();

$sqlb = "SELECT BuyerID, BuyerName FROM buyer";
$results = mysqli_query($conn, $sqlb);
$buyerArr = array();
while ($result = mysqli_fetch_assoc($results)) {
    $buyerArr[] = $result;
}

function searchForBuyer($id, $array)
{
    for ($i = 0; $i < sizeof($array); $i++) {
        if ($array[$i]['BuyerID'] == $id) {
            return $array[$i]['BuyerName'];
        }
    }
    return null;
}

// echo searchForBuyer(5, $buyerArr);
// die();

