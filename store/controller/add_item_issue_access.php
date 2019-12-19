<?php
 $conn = db_connection();
if ( isset($_POST['cutting_no']) && $_POST['style'] && isset($_POST['po'])  && isset($_POST['item']) && isset($_POST['color'])  && isset($_POST['size']) && isset($_POST['qty']) ) {

    $cutting_no = ( $_POST['cutting_no']);
    $buyer      = ( $_POST['buyer']);
    $po         = ( $_POST['po']);
    $style      = ( $_POST['style']);
    $item       = ( $_POST['item']);
    $color      = ( $_POST['color']);
    $size       = ( $_POST['size']);
    $qty        = ( $_POST['qty']);
    $user_id    = ( get_ses('user_id'));


	for ($i = 0; $i < sizeof($item); $i++) {

		$sql = "INSERT INTO item_issue_access (CuttingNumber,buyer,ItemID,StyleID,POID,Color,Size,Qty,AddedBy)
		values('$cutting_no','$buyer','$item[$i]','$style','$po','$color[$i]','$size[$i]','$qty[$i]','$user_id')";

		if (mysqli_query($conn, $sql)) {
			notice('success', 'New Item Issued Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}
	nowgo('/index.php?page=item_stock');
}

?>
