<?php

if (isset($_POST['from'])) {
	

	$conn = db_connection();
	$sql = "INSERT INTO `po_action_calender`(`POID`, `event_id`, `projected_date`, `implement_date`, `1st_revised_implement_date`, `2nd_revised_implement_date`, `3rd_revised_implement_date`, `4th_revised_implement_date`, `remarks`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10])";
	if (mysqli_query($conn, $sql)){
		notice('success', 'New PO added Successfully');
		$last_id = mysqli_insert_id($conn);
	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
	}
	nowgo('/index.php?page=all_po');
}
