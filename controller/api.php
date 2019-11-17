<?php
require_once '../config.php';
require_once '../lib/session.php';
require_once '../lib/database.php';
//linking Functions
require_once '../lib/functions.php';
$conn = db_connection();

$token = mysqli_real_escape_string($conn, $_POST["token"]);

if (get_ses('token') === $token && $_POST["form"] == 'get_style') {
    $po = mysqli_real_escape_string($conn, $_POST["po"]);


    $sql = "SELECT DISTINCT s.StyleID, s.StyleNumber FROM order_description o LEFT JOIN style s ON s.StyleID = o.StyleID WHERE o.POID = '$po'";
    $result = mysqli_query($conn, $sql);
    echo '<option>------</option>';
    while($row = mysqli_fetch_assoc($result)){
        echo '<option value="' . $row['StyleID'] . '">' . $row['StyleNumber'] . '</option>';
    }
}


if (get_ses('token') === $token && $_POST["form"] == 'get_qty') {

    $style = mysqli_real_escape_string($conn, $_POST["style"]);
    $po    = mysqli_real_escape_string($conn, $_POST["po"]);

    $sql    = "SELECT SUM(d.Units) FROM order_description d WHERE d.StyleID = '$style' AND d.POID = '$po'";
    $result = mysqli_query($conn, $sql);
    $row    = mysqli_fetch_assoc($result);
    echo $row['SUM(d.Units)'];
    
}


if (get_ses('token') === $token && $_POST["form"] == 'get_line') {

    $floor = mysqli_real_escape_string($conn, $_POST["floor"]);

    $sql    = "SELECT line, id FROM line WHERE floor = '$floor'";
    $result = mysqli_query($conn, $sql);
    echo '<option>------</option>';
    while($row = mysqli_fetch_assoc($result)){
        echo '<option value="' . $row['id'] . '">' . $row['line'] . '</option>';
    }
    
}
