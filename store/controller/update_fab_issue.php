<?php

$conn = db_connection();

if(isset($_GET['fabissue_d_id']) && isset($_GET['fabissueid'])){
  $fab_issue     = mysqli_real_escape_string($conn, $_GET['fabissueid']);
  $fab_issue_des = mysqli_real_escape_string($conn, $_GET['fabissue_d_id']);
  $fd_sql        = "SELECT * from fab_issue_description WHERE ID = '$fab_issue_des'";
  $fd_sql        = mysqli_query($conn, $fd_sql);
  $fd_sql        = mysqli_fetch_assoc($fd_sql);
}
elseif (isset($_GET['fabissue_other_d_id']) && isset($_GET['fab_issue_other_id'])) {
  $fab_issue_other     = mysqli_real_escape_string($conn, $_GET['fab_issue_other_id']);
  $fab_issue_other_des = mysqli_real_escape_string($conn, $_GET['fabissue_other_d_id']);

  $fd_sql = "SELECT * from fabric_issue_other_description WHERE ID = '$fab_issue_other_des'";
  $fd_sql = mysqli_query($conn, $fd_sql);
  $fd_sql = mysqli_fetch_assoc($fd_sql);
}


if(isset($_POST['Update'])){
  $Particulars         = mysqli_real_escape_string($conn, $_POST['Particulars']);
  $Color               = mysqli_real_escape_string($conn, $_POST['Color']);
  $Qtz                 = mysqli_real_escape_string($conn, $_POST['Qtz']);
  $Consumption         = mysqli_real_escape_string($conn, $_POST['Consumption']);
  $RqdQty              = mysqli_real_escape_string($conn, $_POST['RqdQty']);
  $IssueQty            = mysqli_real_escape_string($conn, $_POST['IssueQty']);
  $Roll                = mysqli_real_escape_string($conn, $_POST['Roll']);
  $fab_issue_des       = mysqli_real_escape_string($conn, $_POST['fab_issue_des']);
  $fab_issue_other_des = mysqli_real_escape_string($conn, $_POST['fab_issue_other_des']);
  $user_id             = get_ses('user_id');


  if($fab_issue_des!=0){
    $fab_de = "UPDATE `fab_issue_description` SET `Particulars`='$Particulars',`Color`='$Color',`Qtz`='$Qtz',`Consumption`='$Consumption',`RqdQty`='$RqdQty',`IssueQty`='$IssueQty',`Roll`='$Roll',`AddedBy`='$user_id' WHERE ID = '$fab_issue_des'";

    if (mysqli_query($conn, $fab_de)) {
     notice('success', 'Iusse Updated Successfully');
     nowgo('/index.php?page=single_fab_issue_stock&fabissueid='.$fab_issue);

    } else {
      notice('error', $fab_de . "<br>" . mysqli_error($conn));
    }
  }
  else if($fab_issue_other_des!=0){
    $other_des = "UPDATE fabric_issue_other_description SET
          Particulars = '$Particulars',
          Color       = '$Color',
          Qtz         = '$Qtz',
          Consumption = '$Consumption',
          RqdQty      = '$RqdQty',
          IssueQty    = '$IssueQty',
          Roll        = '$Roll',
          AddedBy     = '$user_id'
    WHERE ID          = '$fab_issue_other_des'";

    if (mysqli_query($conn, $other_des)) {
    notice('success', 'Other Issue Updated Successfully');
    nowgo('/index.php?page=single_fab_issue_stock&fab_issue_other_id='.$fab_issue_other);

    }else {
      notice('error', $other_des . "<br>" . mysqli_error($conn));
    }

  }
}



function getname($table, $column, $idColumn, $id){
    global $conn;
    $sql   = "SELECT $column FROM $table WHERE $idColumn = $id";
    $query = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    if($query){
        return $query[$column];
    }else{
        return 'No Related Data Found!';
    }
}
