<?php 

if (isset($_POST['size'])  && isset($_POST['ppk']) && isset($_POST['qty']) ) {

    $conn    = db_connection();
    $size    = mysqli_real_escape_string($conn, $_POST['size']);
    $ppk     = mysqli_real_escape_string($conn, $_POST['ppk']);
    $qty     = mysqli_real_escape_string($conn, $_POST['qty']);
    $user_id = mysqli_real_escape_string($conn, get_ses('user_id'));
    $POID    = mysqli_real_escape_string($conn, $_GET['poid']);

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
