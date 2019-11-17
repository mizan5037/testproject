<?php
$conn = db_connection();

if(isset($_GET['fabissueid'])) {
  $FabIssueID = $_GET['fabissueid'];
  $fab_issue  = "SELECT * FROM `fab_issue` WHERE `FabIssueID`='$FabIssueID'";
  $fab_issue  = mysqli_query($conn, $fab_issue);
  $fab_issue  = mysqli_fetch_assoc($fab_issue);

  $fab_issue_d = "SELECT * FROM `fab_issue_description` WHERE `FabIssueID`='$FabIssueID' AND `Status`='1' ORDER BY `ID` DESC";
  $fab_issue_d= mysqli_query($conn, $fab_issue_d);
}
elseif (isset($_GET['fab_issue_other_id'])) {
  $FabIssueOtherID = $_GET['fab_issue_other_id'];

  $fab_issue_other = "SELECT * FROM `fabric_issue_other` WHERE `ID`='$FabIssueOtherID'";
  $fab_issue_other = mysqli_query($conn, $fab_issue_other);
  $fab_issue_other = mysqli_fetch_assoc($fab_issue_other);

  $fab_issue_other_d = "SELECT * FROM `fabric_issue_other_description` WHERE `FabricIssueotherID`='$FabIssueOtherID' AND `Status`='1' ORDER BY `ID` DESC";
  $fab_issue_other_d = mysqli_query($conn, $fab_issue_other_d);
}
else{

}



if (isset($_POST['id']) && isset($_POST['submit']) && isset($_POST['fab_id'])) {
    $id      = mysqli_real_escape_string($conn, $_POST['id']);
    $fab_id  = mysqli_real_escape_string($conn, $_POST['fab_id']);
    $user_id = get_ses('user_id');


    $sql = "UPDATE fab_issue_description SET Status='0' WHERE ID = '$id'";
    if (mysqli_query($conn, $sql)) {
      notice('success', 'Deleted  Successfully');
    } else {
      notice('error', $sql . "<br>" . mysqli_error($conn));
    }
    nowgo('/index.php?page=single_fab_issue_stock&fabissueid='.$fab_id);
}


if (isset($_POST['id1']) && isset($_POST['submit1']) && isset($_POST['fab_other_id'])) {
    $id           = mysqli_real_escape_string($conn, $_POST['id1']);
    $fab_other_id = mysqli_real_escape_string($conn, $_POST['fab_other_id']);
    $user_id      = get_ses('user_id');


    $sql = "UPDATE fabric_issue_other_description SET Status='0' WHERE ID = '$id'";
    if (mysqli_query($conn, $sql)) {
      notice('success', 'Deleted  Successfully');
    } else {
      notice('error', $sql . "<br>" . mysqli_error($conn));
    }
    nowgo('/index.php?page=single_fab_issue_stock&fab_issue_other_id='.$fab_other_id);
}

function getname($table, $column, $idColumn, $id){
    global $conn;
    $sql = "SELECT $column FROM $table WHERE $idColumn = $id";
    $query = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    if($query){
        return $query[$column];
    }else{
        return 'No Related Data Found!';
    }
}
