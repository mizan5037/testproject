<?php
//Main Page

require_once 'config.php';
require_once 'lib/session.php';
require_once 'lib/database.php';
require_once 'lib/functions.php';
require_once 'lib/vendor/autoload.php';


$date = $_POST['date'];
$buyer = $_POST['buyer'];
$style = $_POST['style'];
$po = $_POST['po'];
$item = $_POST['item'];
$conn = db_connection();

$sql = "SELECT * FROM buyer where BuyerID=".$buyer;
$buyername = mysqli_fetch_assoc(mysqli_query($conn, $sql));

$sql = "SELECT * FROM style where StyleID=".$style;
$stylename = mysqli_fetch_assoc(mysqli_query($conn, $sql));

$sql = "SELECT * FROM po where POID=".$po;
$ponumber = mysqli_fetch_assoc(mysqli_query($conn, $sql));

$sql = "SELECT * FROM item where ItemID=".$item;
$itemname = mysqli_fetch_assoc(mysqli_query($conn, $sql));

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


<table width="100%" style="line-height: 100%">
			
	<tr>
		<td width="50%" style ="text-align:left;">
			<b><b><label >BUYER NAME:'.$buyername['BuyerName'].' <span></span></label> </b></b>
		</td>
		<td width="50%" style ="text-align:right;">
			<b><b><label > <span></span></label> </b></b>
		</td>
	</tr>
	<tr>
		<td width="50%" style ="text-align:left;">
			<b><b><label >STYLE NO : '.$stylename['StyleNumber'].'<span></span></label> </b></b>
		</td>
		<td width="50%" style ="text-align:right;">
			<b><b><label > <span></span></label> </b></b>
		</td>
	</tr>
	<tr>
		<td width="50%" style ="text-align:left;">
			<b><b><label >ITEM:'.$itemname['ItemName'].'<span></span></label> </b></b>
		</td>
		<td width="50%" style ="text-align:right;">
			<b><b><label ><span></span></label> </b></b>
		</td>
		
	</tr>
	<tr>
		<td width="50%" style ="text-align:left;">
			<b><b><label >PO: <span>'.$ponumber['PONumber'].'</span></label> </b></b>
		</td>
		<td width="50%" style ="text-align:right;">
			<b>DATE:'.$date.'</b>
		</td>
		
	</tr>
	<tr>
		<td width="50%" style ="text-align:left;">
			<b><b><label > <span></span></label> </b></b>
		</td>
		<td width="50%" style ="text-align:right;">
			
		</td>
	</tr>
</table>


<table style="font-size: 8pt;" border="1pt">
	<thead>
		<tr>
			<td width="10%" style="border: 1px solid #000000;">
				<b>COLOUR</b>
			</td>
			<td width="10%" style="border: 1px solid #000000;">
				<b>CONSUMTION </b>
			</td>
			<td width="10%" style="border: 1px solid #000000;">
				<b>ORDER QTY</b>
			</td>
			<td width="8%" style="border: 1px solid #000000;">
				<b>FABRIC REQUIRE</b>
			</td>
			<td width="10%" style="border: 1px solid #000000;">
				<b> TOTAL FABRIC REQUIRE</b>
			</td>
		
			<td width="10%" style="border: 1px solid #000000;">
				<b>FABRIC RECIVED</b>
			</td>
			<td width="10%" style="border: 1px solid #000000;">
				<b>FABRIC EXCESS</b>
			</td>
			<td width="10%" style="border: 1px solid #000000;">
				<b>FABRIC SHORT</b>
			</td>
			          
            <td width="10%" style="border: 1px solid #000000;">
				<b>REMARKS</b>
			</td>
		</tr>
	</thead>
';
 
$sql = "SELECT f.*,d.Consumption,d.RqdQty,c.color,r.ReceivedFab FROM (SELECT * FROM fab_issue WHERE POID='$po' and BuyerID='$buyer' AND StyleID='$style') f LEFT JOIN fab_issue_description d ON d.FabIssueID=f.FabIssueID LEFT JOIN fab_receive r ON r.POID=f.POID LEFT JOIN color c ON c.id=d.Color order by f.StyleID";

//echo $sql;
$consumption = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($consumption)) {

    $html .= '	
		<tr>
		
			<td style="border: 1px solid #000000;">
				'.$row['color'].'
			</td>
			<td style="text-align:left;border: 1px solid #000000;">
			'.$row['Consumption'].'
			</td>
			<td style="text-align:left;border: 1px solid #000000;">
			
			</td>
			<td style="border: 1px solid #000000;">
			'.$row['RqdQty'].'
			<td style="border: 1px solid #000000;">
			
			</td>
			<td style="border: 1px solid #000000;">
			'.$row['ReceivedFab'].'
			</td>
            <td style="border: 1px solid #000000;">
            
			</td>
			<td style="border: 1px solid #000000;">
			
            </td>
            <td style="border: 1px solid #000000;">
			
            </td>
            
        </tr>
			';
}
$html .= '
<tr>
		
			<td style="border: 1px solid #000000;">
			    <b>Total</b>
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
			<h4 style="padding-left:20px;"><u>CONSUMPTION REPORT</u></h4>

        </td>
        <td><h3><b></b></h3></>
	</tr>
	
</table>
	');
    $mpdf->SetHTMLFooter('
    <table style="border: hidden; margin-bottom: -7mm; ">
      
       <br><br>
        <tr>
            <td style="border: hidden; width:20%;"><hr width="80%"><b>CUTTING INCHARGE</b></td>
            <td style="border: hidden; width:20%;"><hr width="80%"><b>STORE MANAGER</b></td>
            <td style="border: hidden; width:20%;"><hr width="80%"><b>CUTTING MANAGER</b></td>
            <td style="border: hidden; width:20%;"><hr width="80%" ><b>MERCHANDISER</b></td>
            <td style="border: hidden; width:20%;"><hr width="80%" ><b>MANAGING DIRECTOR</b></td>
          
        </tr>

    </table>');
//echo $html;
$mpdf->WriteHTML($html);
$mpdf->Output();
