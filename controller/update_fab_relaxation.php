<?php

$conn = db_connection();
if (isset($_POST['buyer']) && isset($_POST['style']) && isset($_POST['color'])  && isset($_POST['date']) && isset($_POST['shade']) && isset($_POST['shrinkage']) && isset($_POST['rollno']) && isset($_POST['yds']) && isset($_POST['shade2']) && isset($_POST['shrinkage2']) && isset($_POST['rollno2']) && isset($_POST['yds2']) && isset($_POST['ttlyds']) && isset($_POST['fot']) && isset($_POST['fld']) && isset($_POST['flt']) && isset($_POST['ttlhrs']) && isset($_POST['remark'])) {

    $buyer   = mysqli_real_escape_string($conn, $_POST['buyer']);
    $style   = mysqli_real_escape_string($conn, $_POST['style']);
    $color   = mysqli_real_escape_string($conn, $_POST['color']);
    $user_id = get_ses('user_id');

    $sql = "UPDATE fab_relaxation SET
           BuyerID         = '$buyer',
           StyleID         = '$style',
           Color           = '$color',
           AddedBy         = '$user_id'
     where FabRelaxationID = ".$fabricid;

    if (mysqli_query($conn, $sql)) {
        notice('success', 'Fabric Relaxation Updated Successfully');
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }

    //fab relaxation details
    $date       = ($_POST['date']);
    $shade      = ($_POST['shade']);
    $shrinkage  = ($_POST['shrinkage']);
    $rollno     = ($_POST['rollno']);
    $yds        = ($_POST['yds']);
    $shade2     = ($_POST['shade2']);
    $shrinkage2 = ($_POST['shrinkage2']);
    $rollno2    = ($_POST['rollno2']);
    $yds2       = ($_POST['yds2']);
    $ttlyds     = ($_POST['ttlyds']);
    $fot        = ($_POST['fot']);
    $fld        = ($_POST['fld']);
    $flt        = ($_POST['flt']);
    $ttlhrs     = ($_POST['ttlhrs']);
    $remark     = ($_POST['remark']);
    $fabDesID   = ($_POST['fabDesID']);

    for($i = 0 ; $i<sizeof($date); $i++){
    $sql = "UPDATE fab_relaxation_description SET Date ='$date[$i]', Shade='$shade[$i]', Shrinkage='$shrinkage[$i]', RollNo='$rollno[$i]',  Yds='$yds[$i]', Shade2='$shade2[$i]', Shrinkage2='$shrinkage2[$i]', RollNo2='$rollno2[$i]', Yds2='$yds2[$i]', TotalYds='$ttlyds[$i]', fabricOpenTime='$fot[$i]', FabricLayDate='$fld[$i]', FabricLayTime='$flt[$i]', TotalHours='$ttlhrs[$i]', Remarks='$remark[$i]', AddedBy='$user_id' WHERE ID='$fabDesID[$i]'";
    if (mysqli_query($conn, $sql)) {
        notice('success', 'Fabric Relaxation Updated Successfully');
        nowgo('/index.php?page=single_fabric_relaxation');
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
  }
}
