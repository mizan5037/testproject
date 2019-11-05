<?php
$conn = db_connection();
if (isset($_POST['line']) && $_POST['line'] != '') {
    $line = $_POST['line'];
    $user_id = get_ses('user_id');
    $sql = "INSERT INTO line (line, addedby) VALUES ('$line', '$user_id')";

    if (mysqli_query($conn, $sql)) {
        notice('success', 'New Line Added Successfully');
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
    nowgo('/index.php?page=line');
}

if(isset($_GET['id']) && $_GET['id'] != '' && isset($_GET['status']) && $_GET['status'] != ''){
    $id = $_GET['id'];
    $status = $_GET['status'] ? 0 : 1;
    $sts = $status ? 'Closed' : 'Activated';

    $sql = "UPDATE line SET status = '$status' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        notice('success', 'Line '. $sts .' Successfully');
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
    nowgo('/index.php?page=line');
}

