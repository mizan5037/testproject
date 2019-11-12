<?php
//Main Page

require_once 'config.php';
require_once 'lib/session.php';
require_once 'lib/database.php';
require_once 'lib/functions.php';
require_once 'lib/vendor/autoload.php';


$date = $_POST['date'];
$buyer = $_POST['buyer'];
$conn = db_connection();

$sql = "SELECT * FROM buyer where BuyerID=".$buyer;
$buyername = mysqli_fetch_assoc(mysqli_query($conn, $sql));


$logo = $path . '/assets/images/risal.png';




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
			<th width="10%" style="border: 1px solid #000000; font-size:16px;">
				<b>STYLE</b>
			</th>
			<th width="10%" style="border: 1px solid #000000; font-size:16px;">
				<b>COLOR </b>
			</th>
			<th width="10%" style="border: 1px solid #000000; font-size:16px;">
				<b>Cons<br>um/dz.</b>
			</th>
			<th width="8%" style="border: 1px solid #000000; font-size:16px;">
				<b>Order Qty<br>(Pcs)</b>
			</th>
			<th width="10%" style="border: 1px solid #000000; font-size:16px;">
				<b>Today Fab.<br>Rec.</b>
			</th>
		
			
			<th width="10%" style="border: 1px solid #000000; font-size:16px;">
				<b>Total Fab. <br> Rec.</b>
			</th>
			<th width="10%" style="border: 1px solid #000000; font-size:16px;">
				<b>Total Rec.<br> Roll</b>
            </th>
            <th width="10%" style="border: 1px solid #000000; font-size:16px;">
				<b>Total Issue.<br> Roll</b>
            </th>
            <th width="10%" style="border: 1px solid #000000; font-size:16px;">
				<b>Fabric Req. with<br> Allowance</b>
            </th>
            <th width="10%" style="border: 1px solid #000000; font-size:16px;">
				<b>Today Issue<br> Fab.</b>
            </th>
            <th width="10%" style="border: 1px solid #000000; font-size:16px;">
				<b>Total Issue.<br> Fab</b>
            </th>
            <th width="10%" style="border: 1px solid #000000; font-size:16px;">
				<b>Fabric Balance</b>
            </th>
            <th width="10%" style="border: 1px solid #000000; font-size:16px;">
				<b>Total Balance<br> Roll</b>
			</th>
			
		</tr>
	</thead>
';

$totalcons = 0;
$totalorderqty = 0;
$totalorderqty = 0;
$total_today_fab_rec = 0;
$total_rec_roll = 0;
$total_issue_roll = 0;
$total_feb_required_allow = 0;
$total_today_fab_issue = 0;
$total_issue_fab = 0;
$total_fabric_balance = 0;
$total_balance_roll = 0;

$sql = "SELECT f.*, s.StyleNumber,c.color,c.id as colorid from buyer b LEFT JOIN masterlc m ON b.BuyerID = m.MasterLCBuyer LEFT JOIN masterlc_description md ON m.MasterLCID = md.MasterLCID LEFT JOIN fab_receive f ON md.POID = f.POID LEFT JOIN style s ON f.StyleID = s.StyleID LEFT JOIN color c ON f.Color = c.id WHERE NOT (s.StyleNumber <=> NULL) AND b.BuyerID='$buyer' GROUP BY f.StyleID,c.color";

