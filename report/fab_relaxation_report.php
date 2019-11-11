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
        <th align="right" colspan="2"><img src="'. $logo.'" alt="llogo" height="50px" style=""></th>
        <th colspan="10" align="center">
            <h1 style="line-height:.1; ;">Rishal group of industies</h1>
            <p style="line-height:.1;">Plot#m-4/2, Section#14,Mirpur, Dhaka-1216</p>
            <p style="text-transform: uppercase; color:white; line-height:.1;"><strong style="background-color:black;">FBRIC RELAXATION REPORT</strong></p>
            <p style="text-transform: uppercase;line-height:.1;"><strong>CUTTING SECTION</strong></p>
        </th>
        <th colspan="2"></th>
      </tr>
      <tr>
        <th colspan="5">Buyer Name:</th>
        <th colspan="5">STYLE:</th>
        <th colspan="4">COLOUR:</th>
      </tr>
      <tr>
        <th colspan="14">&nbsp;</th>
      </tr>
      <tr align="center">
        <th style="border: 1px solid black;">DATE</th>
        <th style="border: 1px solid black;">SHADE</th>
        <th style="border: 1px solid black;">SHRINKAGE%</th>
        <th style="border: 1px solid black;">ROLL NO.</th>
        <th style="border: 1px solid black;">YDS</th>
        <th style="border: 1px solid black;">SHADE</th>
        <th style="border: 1px solid black;">SHRINKAGE%</th>
        <th style="border: 1px solid black;">ROLL NO</th>
        <th style="border: 1px solid black;">TOTAL YDS.</th>
        <th style="border: 1px solid black;">FABRIC OPEN TIME</th>
        <th style="border: 1px solid black;">FABTIC LAY DATE</th>
        <th style="border: 1px solid black;">FABTIC LAY TIME</th>
        <th style="border: 1px solid black;">TOTAL HOURS</th>
        <th style="border: 1px solid black;">REMARKS</th>
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
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
      </tr>
      <tr>
        <th colspan="14">&nbsp;</th>
      </tr>
      <tr>
        <th colspan="14">&nbsp;</th>
      </tr>
      <tr>
        <th colspan="7" align="left"><p><strong style=" border-top:1px solid black; line-height:80px; margin-left:50px;">Cutting Incharge</strong></p></th>
        <th colspan="7" align="right" ><p><strong style=" border-top:1px solid black; line-height:80px; margin-right:50px;">Cutting Manager</strong></p></th>
      </tr>
    </table>
  </body>
</html>
'
);

$mpdf->Output();
?>
