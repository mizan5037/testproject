<?php

$conn = db_connection();
if (isset($_POST['date']) &&  isset($_POST['po'])  && isset($_POST['style']) && isset($_POST['color']) && isset($_POST['receivefab'])  && isset($_POST['receiveroll']) && isset($_POST['remark']) ) {

    $date 			= mysqli_real_escape_string($conn, $_POST['date']);
    $po 			= mysqli_real_escape_string($conn, $_POST['po']);
	$style 			= mysqli_real_escape_string($conn, $_POST['style']);
    $color 			= mysqli_real_escape_string($conn, $_POST['color']);
    $receivefab 	= mysqli_real_escape_string($conn, $_POST['receivefab']);
    $receiveroll 	= mysqli_real_escape_string($conn, $_POST['receiveroll']);
    $remark 		= mysqli_real_escape_string($conn, $_POST['remark']);
	$user_id 		= mysqli_real_escape_string($conn, get_ses('user_id'));

	for ($i = 0; $i < sizeof($po); $i++) {
		$sql = "INSERT INTO wash_form (Date,POID,StyleID,Color,Send,Receive,Remark,AddedBy)
		values('$date','$po[$i]','$style[$i]','$color[$i]','$receivefab[$i]','$receiveroll[$i]','$remark[$i]','$user_id') ";

		if (mysqli_query($conn, $sql)) {
			notice('success', 'New Wash added Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}

}
