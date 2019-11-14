<?php
//Main Page
require_once 'config.php';
require_once 'lib/session.php';
require_once 'lib/database.php';
//linking Functions
require_once 'lib/functions.php';

require_once 'lib/vendor/autoload.php';

// $mpdf = new \Mpdf\Mpdf();
// $mpdf->WriteHTML('hi');
// $mpdf->Output();

$stylesheet = file_get_contents('');
