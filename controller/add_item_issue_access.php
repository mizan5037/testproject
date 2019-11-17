<?php
 $conn = db_connection();
if ( isset($_POST['cutting_no']) && $_POST['style'] && isset($_POST['po'])  && isset($_POST['item']) && isset($_POST['color'])  && isset($_POST['size']) && isset($_POST['qty']) ) {

    $cutting_no = mysqli_real_escape_string($conn, $_POST['cutting_no']);
    $po         = mysqli_real_escape_string($conn, $_POST['po']);
    $style      = mysqli_real_escape_string($conn, $_POST['style']);
    $item       = mysqli_real_escape_string($conn, $_POST['item']);
    $color      = mysqli_real_escape_string($conn, $_POST['color']);
    $size       = mysqli_real_escape_string($conn, $_POST['size']);
    $qty        = mysqli_real_escape_string($conn, $_POST['qty']);
    $user_id    = mysqli_real_escape_string($conn, get_ses('user_id'));
    

	for ($i = 0; $i < sizeof($item); $i++) {

		$sql = "INSERT INTO item_issue_access (CuttingNumber,ItemID,StyleID,POID,Color,Size,Qty,AddedBy)
		values('$cutting_no','$item[$i]','$style','$po','$color[$i]','$size[$i]','$qty[$i]','$user_id')";

		if (mysqli_query($conn, $sql)) {
			notice('success', 'New Item Issued Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}
	nowgo('/index.php?page=item_stock');
}

?>