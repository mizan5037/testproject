<?php
function db_connection()
{
	// Create connection
	$conn = mysqli_connect(HOST, USER, PASS, DBNAME);
	mysqli_query($conn, 'SET CHARACTER SET utf8');
	mysqli_query($conn, "SET SESSION collation_connection ='utf8_general_ci'");
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		return false;
	}
	return $conn;
}

