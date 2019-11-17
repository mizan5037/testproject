<?php
if(isset($_POST['poid']) && isset($_POST['buyer']) && isset($_POST['type'])){

//Dependency
//Dependency
require_once 'config.php';
require_once 'lib/session.php';
require_once 'lib/database.php';
//linking Functions
require_once 'lib/functions.php';
require_once 'lib/vendor/autoload.php';
//Dependency

$conn  = db_connection();
$mpdf  = new \Mpdf\Mpdf();

$type  = $_POST['type'];
$poid  = $_POST['poid'];
$buyer = $_POST['buyer'];

$logo  = $_SERVER['DOCUMENT_ROOT'] .$path . '/assets/images/risal.png';


    //buffer Started


ob_start();
include "size_wise_r.php";
$template = ob_get_contents();
ob_end_clean();
  if ($type == 'view') {
      echo $template;
  }else {
      $mpdf->WriteHTML($template);
      $mpdf->Output();
  }
}else {
  echo "Something Went wrong";
}
