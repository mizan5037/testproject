<?php

if ( isset($_POST['style']) && $_POST['style'] != '' && isset($_POST['color']) && isset($_POST['clr_no']) && isset($_POST['dzs']) && isset($_POST['ppack']) && isset($_POST['units'])) {

    $conn    = db_connection();
    $style   = ($_POST['style']);
    $color   = ($_POST['color']);
    $clr_no  = ($_POST['clr_no']);
    $dzs     = ($_POST['dzs']);
    $ppack   = ($_POST['ppack']);
    $units   = ($_POST['units']);
    $user_id = (get_ses('user_id'));
    $POID    = ($_GET['poid']);

	for ($i = 0; $i < sizeof($style); $i++) {

		$sql = "INSERT INTO order_description (POID,StyleID,Color,ClrNo,Dzs,PPack,Units,AddedBy)
		values('$POID','$style[$i]','$color[$i]','$clr_no[$i]','$dzs[$i]','$ppack[$i]','$units[$i]','$user_id')";

		if (mysqli_query($conn, $sql)) {
			notice('success', 'New Order Description added Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}


}

?>
