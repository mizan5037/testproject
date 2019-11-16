<?php
 $conn = db_connection();
if ( isset($_POST['buyer']) && $_POST['style'] && isset($_POST['po']) && isset($_POST['particulars']) && isset($_POST['color']) && isset($_POST['qtz']) && isset($_POST['consuption'])&& isset($_POST['rqd'])&& isset($_POST['issue'])&& isset($_POST['remark'])) {

   
    $buyer = mysqli_real_escape_string($conn, $_POST['buyer']);
	$style = mysqli_real_escape_string($conn, $_POST['style']);
	$po = mysqli_real_escape_string($conn, $_POST['po']);
    $user_id = mysqli_real_escape_string($conn, get_ses('user_id'));
    

	for ($i = 0; $i < sizeof($style); $i++) {

		$sql = "INSERT INTO fab_issue (BuyerID,StyleID,POID,AddedBy)
		values('$buyer[$i]','$style[$i]','$po[$i]','$user_id')";

		if (mysqli_query($conn, $sql)) {
            notice('success', 'New Fabric Issue added Successfully');
		    $last_id = mysqli_insert_id($conn);
            
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
    }
    
    $particulars = mysqli_real_escape_string($conn, $_POST['particulars']);
	$color = mysqli_real_escape_string($conn, $_POST['color']);
	$qtz = mysqli_real_escape_string($conn, $_POST['qtz']);
	$consuption = mysqli_real_escape_string($conn, $_POST['consuption']);
	$rqd = mysqli_real_escape_string($conn, $_POST['rqd']);
	$issue  = mysqli_real_escape_string($conn, $_POST['issue']);
	$remark  = mysqli_real_escape_string($conn, $_POST['remark']);
    $user_id = mysqli_real_escape_string($conn, get_ses('user_id'));

    for ($i = 0; $i < sizeof($color); $i++) {

		$sql = "INSERT INTO fab_issue_description (FabIssueID,Particulars,Color,Qtz,Consumption,RqdQty,IssueQty,Roll,AddedBy)
		values('$last_id','$particulars[$i]','$color[$i]','$qtz[$i]','$consuption[$i]','$rqd[$i]','$issue[$i]','$remark[$i]','$user_id')";

		if (mysqli_query($conn, $sql)) {
            notice('success', 'New Fabric Issue added Successfully');
            
		} else {
			notice('error', $sql . "<br>" . mysqli_error($conn));
		}
    }
 
    
}
