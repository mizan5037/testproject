<?php
$conn = db_connection();
if (isset($_POST['item']) && $_POST['style'] && isset($_POST['color']) && isset($_POST['po']) && isset($_POST['size']) && isset($_POST['receiveroll']) && isset($_POST['sortexs'])) {


	$buyer        = ($_POST['buyer']);
	$item        = ($_POST['item']);
	$style       = ($_POST['style']);
	$color       = ($_POST['color']);
	$po          = ($_POST['po']);
	$size        = ($_POST['size']);
	$receiveroll = ($_POST['receiveroll']);
	$sortexs     = ($_POST['sortexs']);
	$user_id     = (get_ses('user_id'));


	for ($i = 0; $i < sizeof($item); $i++) {

		$sql = "INSERT INTO item_receive_access (buyer,ItemID,ColorID,StyleID,POID,Size,Received,Shortage,AddedBy)
		values('$buyer[$i]','$item[$i]','$color[$i]','$style[$i]','$po[$i]','$size[$i]','$receiveroll[$i]','$sortexs[$i]','$user_id')";

		if (mysqli_query($conn, $sql)) {
			notice('success', 'New Item Received Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}
	nowgo('/index.php?page=item_stock');
}
