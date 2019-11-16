<?php
 $conn = db_connection();
if ( isset($_POST['buyer']) && $_POST['type'] && isset($_POST['color']) && isset($_POST['receivefab']) && isset($_POST['receiveroll']) && isset($_POST['sortexs'])) {

   
    $buyer = mysqli_real_escape_string($conn, $_POST['buyer']);
	$type = mysqli_real_escape_string($conn, $_POST['type']);
	$color = mysqli_real_escape_string($conn, $_POST['color']);
	$shade = mysqli_real_escape_string($conn, $_POST['shade']);
	$shrinkage = mysqli_real_escape_string($conn, $_POST['shrinkage']);
	$width = mysqli_real_escape_string($conn, $_POST['width']);
	$receivefab = mysqli_real_escape_string($conn, $_POST['receivefab']);
	$receiveroll = mysqli_real_escape_string($conn, $_POST['receiveroll']);
    $sortexs = mysqli_real_escape_string($conn, $_POST['sortexs']);
    $user_id = mysqli_real_escape_string($conn, get_ses('user_id'));
    

	for ($i = 0; $i < sizeof($buyer); $i++) {

		$sql = "INSERT INTO fab_receive_other (BuyerID, ContrastPocket, Color, Shade, Shrinkage, Width, ReceivedFab, ReceivedRoll, Shortage, AddedBy)
		values('$buyer[$i]','$type[$i]','$color[$i]','$shade[$i]','$shrinkage[$i]','$width[$i]','$receivefab[$i]','$receiveroll[$i]','$sortexs[$i]','$user_id')";

		if (mysqli_query($conn, $sql)) {
			notice('success', 'Fabric Received (Contrast,Pocketing) Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}
 
    nowgo('/index.php?page=item_stock');
}

?>