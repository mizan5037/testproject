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


function get_tb($sql, $count = false)
{
	if (db_connection() == false) {
		return null;
	}
	$conn = db_connection();
	$result = mysqli_query($conn, $sql);
	// return $sql;
	if (!$result)
		return false;

	if (mysqli_num_rows($result) > 0) {
		$cnt = 0;
		// output data of each row
		while ($row = mysqli_fetch_assoc($result)) {
			$table[] = $row;
			$cnt++;
		}
		if ($count)
			return [$table, $cnt];
		else
			return $table;
	} else
		return false;

	mysqli_close($conn);
}
