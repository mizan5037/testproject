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
			<td width="10%" style="border: 1px solid #000000;">
				<b>STYLE</b>
			</td>
			<td width="10%" style="border: 1px solid #000000;">
				<b>COLOR </b>
			</td>
			<td width="10%" style="border: 1px solid #000000;">
				<b>Cons<br>um/dz.</b>
			</td>
			<td width="8%" style="border: 1px solid #000000;">
				<b>Order Qty<br>(Pcs)</b>
			</td>
			<td width="10%" style="border: 1px solid #000000;">
				<b>Today Fab.<br>Rec.</b>
			</td>
		
			<td width="10%" style="border: 1px solid #000000;">
				<b>FABRIC RECIVED</b>
			</td>
			<td width="10%" style="border: 1px solid #000000;">
				<b>Total Fab. <br> Rec.</b>
			</td>
			<td width="10%" style="border: 1px solid #000000;">
				<b>Total Rec.<br> Roll</b>
            </td>
            <td width="10%" style="border: 1px solid #000000;">
				<b>Total Issue.<br> Roll</b>
            </td>
            <td width="10%" style="border: 1px solid #000000;">
				<b>Fabric Req. with<br> Allowance</b>
            </td>
            <td width="10%" style="border: 1px solid #000000;">
				<b>Today Issue<br> Fab.</b>
            </td>
            <td width="10%" style="border: 1px solid #000000;">
				<b>Total Issue.<br> Fab</b>
            </td>
            <td width="10%" style="border: 1px solid #000000;">
				<b>Fabric Balance</b>
            </td>
            <td width="10%" style="border: 1px solid #000000;">
				<b>Total Balance<br> Roll</b>
			</td>
			
		</tr>
	</thead>
';

    $html .= '	
		<tr>
		
			<td style="border: 1px solid #000000;">
			
			</td>
			<td style="text-align:left;border: 1px solid #000000;">
			
			</td>
			<td style="text-align:left;border: 1px solid #000000;">
		
			</td>
			<td style="border: 1px solid #000000;">
		
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
            
        </tr>
			';

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
