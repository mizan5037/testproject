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
    $sql = "SELECT hp.Date,f.floor_name,l.line,p.PONumber,p.POCMPWH,p.FOB,s.StyleNumber,c.color,hpd.* FROM hourly_production hp LEFT JOIN hourly_production_details hpd ON hp.HourlyProductionID = hpd.HourlyProductionID LEFT JOIN po p ON hpd.POID = p.POID LEFT JOIN Floor f ON f.floor_id = hp.FloorNO LEFT JOIN line l ON l.id = hpd.LineNo LEFT JOIN style s ON s.StyleID = hpd.StyleID LEFT JOIN color c ON c.id=hpd.Color  WHERE hp.Status = 1 AND hpd.status = 1 AND f.status = 1 AND p.Status = 1 AND c.status = 1 AND s.Status = 1 AND hp.Date = '$date' ORDER BY hp.Date DESC";
    $results = mysqli_query($conn, $sql);

    //buffer Started
    ob_start();
    include "hourly_swing_form_r.php";
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
