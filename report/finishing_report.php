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
    $mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);


    //Getting Peramiters
    $date    = $_POST['date'];
    $type    = $_POST['type'];

    //Getting month name to print in report

    //sql to get the data
    $sql = "SELECT f.floor_name,l.line,p.PONumber,s.StyleNumber,c.color,hf.*	from	hourly_finishing_form  hf LEFT JOIN floor f ON f.floor_id = hf.Floor LEFT JOIN line l ON l.id = hf.line LEFT JOIN po p ON p.POID = hf.POID LEFT JOIN style s ON s.StyleID = hf.StyleID LEFT JOIN color c ON c.id = hf.Color WHERE hf.Status = 1 AND hf.date = '$date'";
    $rows = mysqli_query($conn, $sql);

    //buffer Started
    ob_start();
    include "finishing_report_r.php";
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
