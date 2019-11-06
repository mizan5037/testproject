<?php
$conn = db_connection();
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
	$user_id = get_ses('user_id');

	$event_check = "SELECT * FROM `po_time_action` WHERE `event_id` = '$event_id' AND `POID`= '$POID'";
	$event_check = mysqli_num_rows(mysqli_query($conn, $event_check));

	if($event_check > 0){

			$sql_update = "UPDATE `po_time_action` SET `projected_date`='$projected_date',`implement_date`='$implement_date',`1st_revised_implement_date`='$rimplement_date_1st',`2nd_revised_implement_date`='$revised_implement_date_2nd',`3rd_revised_implement_date`='$revised_implement_date_3rd',`4th_revised_implement_date`='$revised_implement_date_4th',`remarks`='$remarks',`added_by`='$user_id' WHERE `event_id` = '$event_id' AND `POID`= '$POID'";

		if (mysqli_query($conn, $sql_update)){
			notice('success', 'New Time Updated Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
	}
	else {

			$sql = "INSERT INTO `po_time_action`(`projected_date`, `implement_date`, `1st_revised_implement_date`, `2nd_revised_implement_date`, `3rd_revised_implement_date`, `4th_revised_implement_date`, `remarks`, `POID`, `event_id`,`added_by`) VALUES ('$projected_date','$implement_date','$rimplement_date_1st','$revised_implement_date_2nd','$revised_implement_date_3rd','$revised_implement_date_4th','$remarks','$POID','$event_id','$user_id')";

			if (mysqli_query($conn, $sql)){
				notice('success', 'New Time added Successfully');
			} else {
				notice('error', $sql . "<br>" . mysqli_error($conn));
			}
	}
	nowgo('/index.php?page=new_time_action&POID='.$POID);
}
if (isset($_POST['save_note'])) {
	$POID = $_POST['POID_sn'];
	$special_note = $_POST['special_note'];

	$sql = "UPDATE `po` SET `special_note`='$special_note' WHERE `POID` = $POID";

	if (mysqli_query($conn, $sql)){
		notice('success', 'New Special Note Updated Successfully');
	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
	}
	nowgo('/index.php?page=new_time_action&POID='.$POID);
}
?>
