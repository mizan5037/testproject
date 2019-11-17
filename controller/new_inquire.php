<?php
$conn = db_connection();
if (isset($_POST['style'])) {
    $stylenumber = mysqli_real_escape_string($conn, $_POST['style']);
    $sql         = "SELECT * FROM style WHERE StyleNumber = '$stylenumber'";
    $row         = mysqli_query($conn, $sql);
}

function getDivision($ssid)
{
    global $conn;
    $sql    = "SELECT order_description.StyleID, po.Division FROM po LEFT JOIN order_description ON  po.POID = order_description.POID WHERE order_description.StyleID = '$ssid' ORDER BY order_description.OrderdescriptionID DESC LIMIT 1";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    if ($result) {
        return $result['Division'];
    } else {
        return false;
    }
}

function getPrice($ssid)
{
    global $conn;
    $sql    = "SELECT masterlc_description.Price, masterlc_description.StyleID, masterlc.MasterLCCurrency FROM masterlc_description LEFT JOIN masterlc ON masterlc_description.MasterLCID = masterlc.MasterLCID WHERE masterlc_description.StyleID = '$ssid' ORDER BY masterlc_description.ID DESC LIMIT 1";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    if ($result) {
        return $result['MasterLCCurrency'] . " " . $result['Price'];
    } else {
        return false;
    }
}
