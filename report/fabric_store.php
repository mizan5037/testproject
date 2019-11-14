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
td{
    text-align:center;
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



$sql = "SELECT f.*, s.StyleNumber,c.color,c.id as colorid from buyer b LEFT JOIN masterlc m ON b.BuyerID = m.MasterLCBuyer LEFT JOIN masterlc_description md ON m.MasterLCID = md.MasterLCID LEFT JOIN fab_receive f ON md.POID = f.POID LEFT JOIN style s ON f.StyleID = s.StyleID LEFT JOIN color c ON f.Color = c.id WHERE NOT (s.StyleNumber <=> NULL) AND b.BuyerID='$buyer' GROUP BY f.StyleID,c.color";

$stylenumber = '';
$count = 0;
$fabric = mysqli_query($conn, $sql);
$i = 0;
$total_today_fab_receive = 0;
$total_fab_receive = 0;
$total_rec_roll = 0;
$total_issue_roll = 0;
$total_today_issue_fab = 0;
$total_issue_fab = 0;
$total_fab_balance=0;
$total_balance_roll = 0;

while ($rowo = mysqli_fetch_assoc($fabric)) {
    

    $poid = $rowo['POID'];
    $color = $rowo['colorid'];
    $styleid = $rowo['StyleID'];
    $sql = "SELECT sum(ReceivedFab) totalReceivedFab FROM fab_receive where POID='$poid'  AND StyleID=".$rowo['StyleID'];
    $totalReceivedFab = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    $sql = "SELECT ReceivedFab FROM fab_receive where POID='$poid'  AND StyleID='$styleid' AND  Date(timestamp)='$date'  GROUP BY StyleID ";
    $todayreceiveroll = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    $sql = "SELECT sum(ReceivedRoll) ReceivedRoll FROM fab_receive where POID='$poid'  AND StyleID='$styleid'   GROUP BY StyleID ";
    $totalreceivedroll = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    $sql = "SELECT sum(d.Roll) Roll FROM (SELECT * FROM fab_issue where POID='$poid' ) f LEFT JOIN fab_issue_description d on d.FabIssueID=f.FabIssueID LEFT JOIN  color co ON co.id=d.Color where d.Color='$color'" ;
    $issueroll = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    $sql = "SELECT count(*) totalcount FROM (SELECT * FROM fab_issue where POID='$poid' ) f LEFT JOIN fab_issue_description d on d.FabIssueID=f.FabIssueID LEFT JOIN  color co ON co.id=d.Color where d.Color='$color' group by d.Color" ;
    $totalcount = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    

   
    $sql = "SELECT sum(d.IssueQty) IssueQty FROM (SELECT * FROM fab_issue where POID='$poid' ) f LEFT JOIN fab_issue_description d on d.FabIssueID=f.FabIssueID LEFT JOIN  color co ON co.id=d.Color where d.Color='$color'" ;
    $totalissuefab = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    $sql2 = "SELECT d.IssueQty FROM (SELECT * FROM fab_issue where POID='$poid') f LEFT JOIN (select * from fab_issue_description where Color='$color' and Date(timestamp)='$date')  d on d.FabIssueID=f.FabIssueID LEFT JOIN  color co ON co.id=d.Color  " ;
    $todayissue = mysqli_fetch_assoc(mysqli_query($conn, $sql2));

    $sql = "SELECT count(*) totalcolor FROM fab_receive where POID='$poid'  AND StyleID=".$rowo['StyleID'];

    $totalcolor = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $fabric_balance = $totalReceivedFab['totalReceivedFab']-$totalissuefab['IssueQty'];
    $balance_roll = $totalreceivedroll['ReceivedRoll']-$issueroll['Roll'];

    if ($totalcount['totalcount']<$i) {
        $totalissuefab =0;
        $issueroll = 0;
        $todayissue = 0;
    }
    $i++;

  


   $total_today_fab_receive+=$todayreceiveroll['ReceivedFab'];
   $total_fab_receive +=$totalReceivedFab['totalReceivedFab'];
   $total_rec_roll += $totalreceivedroll['ReceivedRoll'];
   $total_issue_roll +=  $issueroll['Roll'];
   $total_today_issue_fab += $todayissue['IssueQty'];
   $total_issue_fab += $totalissuefab['IssueQty'];
   $total_fab_balance += $fabric_balance;
   $total_balance_roll += $balance_roll;


   
    $html .= '	
		<tr>
		
			<td style=" font-size:16px; border: 1px solid #000000;">
                 <b>'.$rowo['StyleNumber'].'</b>
			</td>
			<td style=" font-size:16px; border: 1px solid #000000;">
             <b>'.$rowo['color'].'</b>
			</td>
			
			<td style=" font-size:16px; border: 1px solid #000000;">
           '.$todayreceiveroll['ReceivedFab'].'
			</td>
			<td style=" font-size:16px; border: 1px solid #000000;">
		    <b>'.$totalReceivedFab['totalReceivedFab'].'</b>
			</td>
            <td style=" font-size:16px; border: 1px solid #000000;">
             <b>'.$totalreceivedroll['ReceivedRoll'].'</b>
			</td>
			
            <td style=" font-size:16px; border: 1px solid #000000;">
			 <b>'.$issueroll['Roll'].'</b>
            </td>
            <td style=" font-size:16px; border: 1px solid #000000;">
			0
            </td>
            <td style=" font-size:16px; border: 1px solid #000000;">
			 <b>'.$todayissue['IssueQty'].'</b>
            </td>
            <td style=" font-size:16px; border: 1px solid #000000;">
			'.$totalissuefab['IssueQty'].'
            </td>
            <td style=" font-size:16px; border: 1px solid #000000;">
			'.$fabric_balance.'
            </td>
            <td style=" font-size:16px; border: 1px solid #000000;">
			'.$balance_roll.'
            </td>
            
        </tr>
			';
}

$total_particular_issue = 0;


$pocket = "SELECT f.*,c.id as colorid,c.color FROM fab_receive_other f LEFT JOIN color c ON c.id=f.Color where f.BuyerID='1' order by f.ContrastPocket   ";

$fabric = mysqli_query($conn, $pocket);
$b = 0;
while ($result = mysqli_fetch_assoc($fabric)) {

    $color = $result['colorid'];
    $buyerid = $result['BuyerID'];
    $contrast = $result['ContrastPocket'];

    $sql = "SELECT * FROM fab_receive_other where BuyerID='$buyer' AND Color='$color' AND  Date(timestamp)='$date'";
    $todayreceive = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    $sql = "SELECT sum(ReceivedFab) ReceivedFab,sum(ReceivedRoll) ReceivedRoll FROM fab_receive_other where BuyerID='$buyer' and ContrastPocket='$contrast' and Color='$color' ";
    $totalreceive = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    $sql = "SELECT sum(d.Roll) totalroll FROM (SELECT * FROM fabric_issue_other WHERE BuyerID='$buyer' AND ContrastPocket='$contrast') f LEFT JOIN (select * from fabric_issue_other_description where Color='$color') d ON d.FabricIssueotherID=f.ID";
    $totalroll = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    $sql = "SELECT d.IssueQty FROM (SELECT * FROM fabric_issue_other WHERE BuyerID='$buyer' AND ContrastPocket='$contrast') f LEFT JOIN  (select * from fabric_issue_other_description where Color='$color' and Date(timestamp)='$date') d ON d.FabricIssueotherID=f.ID";
    $todayissuefab= mysqli_fetch_assoc(mysqli_query($conn, $sql));



    $sql = "SELECT sum(d.IssueQty) IssueQty FROM (SELECT * FROM fabric_issue_other WHERE BuyerID='$buyer' AND ContrastPocket='$contrast') f LEFT JOIN (select * from fabric_issue_other_description where Color='$color') d ON d.FabricIssueotherID=f.ID where  Date(d.timestamp)='$date'";
 
    $total_issue_todayfab= mysqli_fetch_assoc(mysqli_query($conn, $sql));

    $fabric_balace_contra = $totalreceive['ReceivedFab']-$total_issue_todayfab['IssueQty'];

    $fabric_balace_contra_roll = $totalreceive['ReceivedRoll']-$totalroll['totalroll'];

   
    $html .= '	
		<tr>
		
			<td style=" font-size:16px; border: 1px solid #000000;">
                 <b>'.$result['ContrastPocket'].'</b>
			</td>
			<td style=" font-size:16px;border: 1px solid #000000;">
             <b>'.$result['color'].'</b>
			</td>
			
			<td style=" font-size:16px; border: 1px solid #000000;">
           '.$todayreceive['ReceivedFab'].'
			</td>
			<td style=" font-size:16px; border: 1px solid #000000;">
            '.$totalreceive['ReceivedFab'].'
			</td>
            <td style=" font-size:16px; border: 1px solid #000000;">
            <b> '.$totalreceive['ReceivedRoll'].'</b>
			</td>
			
            <td style=" font-size:16px; border: 1px solid #000000;">
			 <b>'.$totalroll['totalroll'].'</b>
            </td>
            <td style=" font-size:16px; border: 1px solid #000000;">
			0
            </td>
            <td style=" font-size:16px; border: 1px solid #000000;">
            '.$todayissuefab['IssueQty'].'
            </td>
            <td style=" font-size:16px; border: 1px solid #000000;">
			'.$total_issue_todayfab['IssueQty'].'
            </td>
            <td style=" font-size:16px; border: 1px solid #000000;">
			'.$fabric_balace_contra .'
            </td>
            <td style=" font-size:16px; border: 1px solid #000000;">
		    '. $fabric_balace_contra_roll.'
            </td>
            
        </tr>
            ';
    
            
    $total_today_fab_receive += $todayreceive['ReceivedFab'];
    $total_fab_receive += $totalreceive['ReceivedFab'];
    $total_rec_roll += $totalreceive['ReceivedRoll'];
    $total_issue_roll += $totalroll['totalroll'];

    $total_today_issue_fab += $todayissuefab['IssueQty'];
    $total_issue_fab += $total_issue_todayfab['IssueQty'];

    $total_fab_balance +=  $fabric_balace_contra;
    $total_balance_roll += $fabric_balace_contra_roll;

    $total_feb_required_allow = 0;







}

$html .= '
<tr>
		
			<td colspan=2 style=" font-size:16px; border: 1px solid #000000;">
			    <b>Total</b>
			</td>
			
		
			<td style=" font-size:16px; border: 1px solid #000000;">
		     <b>'.$total_today_fab_receive.'</b>
			</td>
            <td style=" font-size:16px; border: 1px solid #000000;">
             <b>'.$total_fab_receive.'</b>
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
			 '. $total_today_issue_fab.'
            </td>
            <td style=" font-size:16px; border: 1px solid #000000;">
			 <b>'. $total_issue_fab.'</b>
            </td>
            <td style=" font-size:16px; border: 1px solid #000000;">
			 <b>'.$total_fab_balance.'</b>
            </td>
            <td style=" font-size:16px; border: 1px solid #000000;">
			 <b>'. $total_balance_roll.'</b>
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
