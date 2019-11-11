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
        <th colspan="9" align="center">
            <h1 style="line-height:.1; ;">Rishal group of industies</h1>
            <p style="line-height:.1;">Plot#m-4/2, Section#14,Mirpur, Dhaka-1216</p>
            <p style="text-transform: uppercase; color:white; line-height:.1;"><strong style="background-color:black;">SIZE WISE CUTTING REPORT</strong></p>
        </th>
        <th colspan="8"></th>
      </tr>
      <tr>
        <th  colspan="3" align="left" >STLYE:</th>
        <th colspan="9" align="left" >&nbsp;</th>
        <th colspan="7" align="left">BUYER:</th>
      </tr>
      <tr>
        <th  colspan="3" align="left" >PO:</th>
        <th colspan="9" align="left" >&nbsp;</th>
        <th colspan="7" align="left">ITEM:</th>
      </tr>
      <tr>
        <th  colspan="3" align="left" >LINE:</th>
        <th colspan="9" align="left" >&nbsp;</th>
        <th colspan="7" align="left">Date:</th>
      </tr>
      <tr>
        <th colspan="19">&nbsp;</th>
      </tr>
      <tr align="center">
        <th style="border: 1px solid black;">COLOUR</th>
        <th style="border: 1px solid black;">DESCRIPTION</th>
        <th style="border: 1px solid black;" colspan="15">SIZE</th>
        <th style="border: 1px solid black;">TOTAL</th>

      </tr>

      <!-- First Table data strat -->
      <tr align="center">
        <td style="border: 1px solid black;" rowspan="2">&nbsp;</td>
        <td style="border: 1px solid black;">ORDER QTY</td>
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
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>

      </tr>
      <tr align="center">

        <td style="border: 1px solid black;">CUTTING</td>
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
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
      </tr>
      <tr align="center">
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">EXSS/SHORT CUTTING</td>
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
        <td style="border: 1px solid black;">&nbsp;</td>
        <td style="border: 1px solid black;">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="18" style="border: 1px solid black;">&nbsp;</td>
      </tr>
      <!-- First Table data End -->
      <!-- if you need more row then copy and paste start to end -->

      <tr>
        <th colspan="19">&nbsp;</th>
      </tr>
      <tr>
        <th colspan="19">&nbsp;</th>
      </tr>
      <tr>
        <th colspan="10" align="left"><p><strong style=" border-top:1px solid black; line-height:80px; margin-left:50px;">Cutting Incharge</strong></p></th>
        <th colspan="9" align="right" ><p><strong style=" border-top:1px solid black; line-height:80px; margin-right:50px;">Cutting Manager</strong></p></th>
      </tr>
    </table>
  </body>
</html>

'
);

$mpdf->Output();
?>
