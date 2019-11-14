<?php
//Main Page

require_once 'config.php';
require_once 'lib/session.php';
require_once 'lib/database.php';
require_once 'lib/functions.php';
require_once 'lib/vendor/autoload.php';


$date = $_POST['date'];

$logo = $path . '/assets/images/risal.png';
$conn = db_connection();


$html = '
	<!DOCTYPE html>
	<html>
	<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: center;
  padding: 8px;
  font-size:16px;
  font-weight:bold; 
}


</style>
<body>



<table style="font-size: 8pt;" border="1pt">
	<thead>
		<tr>
			<th width="20%" style="border: 1px solid #000000;">
				<b>BUYER</b>
			</th>
			<th width="10%" style="border: 1px solid #000000;">
				<b>STYLE <br> No.</b>
			</th>
			<th width="10%" style="border: 1px solid #000000;">
				<b>PO.NO.</b>
			</th>
			<th width="10%" style="border: 1px solid #000000;">
				<b>COLOUR</b>
			</th>
			<th width="12%" style="border: 1px solid #000000;">
				<b> ORDER QTY</b>
			</th>
		
			<th width="10%" style="border: 1px solid #000000;">
				<b>TODAY<br>CUTTING</b>
			</th>
			<th width="10%" style="border: 1px solid #000000;">
				<b>TOTAL<br> CUTTING</b>
			</th>
			<th width="10%" style="border: 1px solid #000000;">
				<b>PRINT & EMB<br>SEND</b>
			</th>
			<th width="10%" style="border: 1px solid #000000;">
				<b>PRINT & EMB<br>RCVD</b>
			</th>
			<th width="10%" style="border: 1px solid #000000;">
				<b>TODAY<br> INPUT</b>
            </th>
            <th width="10%" style="border: 1px solid #000000;">
				<b>TOTAL <br> INPUT</b>
            </th>
            <th width="10%" style="border: 1px solid #000000;">
				<b>T.INPUT <br> BALANCE</b>
            </th>
            
            <th width="10%" style="border: 1px solid #000000;">
				<b>REMARKS</b>
			</th>
		</tr>
	</thead>
';

$total_today_cutting = 0;
$total_all_cutting = 0;
$total_print_emb_send = 0;
$total_print_emb_rcvd = 0;
$total_today_input = 0;
$total_all_input = 0;
$total_input_balance = 0;




