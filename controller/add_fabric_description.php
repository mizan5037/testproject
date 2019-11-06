<?php

if (isset($_GET['fabid']) && $_GET['fabid'] !='' && $_GET['fabricid'] != '') {
    $fabid = $_GET['fabid'];
    $fabricid =  $_GET['fabricid'];

    $sql = "DELETE FROM fab_relaxation_description  where ID=".$fabid;

    if (mysqli_query($conn, $sql)) {
        notice('success', 'Fabric Relaxation Producted Deleted Successfully');
        nowgo('/index.php?page=single_fabric_relaxation&fabricid='.$fabricid);
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }

}