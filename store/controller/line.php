<?php
$conn = db_connection();
if (isset($_POST['line']) && $_POST['line'] != '' && isset($_POST['floor']) && $_POST['floor'] != '') {
    $line    = mysqli_real_escape_string($conn, $_POST['line']);
    $floor   = mysqli_real_escape_string($conn, $_POST['floor']);
    $user_id = get_ses('user_id');
    $sql     = "INSERT INTO line (floor, line, addedby) VALUES ('$floor','$line', '$user_id')";

    if (mysqli_query($conn, $sql)) {
        notice('success', 'New Line Added Successfully');
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
    nowgo('/index.php?page=line');
}elseif (!isset($_POST['line']) && isset($_POST['floor']) && $_POST['floor'] != '') {
    $floor   = mysqli_real_escape_string($conn, $_POST['floor']);
    $user_id = get_ses('user_id');
    $sql     = "INSERT INTO floor (floor_name, addedby) VALUES ('$floor', '$user_id')";

    if (mysqli_query($conn, $sql)) {
        notice('success', 'New Floor Added Successfully');
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
    nowgo('/index.php?page=line');
}

if(isset($_GET['id']) && $_GET['id'] != '' && isset($_GET['status']) && $_GET['status'] != ''){
    $id     = mysqli_real_escape_string($conn, $_GET['id']);
    $status = $_GET['status'] ? 0 : 1;
    $sts    = $status ? 'Activated' : 'Closed';

    $sql = "UPDATE line SET status = '$status' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        notice('success', 'Line '. $sts .' Successfully');
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
    nowgo('/index.php?page=line');
}

if(isset($_GET['floor_id']) && $_GET['floor_id'] != '' && isset($_GET['status']) && $_GET['status'] != ''){
    $id     = mysqli_real_escape_string($conn, $_GET['floor_id']);
    $status = $_GET['status'] ? 0 : 1;
    $sts    = $status ? 'Activated' : 'Closed';

    $sql = "UPDATE floor SET status = '$status' WHERE floor_id = '$id'";

    if (mysqli_query($conn, $sql)) {
        notice('success', 'Floor '. $sts .' Successfully');
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
    nowgo('/index.php?page=line');
}

