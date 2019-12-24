<?php

$today = date("Y/m/d");

$conn = db_connection();
$sql = "SELECT pd.floor, f.floor_name FROM plan_details pd LEFT JOIN floor f ON pd.floor = f.floor_id WHERE pd.status = 1 AND date = '$today' GROUP BY pd.floor ORDER BY f.floor_name";
$floors = mysqli_query($conn, $sql);