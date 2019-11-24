<?php
if (isset($_POST['month']) && isset($_POST['type']) && isset($_POST['item'])) {
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


    $type       = $_POST['type'];
    $month_year = $_POST['month'];
    $month_yr      = explode("-", $month_year);
    $month      = $month_yr[1];
    $year       = $month_yr[0];
    $item_id    = $_POST['item'];

    //Getting month name to print in report

    $monthName = date('F', mktime(0, 0, 0, $month, 10));

    //Item Name
    $sql = "SELECT Name,MeasurmentUnit FROM stationary_item WHERE Status = '1' AND ID = '$item_id'";
    $items = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $item_name = $items['Name'];
    $item_m_unit = $items['MeasurmentUnit'];
  
    //sql to get the data
    $sql = "SELECT * FROM stationary_receive WHERE ItemID = '1' AND Status = '1' AND MONTH(timestamp) = '$month' AND YEAR(timestamp) = '$year'";
    $rows = mysqli_query($conn, $sql);
    



    $sql_issued = "SELECT * FROM stationary_issue WHERE ItemID = '1' AND Status = '1' AND MONTH(timestamp) = '$month' AND YEAR(timestamp) = '$year'";
    $sql_issued = mysqli_query($conn, $sql_issued);

    //buffer Started
    ob_start();
    include "stationery_report_r.php";
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
    echo "Somthing Went Wrong";
}
