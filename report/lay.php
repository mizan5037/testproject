<?php
//Main Page

require_once 'config.php';
require_once 'lib/session.php';
require_once 'lib/database.php';
require_once 'lib/functions.php';
require_once 'lib/vendor/autoload.php';

$logo = $path . '/assets/images/risal.png';
$conn = db_connection();
$sql = "SELECT * FROM lay_form f LEFT JOIN buyer b on b.BuyerID=f.BuyerID LEFT JOIN style s on s.StyleID=f.StyleID LEFT JOIN po p ON p.POID=f.POID WHERE f.Status = 1 and LayFormID=1";
$single_lay = mysqli_fetch_assoc(mysqli_query($conn, $sql));

echo $single_lay;
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

<table width="100%">

<tr>
				<td>
					<table width="100%" style="line-height: 100%">
								
						<tr>
							<td width="50%" style ="text-align:left;">
								<b><b><label >Buyer Name :'.$single_lay['BuyerName'].' <span></span></label> </b></b>
							</td>
							<td width="50%" style ="text-align:right;">
								<b><b><label >Unit :'.$single_lay['Unit'].' <span></span></label> </b></b>
							</td>
						</tr>
						<tr>
							<td width="50%" style ="text-align:left;">
								<b><b><label >Style No :'.$single_lay['StyleNumber'].' <span></span></label> </b></b>
							</td>
							<td width="50%" style ="text-align:right;">
								<b><b><label >Date :'.$single_lay['Date'].' <span></span></label> </b></b>
							</td>
						</tr>
						<tr>
							<td width="50%" style ="text-align:left;">
								<b><b><label >P.O. :'.$single_lay['PONumber'].' <span></span></label> </b></b>
							</td>
							<td width="50%" style ="text-align:right;">
								<b><b><label >M/W :'.$single_lay['MarkerWidth'].' <span></span></label> </b></b>
							</td>
							
						</tr>
						<tr>
							<td width="50%" style ="text-align:left;">
								<b><b><label >Cutting No:'.$single_lay['CuttingNo'].' <span></span></label> </b></b>
							</td>
							<td width="50%" style ="text-align:right;">
								
							</td>
							
						</tr>
						<tr>
							<td width="50%" style ="text-align:left;">
								<b><b><label >Markar Length :'.$single_lay['MarkerLength'].' <span></span></label> </b></b>
							</td>
							<td width="50%" style ="text-align:right;">
								
							</td>
						</tr>
					</table>
					</td>

</table>

<table style="font-size: 8pt;" border="1pt">
<thead>






<tr>
	
	<td width="10%" style="border: 1px solid #000000;">
		<b>Colour</b>
	</td>
	<td width="20%" style="border: 1px solid #000000;">
		<b>Lot <br> No.</b>
	</td>
	<td width="18%" style="border: 1px solid #000000;">
		<b>SL. No.</b>
	</td>
	<td width="8%" style="border: 1px solid #000000;">
		<b>Roll No.</b>
	</td>
	<td width="8%" style="border: 1px solid #000000;">
		<b> TTL <br> Fabrics/yds</b>
	</td>
	<td width="10%" style="border: 1px solid #000000;">
		<b>Lay </b>
	</td>
	<td width="10%" style="border: 1px solid #000000;">
		<b>TTL Lay</b>
    </td>
    <td width="10%" style="border: 1px solid #000000;">
		<b>Used Fabrics/yds</b>
    </td>
    <td width="10%" style="border: 1px solid #000000;">
		<b>Remaining</b>
    </td>
    <td width="10%" style="border: 1px solid #000000;">
		<b>Excess/Shori</b>
    </td>
    <td width="10%" style="border: 1px solid #000000;">
		<b>Sticker</b>
	</td>
	

	
</tr>

</thead>
';

	$sql = "SELECT f.*,c.color FROM lay_form_details f LEFT JOIN color c ON c.id = f.Color where f.layFormID ='1' AND f.Status=1";
	$count = 1;
	$order = mysqli_query($conn, $sql);
	
	while ($rowo = mysqli_fetch_assoc($order)) {

		$color = $rowo['color'];
		$lotno =$rowo['LotNo'];
		$slno = $rowo['SlNo'];
		$RollNo = $rowo['RollNo'];
		$TTLFabricsYds = $rowo['TTLFabricsYds'];
		$Lay = $rowo['Lay'];
		$UsedFabricYds = $rowo['UsedFabricYds'];
		$RemainingYds = $rowo['RemainingYds'];
		$Sticker = $rowo['Sticker'];
		


$html .= '	
		<tr>
		
			<td style="border: 1px solid #000000;">
				'.$color.'
			</td>
			<td style="text-align:left;border: 1px solid #000000;">
				'.$lotno.'
			</td>
			<td style="text-align:left;border: 1px solid #000000;">
				'.$slno.'
			</td>
			<td style="border: 1px solid #000000;">
				'.$RollNo.'
			</td>
			<td style="border: 1px solid #000000;">
			'.$RollNo.'
			</td>
			<td style="border: 1px solid #000000;">
			'.$TTLFabricsYds.'
			</td>
			<td style="border: 1px solid #000000;">
			'.$Lay.'
			</td>
			<td style="border: 1px solid #000000;">
			'.$UsedFabricYds.'
            </td>
            <td style="border: 1px solid #000000;">
			'.$RemainingYds.'
            </td>
            <td style="border: 1px solid #000000;">
				'.($TTLFabricsYds-$UsedFabricYds).'
            </td>
            <td style="border: 1px solid #000000;">
			'.$Sticker.'
            </td>
            
			
			';

	}
$html .= '
</tr>
</table>
</body>
	</html>
	';

$mpdf = new \Mpdf\Mpdf(['format' => 'A4-L']);
$mpdf->setAutoTopMargin = 'stretch';

$mpdf->SetHTMLHeader('<table><tr>
<td style="width:100%">
    <table style="font-size: 9px;  " >
        <tr>
            <td >
            <p> <br><img src="' . $logo . '"   height="60" ></p>
    
            </td>
            <td style="font-size:20px; letter-spacing: 2px">
                <br> <h3>RISHAL GROUP OF INDUSTRIES</h3><br>
                        <h5>Office:Plot #M-4/2,Section-14,Mirpur,Dhaka-1216.</h5><br>
                        <h5>Tel:8020302,8023864,9013438, Fax: 880-2-8012521</h5><br>
						<p>E-mail: rishal@citechco.net,sharof@spaninn.com,solaman@citechco.net</p><br>
						<h4><u>LAY FORM</u></h4>

			</td>
		</tr>
		
    </table>
</td>
</tr> </table>');
$mpdf->SetHTMLFooter('
		<table style="border: hidden; margin-bottom: -7mm; ">
		   <tr>
		 		<td><p><b>Special Action:'.$single_lay['SpecialAction'].'<b></p></td>  
		   </tr>
		   <br><br>
		    <tr>
		        <td style="border: hidden; width:25%;"><hr width="80%">Lay Man</td>
				<td style="border: hidden; width:25%;"><hr width="80%">Q.I</td>
				<td style="border: hidden; width:25%;"><hr width="80%">Cutting in Charge</td>
				<td style="border: hidden; width:25%;"><hr width="80%" >Cutting Manager</td>
		      
		    </tr>

		</table>');

$mpdf->WriteHTML($html);

$mpdf->Output();
