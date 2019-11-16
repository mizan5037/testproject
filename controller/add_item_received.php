<?php
$conn = db_connection();
if (isset($_POST['item']) && $_POST['style'] && isset($_POST['color']) && isset($_POST['po']) && isset($_POST['size']) && isset($_POST['receiveroll']) && isset($_POST['sortexs'])) {


	$item = mysqli_real_escape_string($conn, $_POST['item']);
	$style = mysqli_real_escape_string($conn, $_POST['style']);
	$color = mysqli_real_escape_string($conn, $_POST['color']);
	$po = mysqli_real_escape_string($conn, $_POST['po']);
	$size = mysqli_real_escape_string($conn, $_POST['size']);
	$receiveroll = mysqli_real_escape_string($conn, $_POST['receiveroll']);
	$sortexs = mysqli_real_escape_string($conn, $_POST['sortexs']);
	$user_id = mysqli_real_escape_string($conn, get_ses('user_id'));


	for ($i = 0; $i < sizeof($item); $i++) {

		$sql = "INSERT INTO item_receive_access (ItemID,ColorID,StyleID,POID,Size,Received,Shortage,AddedBy)
		values('$item[$i]','$color[$i]','$style[$i]','$po[$i]','$size[$i]','$receiveroll[$i]','$sortexs[$i]','$user_id')";

		if (mysqli_query($conn, $sql)) {
			notice('success', 'New Item Received Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}
	nowgo('/index.php?page=item_stock');
}
