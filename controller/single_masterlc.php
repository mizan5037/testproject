<?php
$conn = db_connection();

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
} else {
    nowgo('/index.php?page=all_master_lc');
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

//this function will return the value aginst ID from array
function searchForVal($id, $array, $IDcolumnName, $valueColumnName)
{
    for ($i = 0; $i < sizeof($array); $i++) {
        if ($array[$i][$IDcolumnName] == $id) {
            return $array[$i][$valueColumnName];
        }
    }
    return null;
}

$sql = "SELECT * FROM masterlc WHERE MasterLCID =  $id";
$mlc = mysqli_fetch_assoc(mysqli_query($conn, $sql));

