<?php

if (
    isset($_GET['buyer']) &&
    $_GET['buyer'] != '' &&
    isset($_GET['color']) &&
    $_GET['color'] != '' &&
    isset($_GET['style']) &&
    $_GET['style'] != '' &&
    isset($_GET['po']) &&
    $_GET['po'] != ''
) {
    $conn = db_connection();

    $buyer = mysqli_real_escape_string($conn, $_GET['buyer']);
    $color = mysqli_real_escape_string($conn, $_GET['color']);
    $style = mysqli_real_escape_string($conn, $_GET['style']);
    $po    = mysqli_real_escape_string($conn, $_GET['po']);

    $sql   = "SELECT DISTINCT ir.*, i.ItemName, s.size, i.ItemMeasurementUnit FROM item_receive_access ir LEFT JOIN item i ON i.ItemID = ir.ItemID LEFT JOIN size s ON s.id = ir.Size WHERE ir.buyer = '$buyer' AND ir.ColorID = '$color' AND ir.StyleID = '$style' AND ir.POID = '$po'";
    $query = mysqli_query($conn, $sql);

    $sqlissue   = "SELECT DISTINCT ir.*, i.ItemName, s.size, i.ItemMeasurementUnit FROM item_issue_access ir LEFT JOIN item i ON i.ItemID = ir.ItemID LEFT JOIN size s ON s.id = ir.Size WHERE ir.buyer = '$buyer' AND ir.Color = '$color' AND ir.StyleID = '$style' AND ir.POID = '$po'";
    $queryissue = mysqli_query($conn, $sqlissue);

    $sqlttl = "SELECT b.BuyerID, b.BuyerName, c.id, c.color, s.StyleID, s.StyleNumber, p.POID, p.PONumber FROM buyer b , color c, style s, po p WHERE b.BuyerID = $buyer AND c.id = $color AND s.StyleID = $style AND p.POID = $po";
    $rowttl = mysqli_fetch_assoc(mysqli_query($conn, $sqlttl));
} else {
    nowgo('/index.php?page=item_stock');
}
