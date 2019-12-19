<?php
if (isset($_POST['buyer']) && $_POST['buyer'] != ''&&isset($_POST['po']) && isset($_POST['style']) && isset($_POST['color']) && $_POST['type'] != '' && isset($_POST['type'])) {


    //Dependency
    require_once 'config.php';
    require_once 'lib/session.php';
    require_once 'lib/database.php';
    //linking Functions
    require_once 'lib/functions.php';
    require_once 'lib/vendor/autoload.php';
    //Dependency

    $conn = db_connection();
    $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);


    //Getting Peramiters
    $type = $_POST['type'];

    $buyer = $_POST['buyer'];
    $po    = $_POST['po'];
    $style = $_POST['style'];
    $color = $_POST['color'];

    //Getting month name to print in report

    //sql to get the data
    $sql   = "SELECT DISTINCT ir.*, i.ItemName, s.size, i.ItemMeasurementUnit FROM item_receive_access ir LEFT JOIN order_description od ON ir.POID = od.POID LEFT JOIN item i ON i.ItemID = ir.ItemID LEFT JOIN size s ON s.id = ir.Size WHERE ir.buyer = '$buyer' AND ir.ColorID = '$color' AND ir.StyleID = '$style' AND ir.POID = '$po'";
    $query = mysqli_query($conn, $sql);

    $sqlissue   = "SELECT DISTINCT ir.*, i.ItemName, s.size, i.ItemMeasurementUnit FROM item_issue_access ir LEFT JOIN item i ON i.ItemID = ir.ItemID LEFT JOIN size s ON s.id = ir.Size WHERE ir.buyer = '$buyer' AND ir.Color = '$color' AND ir.StyleID = '$style' AND ir.POID = '$po'";
    $queryissue = mysqli_query($conn, $sqlissue);

    $sqlttl = "SELECT b.BuyerID, b.BuyerName, c.id, c.color, s.StyleID, s.StyleNumber, p.POID, p.PONumber FROM buyer b , color c, style s, po p WHERE b.BuyerID = 1 AND c.id = 1 AND s.StyleID = 1 AND p.POID = 1";
    $rowttl = mysqli_fetch_assoc(mysqli_query($conn, $sqlttl));

    //buffer Started
    ob_start();
    include "item_stock_r.php";
    $template = ob_get_contents();
    ob_end_clean();
    // buffer cleaned

    if ($type == 'view') {
        echo $template;
    } else {
        $mpdf->WriteHTML($template);
        $mpdf->Output();
    }
} else {
    echo "Something is wrong!";
}
