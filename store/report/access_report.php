<?php
if(isset($_POST['buyer']) && isset($_POST['size']) && isset($_POST['item'])){
    //Dependency
    require_once 'config.php';
    require_once 'lib/session.php';
    require_once 'lib/database.php';
    //linking Functions
    require_once 'lib/functions.php';
    require_once 'lib/vendor/autoload.php';
    //Dependency

    $conn = db_connection();
    $mpdf = new \Mpdf\Mpdf();


    $type     = $_POST['type'];
    $buyer_id = $_POST['buyer'];
    $item_id    = $_POST['item'];
    $size_id  = $_POST['size'];

    //Getting month name to print in report
    $monthName = date('F', mktime(0, 0, 0, $month, 10));


    //
    $sql = "SELECT BuyerName FROM buyer where BuyerID = '$buyer_id'";
    $buyer_name = mysqli_fetch_assoc(mysqli_query($conn,$sql));
    $buyer_name = $buyer_name['BuyerName'];
    // 
    $sql = "SELECT ItemName FROM item where ItemID = '$item_id'";
    $item_name = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $item_name = $item_name['ItemName'];


    // 
    $sql = "SELECT size FROM size where id = '$size_id'";
    $size = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $size = $size['size'];


    //sql to get the data
    $sql = "SELECT DISTINCT i.ItemName ,p.PONumber,b.BuyerName,s.StyleNumber,sz.size,ir.Received,ir.TimeStamp FROM item i LEFT JOIN  item_receive_access ir ON ir.ItemID = i.ItemID LEFT JOIN size sz ON sz.id = ir.Size LEFT JOIN po p ON p.POID = ir.POID LEFT JOIN style s ON s.StyleID = ir.StyleID LEFT JOIN buyer b ON b.BuyerID = ir.buyer WHERE b.BuyerID = '$buyer_id'  AND sz.id = '$size_id' AND i.ItemID = ' $item_id' AND i.status = '1' AND ir.Status = '1'";
    $rows = mysqli_query($conn, $sql);



    $sql_issued = "SELECT DISTINCT sz.size,i.ItemName ,p.PONumber,b.BuyerName,s.StyleNumber,ir.Qty,ir.TimeStamp FROM item i LEFT JOIN item_issue_access ir ON ir.ItemID = i.ItemID LEFT JOIN size sz ON sz.id = ir.Size LEFT JOIN po p ON p.POID = ir.POID LEFT JOIN style s ON s.StyleID = ir.StyleID LEFT JOIN buyer b ON b.BuyerID = ir.buyer WHERE b.BuyerID = '$buyer_id' AND ir.Size = '$size_id' AND i.ItemID = ' $item_id' AND i.status = '1' AND ir.Status = '1'";
    $sql_issued = mysqli_query($conn, $sql_issued);

    //buffer Started
    ob_start();
    include "accessories.php";
    $template = ob_get_contents();
    ob_end_clean();
    //buffer cleaned

    if ($type == 'view') {
        echo $template;
    } else {
        $mpdf->WriteHTML($template);
        $mpdf->Output();
    }
}
else{
    echo "Somthing Went Wrong";
}
