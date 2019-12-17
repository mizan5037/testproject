<?php
if (isset($_POST['date']) && isset($_POST['type'])) {


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
    $sql = "SELECT p.PONumber,s.StyleNumber,c.color, sf.date,sf.Qty,sf.Remark FROM carton_form sf LEFT JOIN po p ON p.POID = sf.POID LEFT JOIN style s ON s.StyleID = sf.StyleID LEFT JOIN color c ON c.id = sf.Color WHERE sf.Status = '1' AND sf.date = '$date' ";
    $rows = mysqli_query($conn, $sql);

    //buffer Started
    ob_start();
    include "packet_goods_r.php";
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
