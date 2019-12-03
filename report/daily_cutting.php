  <?php
  //Main Page
  if (isset($_POST['date']) && isset($_POST['buyer'])) {
    $date = $_POST['date'];
    $buyer = $_POST['buyer'];

    $conn = db_connection();
    require_once 'lib/vendor/autoload.php';

    $logo = $path . '/assets/images/risal.png';

    $mpdf                   = new \Mpdf\Mpdf(['format' => 'A4-L']);
    $mpdf->setAutoTopMargin = 'stretch';

    $logo = $path . '/assets/images/risal.png';

    $buyer_id   = "SELECT b.BuyerName FROM buyer b WHERE Status = '1' AND b.BuyerID = '$buyer'";
    $buyer_name = mysqli_fetch_assoc(mysqli_query($conn, $buyer_id))['BuyerName'];


    $sql = "SELECT s.StyleID,s.StyleNumber,p.POID,p.PONumber,c.id,c.color,od.OrderdescriptionID,od.Units,cd.Qty,(od.Units - cd.Qty) as ExssCut,fid.Consumption,fid.RqdQty,(cd.Qty * fid.Consumption) as FabUsed, fid.IssueQty as fabRecv, (fid.IssueQty - (cd.Qty * fid.Consumption)) as FabBlc FROM cutting_form_description cd LEFT JOIN cutting_form cf ON cf.CuttingFormID = cd.CuttingFormID LEFT JOIN po p ON p.POID = cf.POID LEFT JOIN style s ON s.StyleID = cf.StyleID LEFT JOIN color c ON c.id = cd.Color LEFT JOIN order_description od ON od.POID = p.POID  LEFT JOIN fab_issue fi ON fi.POID = cf.POID AND fi.StyleID = cf.StyleID LEFT JOIN fab_issue_description fid ON fid.FabIssueID = fi.FabIssueID WHERE od.Color = cd.Color AND cf.date = '$date' AND fi.BuyerID = '$buyer' AND cd.Status ='1' AND cf.Status = '1'";

    $cuuting_all = mysqli_query($conn, $sql);


    $html = '
<!DOCTYPE html>
<html lang = "en" dir = "ltr">
  <body>
    <table style = "text-transform: uppercase; border: 1px solid black;border-collapse: collapse;" width = "100%">
      <tr>
        <th align   = "right" colspan                                                         = "1"><img src = "' . $logo . '" alt = "llogo" height = "50px" style = ""></th>
        <th colspan = "8" align                                                               = "center">
        <h1 style   = "line-height:.1; ;">Rishal group of industies</h1>
        <p  style   = "line-height:.1;">Plot#m-4/2,                                            Section#14,    Mirpur,            Dhaka-1216</p>
        <p  style   = "text-transform: uppercase; color:white; line-height:.1;"><strong style = "background-color:black;">cUTtING rEPORT</strong></p>
        </th>
        <th colspan = "2">Date:' . $date . '</th>
      </tr>
      <tr>
        <th colspan = "12">Buyer Name:' . $buyer_name . '</th>
      </tr>
      <tr>
        <th colspan = "12">&nbsp;</th>
      </tr>
      <tr align = "center">
      <th style = "border: 1px solid black;">Style no</th>
      <th style = "border: 1px solid black;">PO no</th>
      <th style = "border: 1px solid black;">Colour</th>
      <th style = "border: 1px solid black;">Order Qty</th>
      <th style = "border: 1px solid black;">Cutting</th>
      <th style = "border: 1px solid black;">EXss cut</th>
      <th style = "border: 1px solid black;">Consumtuion</th>
      <th style = "border: 1px solid black;">Fabric Reqd</th>
      <th style = "border: 1px solid black;">Fabric Used</th>
      <th style = "border: 1px solid black;">Fabric Received</th>
      <th style = "border: 1px solid black;">Balance Fabric</th>
      </tr>';
    while ($cutting = mysqli_fetch_assoc($cuuting_all)) {
      $html .= '
      <tr>
        <td style = "border: 1px solid black;">' . $cutting['StyleNumber'] . '</td>
        <td style = "border: 1px solid black;">' . $cutting['PONumber'] . '</td>
        <td style = "border: 1px solid black;">' . $cutting['color'] . '</td>
        <td style = "border: 1px solid black;">' . $cutting['Units'] . '</td>
        <td style = "border: 1px solid black;">' . $cutting['Qty'] . '</td>
        <td style = "border: 1px solid black;">' . $cutting['ExssCut'] . '</td>
        <td style = "border: 1px solid black;">' . $cutting['Consumption'] . '</td>
        <td style = "border: 1px solid black;">' . $cutting['RqdQty'] . '</td>
        <td style = "border: 1px solid black;">' . $cutting['FabUsed'] . '</td>
        <td style = "border: 1px solid black;">' . $cutting['fabRecv'] . '</td>
        <td style = "border: 1px solid black;">' . $cutting['FabBlc'] . '</td>
      </tr>';
    }



    $html .= '
      <tr>
        <th colspan = "12">&nbsp;</th>
      </tr>
      <tr>
        <th colspan = "12">&nbsp;</th>
      </tr>
      <tr>
        <th colspan = "6" align = "left"><p><strong style   = " border-top:1px solid black; line-height:80px; margin-left:50px;">Cutting Incharge</strong></p></th>
        <th colspan = "6" align = "right" ><p><strong style = " border-top:1px solid black; line-height:80px; margin-right:50px;">Cutting Manager</strong></p></th>
      </tr>
    </table>
  </body>
</html>';

    $mpdf->WriteHTML($html);

    $mpdf->Output();
  } else {
    echo 'Something is wrong!!';
  }
  ?>
