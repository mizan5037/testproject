<?php
 $conn = db_connection();
if ( isset($_POST['buyer']) && $_POST['type'] && isset($_POST['color']) && isset($_POST['receivefab']) && isset($_POST['receiveroll']) && isset($_POST['sortexs'])) {

   
    $buyer = $_POST['buyer'];
	$type = $_POST['type'];
	$color = $_POST['color'];
	$shade = $_POST['shade'];
	$shrinkage = $_POST['shrinkage'];
	$width = $_POST['width'];
	$receivefab = $_POST['receivefab'];
	$receiveroll = $_POST['receiveroll'];
    $sortexs = $_POST['sortexs'];
    $user_id = get_ses('user_id');
    

	for ($i = 0; $i < sizeof($buyer); $i++) {

		$sql = "INSERT INTO fab_receive_other (BuyerID, ContrastPocket, Color, Shade, Shrinkage, Width, ReceivedFab, ReceivedRoll, Shortage, AddedBy)
		values('$buyer[$i]','$type[$i]','$color[$i]','$shade[$i]','$shrinkage[$i]','$width[$i]','$receivefab[$i]','$receiveroll[$i]','$sortexs[$i]','$user_id')";

		if (mysqli_query($conn, $sql)) {
			notice('success', 'Fabric Received (Contrast,Pocketing) Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}
 
    
}

?>