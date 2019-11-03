<?php
if (isset($_POST['submit'])) {
	$projected_date = $_POST['projected_date'];
	$implement_date = $_POST['implement_date'];
	$rimplement_date_1st = $_POST['1st_revised_implement_date'];
	$revised_implement_date_2nd = $_POST['2nd_revised_implement_date'];
	$revised_implement_date_3rd = $_POST['3rd_revised_implement_date'];
	$revised_implement_date_4th = $_POST['4th_revised_implement_date'];
	$remarks = $_POST['remarks'];
	$POID = $_POST['POID'];
	$event_id = $_POST['event_id'];
	$conn = db_connection();
	$sql = "INSERT INTO `po_time_action`(`projected_date`, `implement_date`, `1st_revised_implement_date`, `2nd_revised_implement_date`, `3rd_revised_implement_date`, `4th_revised_implement_date`, `remarks`, `POID`, `event_id`) VALUES ('$projected_date','$implement_date','$rimplement_date_1st','$revised_implement_date_2nd','$revised_implement_date_3rd','$revised_implement_date_4th','$remarks','$POID','$event_id')";
	if (mysqli_query($conn, $sql)){
		notice('success', 'New Time added Successfully');
		$last_id = mysqli_insert_id($conn);
	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
	}
	nowgo('/index.php?page=all_po');
}
?>
