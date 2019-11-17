<?php
if (isset($_POST['date']) && $_POST['date'] != '' && $_POST['type'] != '' && isset($_POST['type'])) {


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
    $date    = $_POST['date'];
    $datearr = explode("-", $date);
    $month   = $datearr[1];
    $year    = $datearr[0];
    $type    = $_POST['type'];

    //Getting month name to print in report
    $monthName = date('F', mktime(0, 0, 0, $month, 10));

    //sql to get the data
    $sql = "SELECT Maturitydate, Issuedate, B2BLCNumber FROM b2blc WHERE YEAR(Maturitydate) = $year AND MONTH(Maturitydate) = $month ORDER BY Maturitydate ASC";
    $rows = mysqli_query($conn, $sql);

    //buffer Started
    ob_start();
    include "b2b_r.php";
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
