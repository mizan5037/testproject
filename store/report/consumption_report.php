<?php
//Main Page

require_once 'config.php';
require_once 'lib/session.php';
require_once 'lib/database.php';
require_once 'lib/functions.php';
require_once 'lib/vendor/autoload.php';


$date  = $_POST['date'];
$buyer = $_POST['buyer'];
$style = $_POST['style'];
$po    = $_POST['po'];
$conn  = db_connection();

$sql       = "SELECT * FROM buyer where BuyerID=".$buyer;
$buyername = mysqli_fetch_assoc(mysqli_query($conn, $sql));

$sql       = "SELECT * FROM style where StyleID=".$style;
$stylename = mysqli_fetch_assoc(mysqli_query($conn, $sql));

$sql      = "SELECT * FROM po where POID=".$po;
$ponumber = mysqli_fetch_assoc(mysqli_query($conn, $sql));



$logo = $path . '/assets/images/risal.png';

$sql        = "SELECT Qty FROM masterlc_description WHERE POID='$po' AND StyleID='$style'";
$totalorder = mysqli_fetch_assoc(mysqli_query($conn, $sql));



$html = '
	<!DOCTYPE html>
	<html>
	<style>
table {
  border-collapse: collapse;
  width          : 100%;
}

th, td {
  text-align: center;
  padding   : 8px;
}
td{
	font-size  : 16px;
	font-weight: bold;
}



</style>
<body>


<table width = "100%" style = "line-height: 100%">

	<tr>
		<td width = "50%" style = "text-align:left;">
			<b><b><label >BUYER NAME: '.$buyername['BuyerName'].' <span></span></label> </b></b>
		</td>
		<td width = "50%" style = "text-align:right;">
			<b><b><label > <span></span></label> </b></b>
		</td>
	</tr>
	<tr>
		<td width = "50%" style = "text-align:left;">
			<b><b><label >STYLE NO: '.$stylename['StyleNumber'].'<span></span></label> </b></b>
		</td>
		<td width = "50%" style = "text-align:right;">
			<b><b><label > <span></span></label> </b></b>
		</td>
	</tr>
	<tr>
		<td width = "50%" style = "text-align:left;">
			<b><b></b></b>
		</td>
		<td width = "50%" style = "text-align:right;">
			<b><b><label ><span></span></label> </b></b>
		</td>

	</tr>
	<tr>
		<td width = "50%" style = "text-align:left;">
			<b><b><label >PO: <span>'.$ponumber['PONumber'].'</span></label> </b></b>
		</td>
		<td width = "50%" style = "text-align:right;">
			<b>DATE: '.$date.'</b>
		</td>

	</tr>
	<tr>
		<td width = "50%" style = "text-align:left;">

			<b><b><label > Total Order: '.$totalorder['Qty'].' <span></span></label> </b></b>
		</td>
		<td width = "50%" style = "text-align:right;">

		</td>
	</tr>
</table>


<table style = "font-size: 8pt;" border = "1pt">
	<thead>
		<tr>
			<th width = "10%" style = "border: 1px solid #000000;">
				<b>COLOUR</b>
			</th>
			<th width = "10%" style = "border: 1px solid #000000;">
				<b>CONSUMTION </b>
			</th>

			<th width = "8%" style = "border: 1px solid #000000;">
				<b>FABRIC REQUIRE</b>
			</th>
			<th width = "10%" style = "border: 1px solid #000000;">
				<b> TOTAL FABRIC REQUIRE</b>
			</th>

			<th width = "10%" style = "border: 1px solid #000000;">
				<b>FABRIC RECIVED</b>
			</th>
			<th width = "10%" style = "border: 1px solid #000000;">
				<b>FABRIC EXCESS</b>
			</th>
			<th width = "10%" style = "border: 1px solid #000000;">
				<b>FABRIC SHORT</b>
			</th>


		</tr>
	</thead>
';

$sql = "SELECT f.*,d.Consumption,d.RqdQty,c.color,c.id as colorid, r.ReceivedFab FROM (SELECT * FROM fab_issue WHERE POID='$po' and BuyerID='$buyer' AND StyleID='$style' and DATE(timestamp)='$date' ) f LEFT JOIN fab_issue_description d ON d.FabIssueID=f.FabIssueID LEFT JOIN (SELECT * FROM fab_receive where DATE(timestamp)='$date')  r ON r.POID=f.POID LEFT JOIN color c ON c.id=d.Color where  DATE(d.timestamp)='$date' order by f.StyleID";

