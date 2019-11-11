<?php

$conn = db_connection();
  if (
      isset($_POST['particulars']) &&
      isset($_POST['color']) &&
      isset($_POST['qtz']) &&
      isset($_POST['consuption']) &&
      isset($_POST['rqd']) &&
      isset($_POST['issue']) &&
      isset($_POST['roll'])&&
      isset($_POST['last_id'])
  ) {

      $last_id =     isset($_POST['last_id']);
      $user_id = get_ses('user_id');

      // Arrays
      $particulars = $_POST['particulars'];
      $color = $_POST['color'];
      $qtz = $_POST['qtz'];
      $consuption = $_POST['consuption'];
      $rqd = $_POST['rqd'];
      $issue = $_POST['issue'];
      $roll = $_POST['roll'];

      for ($i = 0; $i < sizeof($color); $i++) {

          $sql = "INSERT INTO fabric_issue_other_description (FabricIssueotherID,  Particulars, Color, Qtz, Consumption, RqdQty, IssueQty, Roll , AddedBy)
  		values('$last_id','$particulars[$i]','$color[$i]','$qtz[$i]','$consuption[$i]','$rqd[$i]','$issue[$i]','$roll[$i]','$user_id')";

          if (mysqli_query($conn, $sql)) {
              notice('success', 'Fabric Issued Successfully');
              nowgo('/index.php?page=single_fab_issue_stock&fab_issue_other_id='.$last_id);
          } else {
              notice('error', $sql . "<br>" . mysqli_error($conn));
          }
      }
  }
