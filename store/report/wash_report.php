<?php
if (isset($_POST['date']) && $_POST['date'] != '' && isset($_POST['type'])) {


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
    $type    = $_POST['type'];



    //sql to get the data
    $sql = "SELECT f.*,c.color,p.PONumber,p.POID,s.StyleNumber,s.StyleID FROM wash_form f LEFT JOIN po p on p.POID=f.POID LEFT JOIN style s on s.StyleID=f.StyleID LEFT JOIN color c ON c.id=f.Color WHERE f.Status=1 AND f.Date = '$date'";
    $results = mysqli_query($conn, $sql);

    //buffer Started
    ob_start();
    include "wash_report_r.php";
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
