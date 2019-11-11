<?php
 $conn = db_connection();
if (isset($_POST['particulars']) &&
    isset($_POST['color']) &&
    isset($_POST['qtz']) &&
    isset($_POST['consuption'])&&
    isset($_POST['rqd'])&&
    isset($_POST['issue'])&&
    isset($_POST['remark'])&&
    isset($_POST['last_id'])) {

    $user_id = get_ses('user_id');
    $last_id = $_POST['last_id'];
    $particulars = $_POST['particulars'];
  	$color = $_POST['color'];
  	$qtz = $_POST['qtz'];
  	$consuption = $_POST['consuption'];
  	$rqd = $_POST['rqd'];
  	$issue  = $_POST['issue'];
  	$remark  = $_POST['remark'];
    $user_id = get_ses('user_id');

    for ($i = 0; $i < sizeof($color); $i++) {

		$sql = "INSERT INTO fab_issue_description (FabIssueID,Particulars,Color,Qtz,Consumption,RqdQty,IssueQty,Roll,AddedBy)
		values('$last_id','$particulars[$i]','$color[$i]','$qtz[$i]','$consuption[$i]','$rqd[$i]','$issue[$i]','$remark[$i]','$user_id')";

		if (mysqli_query($conn, $sql)) {
      notice('success', 'New Fabric Issue added Successfully');
      nowgo('/index.php?page=single_fab_issue_stock&fabissueid='.$last_id);
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
    }


}
