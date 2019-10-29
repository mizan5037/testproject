<?php
 $conn = db_connection();
if ( isset($_POST['item']) && $_POST['style'] && isset($_POST['color']) && isset($_POST['po']) && isset($_POST['receivefab']) && isset($_POST['receiveroll']) && isset($_POST['sortexs'])) {

   
    $item = $_POST['item'];
	$style = $_POST['style'];
	$color = $_POST['color'];
	$po = $_POST['po'];
	$receivefab = $_POST['receivefab'];
	$receiveroll = $_POST['receiveroll'];
    $sortexs = $_POST['sortexs'];
    $user_id = get_ses('user_id');
    

	for ($i = 0; $i < sizeof($style); $i++) {

		$sql = "INSERT INTO fab_receive (POID,StyleID,Color,ReceivedFab,ReceivedRoll,Shortage,AddedBy)
		values('$POID[$i]','$style[$i]','$color[$i]','$receivefab[$i]','$receiveroll[$i]','$sortexs[$i]','$user_id')";

		if (mysqli_query($conn, $sql)) {
			notice('success', 'New Fabric Received Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}
 
    
}

?>