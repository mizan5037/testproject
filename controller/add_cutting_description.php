<?php

if (isset($_GET['cutid']) && $_GET['cutid'] != '' && isset($_GET['cuttingid'])) {
    $cutid = mysqli_real_escape_string($conn, $_GET['cutid']);
    $cuttingid = mysqli_real_escape_string($conn, $_GET['cuttingid']);

    $sql = "DELETE FROM cutting_form_description  where ID=".$cutid;

    if (mysqli_query($conn, $sql)) {
        notice('success', 'Cutting Producted Deleted Successfully');
        nowgo('/index.php?page=single_cutting&cuttingid='.$cuttingid);
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
}
?>