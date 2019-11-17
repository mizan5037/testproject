<?php
 $conn = db_connection();
if ( isset($_POST['po']) && $_POST['style'] && isset($_POST['color']) && isset($_POST['receivefab']) && isset($_POST['receiveroll']) && isset($_POST['sortexs'])) {

   
    $POID        = mysqli_real_escape_string($conn, $_POST['po']);
    $style       = mysqli_real_escape_string($conn, $_POST['style']);
    $color       = mysqli_real_escape_string($conn, $_POST['color']);
    $shade       = mysqli_real_escape_string($conn, $_POST['shade']);
    $shrinkage   = mysqli_real_escape_string($conn, $_POST['shrinkage']);
    $width       = mysqli_real_escape_string($conn, $_POST['width']);
    $receivefab  = mysqli_real_escape_string($conn, $_POST['receivefab']);
    $receiveroll = mysqli_real_escape_string($conn, $_POST['receiveroll']);
    $sortexs     = mysqli_real_escape_string($conn, $_POST['sortexs']);
    $user_id     = mysqli_real_escape_string($conn, get_ses('user_id'));
    

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
