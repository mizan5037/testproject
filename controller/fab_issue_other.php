<?php

$conn = db_connection();

if (
    isset($_POST['buyer']) &&
    isset($_POST['type']) &&
    isset($_POST['particulars']) &&
    isset($_POST['color']) &&
    isset($_POST['qtz']) &&
    isset($_POST['consuption']) &&
    isset($_POST['rqd']) &&
    isset($_POST['issue']) &&
    isset($_POST['roll'])
) {
    
    $buyer   = mysqli_real_escape_string($conn, $_POST['buyer']);
    $type    = mysqli_real_escape_string($conn, $_POST['type']);
    $user_id = get_ses('user_id');

    $sql = "INSERT INTO fabric_issue_other (BuyerID, ContrastPocket, AddedBy) VALUES ('$buyer','$type','$user_id')";

    if (mysqli_query($conn, $sql)) {
        notice('success', 'New Fabric Issue added Successfully');
        $last_id = mysqli_insert_id($conn);
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }

    // Arrays
    $particulars = mysqli_real_escape_string($conn, $_POST['particulars']);
    $color       = mysqli_real_escape_string($conn, $_POST['color']);
    $qtz         = mysqli_real_escape_string($conn, $_POST['qtz']);
    $consuption  = mysqli_real_escape_string($conn, $_POST['consuption']);
    $rqd         = mysqli_real_escape_string($conn, $_POST['rqd']);
    $issue       = mysqli_real_escape_string($conn, $_POST['issue']);
    $roll        = mysqli_real_escape_string($conn, $_POST['roll']);

    for ($i = 0; $i < sizeof($color); $i++) {

        $sql = "INSERT INTO fabric_issue_other_description (FabricIssueotherID,  Particulars, Color, Qtz, Consumption, RqdQty, IssueQty, Roll , AddedBy)
		values('$last_id','$particulars[$i]','$color[$i]','$qtz[$i]','$consuption[$i]','$rqd[$i]','$issue[$i]','$roll[$i]','$user_id')";

        if (mysqli_query($conn, $sql)) {
            notice('success', 'Fabric Issued Successfully');
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }
    }
}
