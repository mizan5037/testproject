<?php 

if (isset($_POST['size'])  && isset($_POST['ppk']) && isset($_POST['qty']) ) {

    $conn = db_connection();
    $size = $_POST['size'];
	$ppk = $_POST['ppk'];
    $qty = $_POST['qty'];
	$user_id = get_ses('user_id');
    $POID = $_GET['poid'];

	for ($i = 0; $i < sizeof($size); $i++) {
		$sql = "INSERT INTO prepack (POID,PrePackCode,PrePackSize,PrepackQty,AddedBy)
		values('$POID','$ppk[$i]','$size[$i]','$qty[$i]','$user_id') ";

		if (mysqli_query($conn, $sql)) {
			notice('success', 'New Pre Pack Assort added Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}

}
