<?php
if (isset($_POST['b2blc']) && isset($_POST['type'])) {


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

    //Getting Peramiters
    $b2blcid    = $_POST['b2blc'];
    $type    = $_POST['type'];



    //sql to get the B2blc
    $sql = "SELECT b.*, m.MasterLCNumber,m.MasterLCCurrency FROM b2blc b LEFT JOIN masterlc m ON m.MasterLCID = b.MasterLCID WHERE b.Status = '1' AND B2BLCID =  '$b2blcid'";
    $blc = mysqli_fetch_assoc(mysqli_query($conn,$sql));

    // sql to get b2b Item
    $b2bitem = "SELECT i.ItemName,s.StyleNumber,p.PONumber,bi.Qty,bi.PricePerUnit,bi.TotalPrice FROM b2b_item bi LEFT JOIN item i ON i.ItemID = bi.ItemID LEFT JOIN style s ON s.StyleID = bi.StyleID LEFT JOIN po p ON p.POID = bi.POID WHERE bi.Status = '1' AND bi.B2BLCID = '$b2blcid '";
    $b2bitem = mysqli_query($conn, $b2bitem);


    //buffer Started
    ob_start();
    include "b2blc_report_single_r.php";
    $template = ob_get_contents();
    ob_end_clean();
    //buffer cleaned

    if ($type == 'view') {
        echo $template;
    } else {
        $mpdf->WriteHTML($template);
        $mpdf->Output();
    }
} else {
    echo "Something is wrong!";
}
