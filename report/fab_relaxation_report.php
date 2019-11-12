<?php
//Main Page

require_once 'config.php';
require_once 'lib/session.php';
require_once 'lib/database.php';
require_once 'lib/functions.php';
require_once 'lib/vendor/autoload.php';
$PageTitle = "FBRIC RELAXATION REPORT";


$logo = $path . '/assets/images/risal.png';

$mpdf = new \Mpdf\Mpdf(['format' => 'A4-L']);
$mpdf->SetTitle('FBRIC RELAXATION REPORT');

$mpdf->setAutoTopMargin = 'stretch';

$logo = $path . '/assets/images/risal.png';
$conn = db_connection();
// fab Relaxation
$fab_relax = "SELECT f.*,s.StyleNumber,b.BuyerName,c.color FROM fab_relaxation f LEFT JOIN color c ON f.Color = c.id LEFT JOIN style s on s.StyleID=f.StyleID LEFT JOIN buyer b ON b.BuyerID=f.BuyerID WHERE f.Status = 1 AND FabRelaxationID ='10'";
$fab_relax = mysqli_fetch_assoc(mysqli_query($conn, $fab_relax));


$fab_relax_details = "SELECT * FROM `fab_relaxation_description` WHERE Status = '1' AND FabRelaxationID = '10'";
$fab_relax_details = mysqli_query($conn, $fab_relax_details);



$html = '<!DOCTYPE html>
<html lang="en" dir="ltr">
  <body>
    <table style="text-transform: uppercase; border: 1px solid black;border-collapse: collapse;" width="100%">
      <tr>
        <th align="right" colspan="2"><img src="'. $logo.'" alt="llogo" height="50px" style=""></th>
        <th colspan="10" align="center">
            <h1 style="line-height:.1; ;">RISHAL GROUP OF INDUSTRIES</h1>
            <p style="line-height:.1;">PLOT#m-4/2, SECTION#14,MIRPUR, DHAKA-1216</p>
            <p style="text-transform: uppercase; color:white; line-height:.1;"><strong style="background-color:black;">FBRIC RELAXATION REPORT</strong></p>
            <p style="text-transform: uppercase;line-height:.1;"><strong>CUTTING SECTION</strong></p>
        </th>
        <th colspan="2"></th>
      </tr>
      <tr>
        <th colspan="5">BUYER:'.$fab_relax['BuyerName'].'</th>
        <th colspan="5">STYLE:'.$fab_relax['StyleNumber'].'</th>
        <th colspan="4">COLOUR:'.$fab_relax['color'].'</th>
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
        <th style="border: 1px solid black;">YDS</th>
        <th style="border: 1px solid black;">TOTAL YDS.</th>
        <th style="border: 1px solid black;">FABRIC OPEN TIME</th>
        <th style="border: 1px solid black;">FABTIC LAY DATE</th>
        <th style="border: 1px solid black;">FABTIC LAY TIME</th>
        <th style="border: 1px solid black;">TOTAL HOURS</th>
        <th style="border: 1px solid black;">REMARKS</th>
      </tr>
      ';
      foreach($fab_relax_details as $fab_relax_detail) {
        $html .= '<tr>
          <td style="border: 1px solid black;">'.$fab_relax_detail['Date'].'</td>
          <td style="border: 1px solid black;">'.$fab_relax_detail['Shade'].'</td>
          <td style="border: 1px solid black;">'.$fab_relax_detail['Shrinkage'].'</td>
          <td style="border: 1px solid black;">'.$fab_relax_detail['RollNo'].'</td>
          <td style="border: 1px solid black;">'.$fab_relax_detail['Yds'].'</td>
          <td style="border: 1px solid black;">'.$fab_relax_detail['Shade2'].'</td>
          <td style="border: 1px solid black;">'.$fab_relax_detail['Shrinkage2'].'</td>
          <td style="border: 1px solid black;">'.$fab_relax_detail['RollNo2'].'</td>
          <td style="border: 1px solid black;">'.$fab_relax_detail['Yds2'].'</td>
          <td style="border: 1px solid black;">'.$fab_relax_detail['TotalYds'].'</td>
          <td style="border: 1px solid black;">'.$fab_relax_detail['fabricOpenTime'].'</td>
          <td style="border: 1px solid black;">'.$fab_relax_detail['FabricLayDate'].'</td>
          <td style="border: 1px solid black;">'.$fab_relax_detail['FabricLayTime'].'</td>
          <td style="border: 1px solid black;">'.$fab_relax_detail['TotalHours'].'</td>
          <td style="border: 1px solid black;">'.$fab_relax_detail['Remarks'].'</td>

        </tr>
      ';}

      $html .= '
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
</html>';
$mpdf->WriteHTML($html);

$mpdf->Output();
?>
