<?php

$conn = db_connection();
if (isset($_POST['buyer']) && isset($_POST['style']) && isset($_POST['color'])  && isset($_POST['date']) && isset($_POST['shade']) && isset($_POST['shrinkage']) && isset($_POST['rollno']) && isset($_POST['yds']) && isset($_POST['shade2']) && isset($_POST['shrinkage2']) && isset($_POST['rollno2']) && isset($_POST['yds2']) && isset($_POST['ttlyds']) && isset($_POST['fot']) && isset($_POST['fld']) && isset($_POST['flt']) && isset($_POST['ttlhrs']) && isset($_POST['remark'])) {

    $buyer   = mysqli_real_escape_string($conn, $_POST['buyer']);
    $style   = mysqli_real_escape_string($conn, $_POST['style']);
    $color   = mysqli_real_escape_string($conn, $_POST['color']);
    $user_id = mysqli_real_escape_string($conn, get_ses('user_id'));


    $check_fab_data = "SELECT DISTINCT f.FabRelaxationID,b.BuyerID,b.BuyerName,c.id,c.color,s.StyleID,s.StyleNumber
                      FROM fab_relaxation f
                      LEFT  JOIN buyer b ON f.BuyerID = b.BuyerID
                      LEFT  JOIN color c ON f.Color   = c.id
                      LEFT  JOIN style s ON f.StyleID = s.StyleID
                      WHERE f.Status                  = '1' AND b.Status = '1' AND c.status = '1'AND s.Status = '1'";

    $check_fab_data = mysqli_fetch_assoc(mysqli_query($conn, $check_fab_data));

    if($buyer == $check_fab_data['BuyerID'] && $style == $check_fab_data['StyleID'] && $color == $check_fab_data['id']){
      $last_id = mysqli_real_escape_string($conn, $check_fab_data['FabRelaxationID']);
    }
    else {
      $sql = "INSERT INTO fab_relaxation (BuyerID,StyleID,Color,AddedBy)
              values('$buyer','$style','$color','$user_id')";
      if (mysqli_query($conn, $sql)) {
          notice('success', 'New Fabric Relaxation Added Successfully');
          $last_id = mysqli_insert_id($conn);
      } else {
          notice('error', $sql . "<br>" . mysqli_error($conn));
      }
    }

    //fab relaxation details
    $date       = mysqli_real_escape_string($conn, $_POST['date']);
    $shade      = mysqli_real_escape_string($conn, $_POST['shade']);
    $shrinkage  = mysqli_real_escape_string($conn, $_POST['shrinkage']);
    $rollno     = mysqli_real_escape_string($conn, $_POST['rollno']);
    $yds        = mysqli_real_escape_string($conn, $_POST['yds']);
    $shade2     = mysqli_real_escape_string($conn, $_POST['shade2']);
    $shrinkage2 = mysqli_real_escape_string($conn, $_POST['shrinkage2']);
    $rollno2    = mysqli_real_escape_string($conn, $_POST['rollno2']);
    $yds2       = mysqli_real_escape_string($conn, $_POST['yds2']);
    $ttlyds     = mysqli_real_escape_string($conn, $_POST['ttlyds']);
    $fot        = mysqli_real_escape_string($conn, $_POST['fot']);
    $fld        = mysqli_real_escape_string($conn, $_POST['fld']);
    $flt        = mysqli_real_escape_string($conn, $_POST['flt']);
    $ttlhrs     = mysqli_real_escape_string($conn, $_POST['ttlhrs']);
    $remark     = mysqli_real_escape_string($conn, $_POST['remark']);

    for ($i = 0; $i < sizeof($date); $i++) {

        $sql = "INSERT INTO fab_relaxation_description (FabRelaxationID,Date,Shade,Shrinkage,RollNo,Yds,Shade2,Shrinkage2,RollNo2,Yds2,TotalYds,fabricOpenTime,FabricLayDate,FabricLayTime,TotalHours,Remarks,AddedBy)
        values('$last_id','$date[$i]','$shade[$i]','$shrinkage[$i]','$rollno[$i]', '$yds[$i]','$shade2[$i]','$shrinkage2[$i]','$rollno2[$i]','$yds2[$i]','$ttlyds[$i]','$fot[$i]','$fld[$i]','$flt[$i]','$ttlhrs[$i]','$remark[$i]','$user_id') ";

        if (mysqli_query($conn, $sql)) {
            notice('success', 'New Fabric Relaxation Added Successfully');

        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }
    }
    nowgo('/index.php?page=all_fabric_relaxation');

}
