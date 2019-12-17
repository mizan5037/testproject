<?php
if (isset($_POST['po']) && $_POST['po'] != '' && $_POST['type'] != '' && isset($_POST['type'])) {


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
    $type = $_POST['type'];
    $po    = $_POST['po'];

    //get po details
    $posql = "SELECT p.PONumber, p.POFrom, p.PODate, p.special_note FROM po p WHERE p.POID = $po";
    $porow = mysqli_fetch_assoc(mysqli_query($conn, $posql));
    
    //sql to get the data
    $sql = "SELECT p.PrePackCode, p.PrepackQty, s.size FROM prepack p LEFT JOIN size s ON s.id = p.PrePackSize WHERE POID = $po";
    $rows = mysqli_query($conn, $sql);

    //buffer Started
    ob_start();
    include "packing_list_view.php";
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
