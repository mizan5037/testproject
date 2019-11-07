<?php
require_once 'lib/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1 style="color:red">Hello '.$_POST['type'].'</h1>');
$mpdf->Output();
