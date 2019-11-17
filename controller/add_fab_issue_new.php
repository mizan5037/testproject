mysqli_real_escape_string($conn, <?php
 $conn = db_connection();
if (isset($_POST['particulars']) &&
    isset($_POST['color']) &&
    isset($_POST['qtz']) &&
    isset($_POST['consuption'])&&
    isset($_POST['rqd'])&&
    isset($_POST['issue'])&&
    isset($_POST['remark'])&&
    isset($_POST['last_id'])) {

    $user_id     = mysqli_real_escape_string($conn, get_ses('user_id'));
    $last_id     = mysqli_real_escape_string($conn, $_POST['last_id']);
    $particulars = mysqli_real_escape_string($conn, $_POST['particulars']);
    $color       = mysqli_real_escape_string($conn, $_POST['color']);
    $qtz         = mysqli_real_escape_string($conn, $_POST['qtz']);
    $consuption  = mysqli_real_escape_string($conn, $_POST['consuption']);
    $rqd         = mysqli_real_escape_string($conn, $_POST['rqd']);
    $issue       = mysqli_real_escape_string($conn, $_POST['issue']);
    $remark      = mysqli_real_escape_string($conn, $_POST['remark']);
    $user_id     = mysqli_real_escape_string($conn, get_ses('user_id'));

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
