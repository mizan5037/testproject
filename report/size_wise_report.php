<?php
//Main Page

require_once 'config.php';
require_once 'lib/session.php';
require_once 'lib/database.php';
require_once 'lib/functions.php';
require_once 'lib/vendor/autoload.php';
$conn = db_connection();

$logo = $path . '/assets/images/risal.png';

$mpdf = new \Mpdf\Mpdf(['format' => 'A4-L']);
$mpdf->setAutoTopMargin = 'stretch';

$logo = $path . '/assets/images/risal.png';



$cutiting_size = "SELECT distinct s.size FROM cutting_form_description cd LEFT JOIN Size s ON s.id = cd.Size";
$cutiting_size = mysqli_query($conn, $cutiting_size);

$cutting_color = "SELECT DISTINCT c.color FROM cutting_form_description cd LEFT JOIN color c ON cd.Color = c.id WHERE cd.Status = '1' AND c.status = '1'";
$cutting_color = mysqli_query($conn, $cutting_color);

// print_r($cutiting_size);
// $sized = sizeof($cutiting_size);


$html = '<!DOCTYPE html>
<html lang="en" dir="ltr">
  <body>
    <table style="text-transform: uppercase; border: 1px solid black;border-collapse: collapse;" width="100%">
      <tr>
        <th align="right" colspan="2"><img src="'. $logo.'" alt="llogo" height="50px" style=""></th>
        <th colspan="9" align="center">
            <h1 style="line-height:.1; ;">RISHAL GROUP OF INDUSTRIES</h1>
            <p style="line-height:.1;">PLOT#M-4/2, SECTION#14,MIRPUR, DHAKA-1216</p>
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
      <tr>
        <th colspan="19">
          <table>


        <th>
      </tr>
      <tr align="center">
        <th style="border: 1px solid black;">COLOUR</th>
        <th style="border: 1px solid black;">DESCRIPTION</th>
        <th style="border: 1px solid black;"></th>
        <th style="border: 1px solid black;">SIZE</th>
        <th style="border: 1px solid black;">TOTAL</th>
      </tr>

      <!-- First Table data strat -->
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
</html>';
$mpdf->WriteHTML($html);

$mpdf->Output();
?>
