<?php

if (isset($_POST['buyer_name']) && $_POST['buyer_name'] != '') {

	$conn                       = db_connection();
	$buyer_name                 = mysqli_real_escape_string($conn, $_POST['buyer_name']);
	$user_id                    = get_ses('user_id');

	$sql = "INSERT INTO buyer (BuyerName,AddedBy)

	values('$buyer_name','$user_id')";

	if (mysqli_query($conn, $sql)) {
		notice('success', 'New Buyer added Successfully');
	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
	}
	nowgo('/index.php?page=all_buyer');

}