$stylenumber = '';
$count = 0;
$fabric = mysqli_query($conn, $sql);
while ($rowo = mysqli_fetch_assoc($fabric)) {
    
    $poid = $rowo['POID'];
    $color = $rowo['colorid'];
    $styleid = $rowo['StyleID'];
    $sql = "SELECT sum(ReceivedRoll) totalreceiveroll FROM fab_receive where POID='$poid'  AND StyleID=".$rowo['StyleID'];
    $totalreceiveroll = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    $sql = "SELECT co.*,d.* FROM (SELECT * FROM fab_issue where POID='$poid' ) f LEFT JOIN fab_issue_description d on d.FabIssueID=f.FabIssueID LEFT JOIN  color co ON co.id=d.Color where d.Color='$color'" ;
    $issueroll = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    $sql2 = "SELECT d.Roll FROM (SELECT * FROM fab_issue where POID='$poid') f LEFT JOIN fab_issue_description d on d.FabIssueID=f.FabIssueID LEFT JOIN  color co ON co.id=d.Color where d.Color='$color' and Date(d.timestamp)='$date'  " ;
   
    $todayissue = mysqli_fetch_assoc(mysqli_query($conn, $sql2));

    $total_fab_rec += $rowo['ReceivedFab'];
    $total_rec_roll += $rowo['ReceivedRoll'];
    $total_issue_roll += $issueroll['Roll'];
    $total_today_fab_issue += $todayissue['Roll'];
    
   if ($stylenumber =='') {
       $stylenumber = $rowo['StyleNumber'];
   }

   if ($stylenumber != $rowo['StyleNumber'] && $stylenumber !='') {
         $stylenumber = $rowo['StyleNumber'];
         $count = 0;
   }
   if ($stylenumber==$rowo['StyleNumber']) {
       $count++;
   }

  

    $html .= '	
		<tr>
		
			<td style=" font-size:16px; border: 1px solid #000000;">
                 <b>'.$rowo['StyleNumber'].'</b>
			</td>
			<td style=" font-size:16px; text-align:left;border: 1px solid #000000;">
             <b>'.$rowo['color'].'</b>
			</td>
			<td style=" font-size:16px; text-align:left;border: 1px solid #000000;">
		
			</td>
			<td style=" font-size:16px; border: 1px solid #000000;">
		
			<td style=" font-size:16px; border: 1px solid #000000;">
           
			</td>
			<td style=" font-size:16px; border: 1px solid #000000;">
		    <b>'.$rowo['ReceivedFab'].'</b>
			</td>
            <td style=" font-size:16px; border: 1px solid #000000;">
             <b>'.$rowo['ReceivedRoll'].'</b>
			</td>
			
            <td style=" font-size:16px; border: 1px solid #000000;">
			 <b>'.$issueroll['Roll'].'</b>
            </td>
            <td style=" font-size:16px; border: 1px solid #000000;">
			0
            </td>
            <td style=" font-size:16px; border: 1px solid #000000;">
			 <b>'.$todayissue['Roll'].'</b>
            </td>
            <td style=" font-size:16px; border: 1px solid #000000;">
			0
            </td>
            <td style=" font-size:16px; border: 1px solid #000000;">
			0
            </td>
            <td style=" font-size:16px; border: 1px solid #000000;">
			0
            </td>
            
        </tr>
			';
}

$html .= '
<tr>
		
			<td colspan=2 style=" font-size:16px; border: 1px solid #000000;">
			    <b>Total</b>
			</td>
			
			<td style=" font-size:16px; text-align:left;border: 1px solid #000000;">
			 <b>'.$totalcons.'</b>
			</td>
			
			<td style=" font-size:16px; border: 1px solid #000000;">
             <b>'.$totalorderqty .'</b>
			</td>
			<td style=" font-size:16px; border: 1px solid #000000;">
		     <b>'.$total_today_fab_rec.'</b>
			</td>
            <td style=" font-size:16px; border: 1px solid #000000;">
             <b>'.$total_fab_rec.'</b>
			</td>
			<td style=" font-size:16px; border: 1px solid #000000;">
			 <b>'.$total_rec_roll.'</b>
            </td>
            <td style=" font-size:16px; border: 1px solid #000000;">
			 <b>'.$total_issue_roll.'</b>
            </td>
            <td style=" font-size:16px; border: 1px solid #000000;">
			 <b>'.$total_feb_required_allow.'</b>
            </td>
            <td style=" font-size:16px; border: 1px solid #000000;">
			 <b>'.$total_today_fab_issue.'</b>
            </td>
            <td style=" font-size:16px; border: 1px solid #000000;">
			 <b>'.$total_issue_fab.'</b>
            </td>
            <td style=" font-size:16px; border: 1px solid #000000;">
			 <b>'.$total_fabric_balance.'</b>
            </td>
            <td style=" font-size:16px; border: 1px solid #000000;">
			 <b>'.$total_balance_roll.'</b>
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
            <h5>Office:Plot #M-4/2,Section-14,Mirpur,Dhaka-1216.</h5>
			<h5>FABRIC REGISTER (STORE)</h5>
			<h4 ><u>BUYER:'.$buyername['BuyerName'].'</u></h4>

        </td>
        <td><h3><b></b></h3></>
	</tr>
	
</table>
	');
    $mpdf->SetHTMLFooter('
    <table style="border: hidden; margin-bottom: -7mm; ">
      
       <br><br>
        <tr>
            <td style="border: hidden; width:33.33%;"><hr width="80%"><b>Prepard By</b></td>
            <td style="border: hidden; width:33.33%;"><hr width="80%"><b>Store Officer</b></td>
            <td style="border: hidden; width:33.33%;"><hr width="80%"><b>Manager</b></td>
         
          
        </tr>

    </table>');
//echo $html;
$mpdf->WriteHTML($html);
$mpdf->Output();
