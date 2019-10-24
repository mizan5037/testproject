<?php

if (isset($_POST['po']) && isset($_POST['item']) && isset($_POST['description']) && isset($_POST['qty']) && isset($_POST['ppu']) && isset($_POST['totalprice']) ) {
	$conn = db_connection();

	$po_number   = $_POST['po'];
    $item        = $_POST['item'];
    $description = nl2br($_POST['description']);
    $qty         = $_POST['qty'];
    $price_per_unit   = $_POST['ppu'];
    $totalprice  = $_POST['totalprice'];
   
	
	for ($i = 0; $i < sizeof($item); $i++) {

		$sql = "INSERT INTO pi_description (PIID,POID,ItemID,Description,Qty,PricePerUnit,TotalPrice,AddedBy)

		values('$piid','$po_number[$i]','$item[$i]','$description[$i]','$qty[$i]','$price_per_unit[$i]','$totalprice[$i]','$user_id') ";

		if (mysqli_query($conn, $sql)) {
			notice('success', 'PI Description added Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}

	nowgo('/index.php?page=single_pi&piid=<?=$piid ?>');
}

if (isset($_GET['piddel'])) {
    $piddel = $_GET['piddel'];
    

    $sql = "UPDATE pi_description SET Status=0 where PIDescriptionID=".$piddel;
    mysqli_query($conn,$sql);
	nowgo('/index.php?page=single_pi&piid=<?=$piid ?>');


}


