<?php
if (isset($_POST['masterlc']) && isset($_POST['type'])) {


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
    $masterlc    = $_POST['masterlc'];
    $type    = $_POST['type'];



    //sql to get the B2blc
    $sql = "SELECT b.B2BLCNumber,b.Issuedate,b.Maturitydate,sum(bi.TotalPrice) as Total FROM b2blc b LEFT JOIN b2b_item bi ON b.B2BLCID = bi.B2BLCID WHERE b.MasterLCID = '$masterlc' AND b.Status = '1' AND bi.Status = '1' GROUP BY b.B2BLCID";
    $rows = mysqli_query($conn, $sql);


    // sql to get master lc
    $masterLc = "SELECT m.MasterLCNumber,m.MasterLCID,m.MasterLCNumber,m.MasterLCIssueDate, m.MasterLCExpiryDate, m.MasterLCAmount,m.MasterLCCurrency FROM masterlc m WHERE Status = '1' AND m.MasterLCID ='$masterlc'";
    $masterLc = mysqli_fetch_assoc(mysqli_query($conn, $masterLc));

    //buffer Started
    ob_start();
    include "masterlc_report_r.php";
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
