<?php
require_once '../config.php';
require_once '../lib/session.php';
require_once '../lib/database.php';
//linking Functions
require_once '../lib/functions.php';

$token = $_POST["token"];

if (get_ses('token') === $token) {
	$conn = db_connection();
	$id   = mysqli_real_escape_string($conn, $_POST["id"]);

	$sql = "UPDATE buyer set status=0 where BuyerID=" . $id;
	if (mysqli_query($conn, $sql)) {
		nowlog('Buyer Deleted Succefully');
		echo 'Buyer Deleted Succefully';

	} else {
		nowlog($sql . "<br>" . mysqli_error($conn));
		echo $sql . "<br>" . mysqli_error($conn);
	}
} else {
	echo 'You are not authorized!';
	loginlog('Unauthorized Access tried');
}
