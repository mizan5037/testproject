<?php

$conn = db_connection();
if (isset($_POST['buyer']) && isset($_POST['style']) && isset($_POST['color'])  && isset($_POST['date']) && isset($_POST['shade']) && isset($_POST['shrinkage']) && isset($_POST['rollno']) && isset($_POST['yds']) && isset($_POST['shade2']) && isset($_POST['shrinkage2']) && isset($_POST['rollno2']) && isset($_POST['yds2']) && isset($_POST['ttlyds']) && isset($_POST['fot']) && isset($_POST['fld']) && isset($_POST['flt']) && isset($_POST['ttlhrs']) && isset($_POST['remark'])) {

    $buyer = mysqli_real_escape_string($conn, $_POST['buyer']);
    $style = mysqli_real_escape_string($conn, $_POST['style']);
    $color = mysqli_real_escape_string($conn, $_POST['color']);
    $user_id = get_ses('user_id');

    $sql = "UPDATE fab_relaxation SET
     BuyerID='$buyer',
     StyleID='$style',
     Color = '$color',
     AddedBy = '$user_id'
     where FabRelaxationID=".$fabricid;

    if (mysqli_query($conn, $sql)) {
        notice('success', 'Fabric Relaxation Updated Successfully');
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }

    //fab relaxation details
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $shade = mysqli_real_escape_string($conn, $_POST['shade']);
    $shrinkage = mysqli_real_escape_string($conn, $_POST['shrinkage']);
    $rollno = mysqli_real_escape_string($conn, $_POST['rollno']);
    $yds = mysqli_real_escape_string($conn, $_POST['yds']);
    $shade2 = mysqli_real_escape_string($conn, $_POST['shade2']);
    $shrinkage2 = mysqli_real_escape_string($conn, $_POST['shrinkage2']);
    $rollno2 = mysqli_real_escape_string($conn, $_POST['rollno2']);
    $yds2 = mysqli_real_escape_string($conn, $_POST['yds2']);
    $ttlyds = mysqli_real_escape_string($conn, $_POST['ttlyds']);
    $fot = mysqli_real_escape_string($conn, $_POST['fot']);
    $fld = mysqli_real_escape_string($conn, $_POST['fld']);
    $flt = mysqli_real_escape_string($conn, $_POST['flt']);
    $ttlhrs = mysqli_real_escape_string($conn, $_POST['ttlhrs']);
    $remark = mysqli_real_escape_string($conn, $_POST['remark']);
    $fabDesID = mysqli_real_escape_string($conn, $_POST['fabDesID']);

    for($i = 0 ; $i<sizeof($date); $i++){
    $sql = "UPDATE fab_relaxation_description SET Date ='$date[$i]', Shade='$shade[$i]', Shrinkage='$shrinkage[$i]', RollNo='$rollno[$i]',  Yds='$yds[$i]', Shade2='$shade2[$i]', Shrinkage2='$shrinkage2[$i]', RollNo2='$rollno2[$i]', Yds2='$yds2[$i]', TotalYds='$ttlyds[$i]', fabricOpenTime='$fot[$i]', FabricLayDate='$fld[$i]', FabricLayTime='$flt[$i]', TotalHours='$ttlhrs[$i]', Remarks='$remark[$i]', AddedBy='$user_id' WHERE ID='$fabDesID[$i]'";
    if (mysqli_query($conn, $sql)) {
        notice('success', 'Fabric Relaxation Updated Successfully');
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
  }
}
