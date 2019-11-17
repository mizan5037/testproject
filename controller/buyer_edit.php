<?php
require_once '../config.php';
require_once '../lib/session.php';
require_once '../lib/database.php';
//linking Functions
require_once '../lib/functions.php';

$token = $_POST["token"];

if (get_ses('token') === $token) {

	$conn  = db_connection();
	$id    = mysqli_real_escape_string($conn, $_POST["id"]);
	$cname = mysqli_real_escape_string($conn, $_POST['cname']);
	$text  = mysqli_real_escape_string($conn, $_POST["text"]);


	$sql = "UPDATE buyer SET " . $cname . "='" . $text . "' WHERE BuyerID='" . $id . "'";
	if (mysqli_query($conn, $sql)) {
		nowlog($cname . ' Updated Succefully');
		echo 'Data Updated';
	} else {
		echo $sql . "<br>" . mysqli_error($conn);
		nowlog($sql . "<br>" . mysqli_error($conn));
	}
}
