<?php
$conn = db_connection();
if(isset($_POST['style'])){
    $stylenumber = $_POST['style'];
    $sql = "SELECT * FROM style WHERE StyleNumber = '$stylenumber'";
    $row = mysqli_query($conn, $sql);
}

function getDivision($ssid){
    global $conn;
    $sql = "SELECT order_description.StyleID, po.Division FROM po LEFT JOIN order_description ON  po.POID = order_description.POID WHERE order_description.StyleID = '$ssid'";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    return $result['Division'];
}

function getPrice($ssid){
    global $conn;
    $sql = "SELECT masterlc_description.Price, masterlc_description.StyleID, masterlc.MasterLCCurrency FROM masterlc_description LEFT JOIN masterlc ON masterlc_description.MasterLCID = masterlc.MasterLCID WHERE masterlc_description.StyleID = 9";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    return $result['MasterLCCurrency'] . " " . $result['Price'];
}