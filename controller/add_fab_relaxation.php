<?php

$conn = db_connection();
if (isset($_POST['buyer']) && isset($_POST['style']) && isset($_POST['color'])  && isset($_POST['date']) && isset($_POST['shade']) && isset($_POST['shrinkage']) && isset($_POST['rollno']) && isset($_POST['yds']) && isset($_POST['shade2']) && isset($_POST['shrinkage2']) && isset($_POST['rollno2']) && isset($_POST['yds2']) && isset($_POST['ttlyds']) && isset($_POST['fot']) && isset($_POST['fld']) && isset($_POST['flt']) && isset($_POST['ttlhrs']) && isset($_POST['remark'])) {

    $buyer = $_POST['buyer'];
    $style = $_POST['style'];
    $color = $_POST['color'];
    $user_id = get_ses('user_id');

    $sql = "INSERT INTO fab_relaxation (BuyerID,StyleID,Color,AddedBy)

	values('$buyer','$style','$color','$user_id')";
    var_dump($sql);
    if (mysqli_query($conn, $sql)) {
        notice('success', 'New Fabric Relaxation Added Successfully');

        $last_id = mysqli_insert_id($conn);
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }

    //fab relaxation details
    $date = $_POST['date'];
    $shade = $_POST['shade'];
    $shrinkage = $_POST['shrinkage'];
    $rollno = $_POST['rollno'];
    $yds = $_POST['yds'];
    $shade2 = $_POST['shade2'];
    $shrinkage2 = $_POST['shrinkage2'];
    $rollno2 = $_POST['rollno2'];
    $yds2 = $_POST['yds2'];
    $ttlyds = $_POST['ttlyds'];
    $fot = $_POST['fot'];
    $fld = $_POST['fld'];
    $flt = $_POST['flt'];
    $ttlhrs = $_POST['ttlhrs'];
    $remark = $_POST['remark'];

    for ($i = 0; $i < sizeof($shade); $i++) {
        $sql = "INSERT INTO fab_relaxation_description (FabRelaxationID,Date,Shade,Shrinkage,RollNo,Yds,Shade2,Shrinkage2,RollNo2,Yds2,TotalYds,fabricOpenTime,FabricLayDate,FabricLayTime,TotalHours,Remarks,AddedBy)
        values('$last_id','$date[$i]','$shade[$i]','$shrinkage[$i]','$rollno[$i]', '$yds[$i]','$shade2[$i]','$shrinkage2[$i]','$rollno2[$i]','$yds2[$i]','$ttlyds[$i]','$fot[$i]','$fld[$i]','$flt[$i]','$ttlhrs[$i]','$remark[$i]','$user_id') ";
        
        
        if (mysqli_query($conn, $sql)) {
            notice('success', 'New Fabric Relaxation Added Successfully');   
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }
    }
    
}
