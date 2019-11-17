<?php

if (isset($_POST['unit_name']) && isset($_POST['issue'])  && isset($_POST['item']) && isset($_POST['qty']) && isset($_POST['remark'])) {
    $conn = db_connection();

    $name    = mysqli_real_escape_string($conn, $_POST['unit_name']);
    $issue   = mysqli_real_escape_string($conn, $_POST['issue']);
    $item    = mysqli_real_escape_string($conn, $_POST['item']);
    $qty     = mysqli_real_escape_string($conn, $_POST['qty']);
    $remark  = mysqli_real_escape_string($conn, $_POST['remark']);
    $user_id = mysqli_real_escape_string($conn, get_ses('user_id'));

    for ($i = 0; $i < sizeof($item); $i++) { 

		$sql = "INSERT INTO stationary_issue (UnitName,IssueBy,ItemID,Qty,Remark,AddedBy)
		values('$name','$issue','$item[$i]','$qty[$i]','$remark[$i]','$user_id')";

		if (mysqli_query($conn, $sql)) {
      notice('success', 'Item Issued for '.$name.' Successfully');
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
  }
  nowgo('/index.php?page=stationary');
}