$consumption            = mysqli_query($conn, $sql);
$fabric_short           = 0;
$fabric_excess          = 0;
$total_consumption      = 0;
$fabric_require_daily   = 0;
$total_fabric_require_r = 0;
$total_fabric_receive   = 0;
$total_fabric_excess    = 0;
$total_fabric_short     = 0;

while ($row = mysqli_fetch_assoc($consumption)) {

	$poid  = $row['POID'];
	$color = $row['colorid'];

	$sql           = "SELECT sum(d.RqdQty) RqdQty FROM (SELECT * FROM fab_issue where POID='$poid' ) f LEFT JOIN fab_issue_description d on d.FabIssueID=f.FabIssueID LEFT JOIN  color co ON co.id=d.Color where d.Color='$color'" ;
	$totalissuefab = mysqli_fetch_assoc(mysqli_query($conn, $sql));

	if ($row['ReceivedFab']>$totalissuefab['RqdQty']) {
		$fabric_excess = abs($row['ReceivedFab']-$totalissuefab['RqdQty']);
	}
	else{
		$fabric_short = abs($totalissuefab['RqdQty']-$row['ReceivedFab']);
	}
	$total_consumption      += $row['Consumption'];
	$fabric_require_daily   += $row['RqdQty'];
	$total_fabric_require_r += $totalissuefab['RqdQty'];
	$total_fabric_receive   += $row['ReceivedFab'];
	$total_fabric_excess    += $fabric_excess;
	$total_fabric_short     += $fabric_short;



    $html .= '
		<tr>

			<td style = "border: 1px solid #000000;">
			'.$row['color'].'
			</td>
			<td style = "border: 1px solid #000000;">
			'.$row['Consumption'].'
			</td>
			<td style = "border: 1px solid #000000;">
			'.$row['RqdQty'].'
			<td style = "border: 1px solid #000000;">
			'.$totalissuefab['RqdQty'].'
			</td>
			<td style = "border: 1px solid #000000;">
			'.$row['ReceivedFab'].'
			</td>
            <td style = "border: 1px solid #000000;">
            '.$fabric_excess.'
			</td>
			<td style = "border: 1px solid #000000;">
			'.$fabric_short.'
            </td>


        </tr>
			';
}
$html .= '
<tr>

			<td style = "border: 1px solid #000000;">
			    <b>Total</b>
			</td>
			<td style = "border: 1px solid #000000;">
			 '.$total_consumption.'
			</td>
			<td style = "border: 1px solid #000000;">
			'.$fabric_require_daily.'

			</td>
			<td style = "border: 1px solid #000000;">
			'.$total_fabric_require_r.'

			</td>
			<td style = "border: 1px solid #000000;">
			'.$total_fabric_receive.'

			</td>
            <td style = "border: 1px solid #000000;">
            '.$total_fabric_excess.'
			</td>
			<td style = "border: 1px solid #000000;">
			'.$total_fabric_short.'
            </td>


        </tr>';
$html .= '
</table>
</body>
</html>
	';

$mpdf                   = new \Mpdf\Mpdf(['format' => 'A4-L']);
$mpdf->setAutoTopMargin = 'stretch';

$mpdf->SetHTMLHeader('
<table style = "font-size:9px; " width = "100%"  >
	<tr>
		<td width = "20%"><img src = "' . $logo . '"   height = "60" >
		</td>
		<td style = "font-size:20px;" width = "60%">
			<h3>RISHAL GROUP OF INDUSTRIES</h3>
			<h5>Sharoj Tower,Plot #M-4/2,Section-14,Mirpur,Dhaka-1216.</h5>
			<h4 style = "padding-left:20px;"><u>CONSUMPTION REPORT</u></h4>

        </td>
        <td><h3><b></b></h3></>
	</tr>

</table>
	');
    $mpdf->SetHTMLFooter('
    <table style = "border: hidden; margin-bottom: -7mm; ">

       <br><br>
        <tr>
            <td style = "border: hidden; width:20%;"><hr width = "80%"><b>CUTTING INCHARGE</b></td>
            <td style = "border: hidden; width:20%;"><hr width = "80%"><b>STORE MANAGER</b></td>
            <td style = "border: hidden; width:20%;"><hr width = "80%"><b>CUTTING MANAGER</b></td>
            <td style = "border: hidden; width:20%;"><hr width = "80%" ><b>MERCHANDISER</b></td>
            <td style = "border: hidden; width:20%;"><hr width = "80%" ><b>MANAGING DIRECTOR</b></td>

        </tr>

    </table>');
// echo $html;
$mpdf->WriteHTML($html);
$mpdf->Output();
