<?php

if (isset($_POST['item_name']) && $_POST['item_name'] != '' && isset($_POST['item_specification']) && isset($_POST['item_unit'])) {
	$conn          = db_connection();
	$name          = ($_POST['item_name']);
	$specification = ($_POST['item_specification']);
	$unit          = ($_POST['item_unit']);
	$user_id       = get_ses('user_id');


	for ($i = 0; $i < sizeof($name); $i++) {

		$sql = "INSERT INTO item (ItemName,ItemDescription,ItemMeasurementUnit,AddedBy)

		   		values('$name[$i]','$specification[$i]','$unit[$i]','$user_id')";

		if (mysqli_query($conn, $sql)) {
			notice('success', 'New Item added Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}

	nowgo('/index.php?page=all_item');
}
