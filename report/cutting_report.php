<?php
//Main Page

require_once 'config.php';
require_once 'lib/session.php';
require_once 'lib/database.php';
require_once 'lib/functions.php';
require_once 'lib/vendor/autoload.php';

$logo = $path . '/assets/images/risal.png';

$mpdf = new \Mpdf\Mpdf(['format' => 'A4-L']);
$mpdf->setAutoTopMargin = 'stretch';

$logo = $path . '/assets/images/risal.png';

$mpdf->WriteHTML(

'<!DOCTYPE html>
<html lang="en" dir="ltr">
  <body>
    <table style="text-transform: uppercase; border: 1px solid black;border-collapse: collapse;" width="100%">
      <tr>
        <th align="right" colspan="1"><img src="'. $logo.'" alt="llogo" height="50px" style=""></th>
        <th colspan="9" align="center">
            <h1 style="line-height:.1; ;">Rishal group of industies</h1>
            <p style="line-height:.1;">Plot#m-4/2, Section#14,Mirpur, Dhaka-1216</p>
            <p style="text-transform: uppercase; color:white; line-height:.1;"><strong style="background-color:black;">cUTtING rEPORT</strong></p>
        </th>
        <th colspan="2">Date:DD-MM-YEAR</th>
      </tr>
      <tr>
        <th colspan="2">Buyer Name:</th>
        <th colspan="10"></th>
      </tr>
      <tr>
        <th colspan="12">&nbsp;</th>
      </tr>
      <tr align="center">
        <th style="border: 1px solid black;">Style no</th>
        <th style="border: 1px solid black;">PO no</th>
        <th style="border: 1px solid black;">Colour</th>
        <th style="border: 1px solid black;">Order Qty</th>
        <th style="border: 1px solid black;">Cutting</th>
        <th style="border: 1px solid black;">EXss cut</th>
        <th style="border: 1px solid black;">Consumtuion</th>
        <th style="border: 1px solid black;">Fabric Reqd</th>
        <th style="border: 1px solid black;">Fabric Total Reqd</th>
        <th style="border: 1px solid black;">Fabric Used</th>
        <th style="border: 1px solid black;">Fabric Received</th>
        <th style="border: 1px solid black;">Balance Fabric</th>
      </tr>
      <tr>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
      </tr>
      <tr>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
      </tr>
      <tr>
        <th colspan="12">&nbsp;</th>
      </tr>
      <tr>
        <th colspan="12">&nbsp;</th>
      </tr>
      <tr>
        <th colspan="6" align="left"><p><strong style=" border-top:1px solid black; line-height:80px; margin-left:50px;">Cutting Incharge</strong></p></th>
        <th colspan="6" align="right" ><p><strong style=" border-top:1px solid black; line-height:80px; margin-right:50px;">Cutting Manager</strong></p></th>
      </tr>
    </table>
  </body>
</html>
'
);

$mpdf->Output();
?>
