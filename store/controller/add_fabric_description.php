<?php

if (isset($_GET['fabid']) && $_GET['fabid'] !='' && $_GET['fabricid'] != '') {
    $fabid    = mysqli_real_escape_string($conn, $_GET['fabid']);
    $fabricid = mysqli_real_escape_string($conn, $_GET['fabricid']);

    $sql = "UPDATE fab_relaxation_description SET Status='0' where ID=".$fabid;

    if (mysqli_query($conn, $sql)) {
        notice('success', 'Fabric Relaxation Producted Deleted Successfully');
        nowgo('/index.php?page=single_fabric_relaxation&fabricid='.$fabricid);
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
}