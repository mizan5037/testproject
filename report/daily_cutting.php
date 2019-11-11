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
}


</style>
<body>



<table style="font-size: 8pt;" border="1pt">
	<thead>
		<tr>
			<td width="10%" style="border: 1px solid #000000;">
				<b>BUYER</b>
			</td>
			<td width="20%" style="border: 1px solid #000000;">
				<b>STYLE <br> No.</b>
			</td>
			<td width="18%" style="border: 1px solid #000000;">
				<b>PO.NO.</b>
			</td>
			<td width="8%" style="border: 1px solid #000000;">
				<b>COLOUR</b>
			</td>
			<td width="8%" style="border: 1px solid #000000;">
				<b> ORDER QTY</b>
			</td>
		
			<td width="10%" style="border: 1px solid #000000;">
				<b>TODAY<br>CUTTING</b>
			</td>
			<td width="10%" style="border: 1px solid #000000;">
				<b>TOTAL<br> CUTTING</b>
			</td>
			<td width="10%" style="border: 1px solid #000000;">
				<b>PRINT & EMB<br>SEND</b>
			</td>
			<td width="10%" style="border: 1px solid #000000;">
				<b>PRINT & EMB<br>RCVD</b>
			</td>
			<td width="10%" style="border: 1px solid #000000;">
				<b>TODAY<br> INPUT</b>
            </td>
            <td width="10%" style="border: 1px solid #000000;">
				<b>TOTAL <br> INPUT</b>
            </td>
            <td width="10%" style="border: 1px solid #000000;">
				<b>T.INPUT <br> BALANCE</b>
            </td>
            
            <td width="10%" style="border: 1px solid #000000;">
				<b>REMARKS</b>
			</td>
		</tr>
	</thead>
';

$sql = "SELECT c.*,d.*,p.PONumber,s.StyleNumber,l.color,b.BuyerName,m.Qty totalorder FROM cutting_form c LEFT JOIN cutting_form_description d on d.CuttingFormID=c.CuttingFormID LEFT JOIN style s ON s.StyleID=c.StyleID LEFT JOIN color l on l.id=d.Color LEFT JOIN po p ON p.POID=c.POID LEFT JOIN masterlc_description m ON m.POID=c.POID LEFT JOIN masterlc t ON t.MasterLCID=m.MasterLCID LEFT JOIN buyer b ON b.BuyerID=t.MasterLCBuyer  where c.date='$date' order by c.POID";
//echo $sql;

$order = mysqli_query($conn, $sql);

while ($rowo = mysqli_fetch_assoc($order)) {

    $name = $rowo['BuyerName'];
    $style = $rowo['StyleNumber'];
    $po = $rowo['PONumber'];
    $color = $rowo['color'];
    $totalorder = $rowo['totalorder'];
    $qty = $rowo['Qty'];
    $embsent = $rowo['PrintEMBSent'];
    $embreceive = $rowo['PrintEmbReceive'];
    $remark = $rowo['remark'];

    $styleid =$rowo['StyleID'];
    $poid=$rowo['POID'];
    
    $sql2 = "SELECT SUM(d.Qty) as totalcut FROM (SELECT * FROM cutting_form where StyleID=$styleid and POID=$poid and date = '$date') c LEFT JOIN cutting_form_description d on d.CuttingFormID=c.CuttingFormID ";
 
;
    $todaycut = mysqli_fetch_assoc(mysqli_query($conn, $sql2));

   





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
            '.$totalorder.'
			</td>
			<td style="border: 1px solid #000000;">
		    '.$todaycut['totalcut'].'
			</td>
            <td style="border: 1px solid #000000;">
            
			</td>
			<td style="border: 1px solid #000000;">
			' . $embsent . '
            </td>
            <td style="border: 1px solid #000000;">
			' . $embreceive . '
            </td>
            <td style="border: 1px solid #000000;">
			
            </td>
            <td style="border: 1px solid #000000;">
		
            </td>
            <td style="border: 1px solid #000000;">
		
            </td>
            
            <td style="border: 1px solid #000000;">
                ' . $remark . '
            </td>
        </tr>
			';
}
$html .= '
<tr>
		
			<td style="border: 1px solid #000000;">
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
		    
			</td>
            <td style="border: 1px solid #000000;">
            
			</td>
			<td style="border: 1px solid #000000;">
			
            </td>
            <td style="border: 1px solid #000000;">
			
            </td>
            <td style="border: 1px solid #000000;">
			
            </td>
            <td style="border: 1px solid #000000;">
		
            </td>
            <td style="border: 1px solid #000000;">
		
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
