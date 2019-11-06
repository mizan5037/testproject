<?php
require_once '../config.php';
require_once '../lib/session.php';
require_once '../lib/database.php';
//linking Functions
require_once '../lib/functions.php';
$conn = db_connection();

$token = $_POST["token"];

if (get_ses('token') === $token && $_POST["form"] == 'get_style') {

    
    $po = $_POST["po"];


    $sql = "SELECT s.StyleID, s.StyleNumber FROM order_description o LEFT JOIN style s ON s.StyleID = o.StyleID WHERE o.POID = '$po'";
    $result = mysqli_query($conn, $sql);
    echo '<option>------</option>';
    while($row = mysqli_fetch_assoc($result)){
        echo '<option value="' . $row['StyleID'] . '">' . $row['StyleNumber'] . '</option>';
    }
}


if (get_ses('token') === $token && $_POST["form"] == 'get_qty') {

    $style = $_POST["style"];
    $po = $_POST["po"];

    $sql = "SELECT SUM(d.Units) FROM order_description d WHERE d.StyleID = '$style' AND d.POID = '$po'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo $row['SUM(d.Units)'];
    
}