$sql = "SELECT c.*,l.color,l.id as colorid,d.*,p.PONumber,s.StyleNumber,l.color,b.BuyerName,m.Qty totalorder FROM cutting_form c LEFT JOIN cutting_form_description d on d.CuttingFormID=c.CuttingFormID LEFT JOIN style s ON s.StyleID=c.StyleID LEFT JOIN color l on l.id=d.Color LEFT JOIN po p ON p.POID=c.POID LEFT JOIN masterlc_description m ON m.POID=c.POID LEFT JOIN masterlc t ON t.MasterLCID=m.MasterLCID LEFT JOIN buyer b ON b.BuyerID=t.MasterLCBuyer  where c.date='$date' order by c.POID";
//echo $sql."<br>";
$order = mysqli_query($conn, $sql);
while ($rowo = mysqli_fetch_assoc($order)) {

	$name = $rowo['BuyerName'];
	$style = $rowo['StyleNumber'];
	$po = $rowo['PONumber'];
	$color = $rowo['color'];
	$colorid = $rowo['colorid'];
	$totalorder = $rowo['totalorder'];
	$qty = $rowo['Qty'];
	$sewing = $rowo['sewing'];
	$embsent = $rowo['PrintEMBSent'];
	$embreceive = $rowo['PrintEmbReceive'];
	$remark = $rowo['remark'];

	$styleid = $rowo['StyleID'];
	$poid = $rowo['POID'];

	$sql2 = "SELECT d.Qty,d.sewing  FROM (SELECT * FROM cutting_form where StyleID=$styleid and POID=$poid and date = '$date') c LEFT JOIN (SELECT * FROM cutting_form_description where Color='$colorid') d on d.CuttingFormID=c.CuttingFormID ";
	$todaycut = mysqli_fetch_assoc(mysqli_query($conn, $sql2));

	$todaysewing = $todaycut['sewing'];

	$sql2 = "SELECT sum(d.Qty) totalcut,sum(d.sewing) totalsewing  FROM (SELECT * FROM cutting_form where StyleID=$styleid and POID=$poid and date = '$date') c LEFT JOIN (SELECT * FROM cutting_form_description where Color='$colorid') d on d.CuttingFormID=c.CuttingFormID ";

	$totalcut = mysqli_fetch_assoc(mysqli_query($conn, $sql2));
	$totalsewing = $totalcut['totalsewing'];
	$inputbalance = $totalcut['totalcut'] - $totalsewing;

	$total_today_cutting += $todaycut['Qty'];
	$total_all_cutting += $totalcut['totalcut'];
	$total_print_emb_send += $embsent;
	$total_print_emb_rcvd += $embreceive;
	$total_today_input +=  $todaysewing;
	$total_all_input += $totalsewing;
	$total_input_balance += $inputbalance;

	$html .= '	
		<tr>
		
			<td style="border: 1px solid #000000;">
			' . $name . '
			</td>
			<td style="text-align:left;border: 1px solid #000000;">
			' . $style . '
			</td>
			<td style="text-align:left;border: 1px solid #000000;">
			' . $po . '
			</td>
			<td style="border: 1px solid #000000;">
			' . $color . '
			</td>
			<td style="border: 1px solid #000000;">
            ' . $totalorder . '
			</td>
			<td style="border: 1px solid #000000;">
		    ' . $todaycut['Qty'] . '
			</td>
            <td style="border: 1px solid #000000;">
            ' . $totalcut['totalcut'] . '
			</td>
			<td style="border: 1px solid #000000;">
			' . $embsent . '
            </td>
            <td style="border: 1px solid #000000;">
			' . $embreceive . '
            </td>
            <td style="border: 1px solid #000000;">
			' . $todaysewing . '
            </td>
            <td style="border: 1px solid #000000;">
			' . $totalsewing . '
            </td>
            <td style="border: 1px solid #000000;">
			' . $inputbalance . '
            </td>
            
            <td style="border: 1px solid #000000;">
                ' . $remark . '
            </td>
        </tr>
			';
}
$html .= '
<tr>
		
			<td  style="border: 1px solid #000000;">
			Total
			</td>
			<td style="text-align:left;border: 1px solid #000000;">
			
			</td>
			<td style="text-align:left;border: 1px solid #000000;">
			
			</td>
			<td style="border: 1px solid #000000;">
			
			</td>
			<td style="border: 1px solid #000000;">
            
			</td>
			<td style="border: 1px solid #000000;">
		     ' . $total_today_cutting . '
			</td>
            <td style="border: 1px solid #000000;">
            ' . $total_all_cutting . '
			</td>
			<td style="border: 1px solid #000000;">
			' . $total_print_emb_send . '
            </td>
            <td style="border: 1px solid #000000;">
			' . $total_print_emb_rcvd . '
            </td>
            <td style="border: 1px solid #000000;">
			' . $total_today_input . '
            </td>
            <td style="border: 1px solid #000000;">
			' . $total_all_input . '
            </td>
            <td style="border: 1px solid #000000;">
			' . $total_input_balance . '
            </td>
            
            <td style="border: 1px solid #000000;">
               
            </td>
        </tr>';
$html .= '
</table>
</body>
</html>
	';

$mpdf = new \Mpdf\Mpdf(['format' => 'A4-L']);
$mpdf->setAutoTopMargin = 'stretch';

$mpdf->SetHTMLHeader('
<table style="font-size:9px; " width="100%"  >
	<tr>
		<td width="20%"><img src="' . $logo . '"   height="60" >
		</td>
		<td style="font-size:20px;" width="60%">
			<h3>RISHAL GROUP OF INDUSTRIES</h3>
			<h5>Sharoj Tower,Plot #M-4/2,Section-14,Mirpur,Dhaka-1216.</h5>
			<h4 style="padding-left:20px;"><u>DAILY CUTTING,PRINT & EMB REPORT</u></h4>

        </td>
        <td><h3><b>DATE:' . $date . '</b></h3></>
	</tr>
	
</table>
	');
$mpdf->SetHTMLFooter('
		<table style="border: hidden; margin-bottom: -7mm; ">
		  
		    <tr>
		        <td style="border: hidden; width:25%;"><hr width="80%">CUTTING INCHARGE</td>
				<td style="border: hidden; width:25%;"></td>
				<td style="border: hidden; width:25%;"></td>
				<td style="border: hidden; width:25%;"></td>
		      
		    </tr>

		</table>');
//echo $html;
$mpdf->WriteHTML($html);
$mpdf->Output();
