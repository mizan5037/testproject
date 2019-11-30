<?php
require_once 'lib/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1 style="color:red">Hello Shuvo!</h1>');
$mpdf->Output();
