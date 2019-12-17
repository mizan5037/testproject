<?php
 $conn = db_connection();
if ( isset($_POST['po']) && $_POST['style'] && isset($_POST['color']) && isset($_POST['receivefab']) && isset($_POST['receiveroll']) && isset($_POST['sortexs'])) {


    $POID        = ( $_POST['po']);
    $style       = ( $_POST['style']);
    $color       = ( $_POST['color']);
    $shade       = ( $_POST['shade']);
    $shrinkage   = ( $_POST['shrinkage']);
    $width       = ( $_POST['width']);
    $receivefab  = ( $_POST['receivefab']);
    $receiveroll = ( $_POST['receiveroll']);
    $sortexs     = ( $_POST['sortexs']);
    $user_id     = ( get_ses('user_id'));


	for ($i = 0; $i < sizeof($style); $i++) {

		$sql = "INSERT INTO fab_receive (POID, StyleID, Color, Shade, Shrinkage, Width, ReceivedFab, ReceivedRoll, Shortage, AddedBy)
		values('$POID[$i]','$style[$i]','$color[$i]','$shade[$i]','$shrinkage[$i]','$width[$i]','$receivefab[$i]','$receiveroll[$i]','$sortexs[$i]','$user_id')";

		if (mysqli_query($conn, $sql)) {
			notice('success', 'New Fabric Received Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}


}
