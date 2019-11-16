<?php
$conn = db_connection();
if (isset($_POST['submit']) && $_POST['submit'] == 'Save') {
    $title      = mysqli_real_escape_string($conn, $_POST['title']);
    $poid       = mysqli_real_escape_string($conn, $_POST['po']);
    $style      = mysqli_real_escape_string($conn, $_POST['style']);
    $user_id    = get_ses('user_id');

    if (isset($_POST['id']) && $_POST['id'] != '') {
        $last_id = mysqli_real_escape_string($conn, $_POST['id']);
    } else {

        $sql = "INSERT INTO plan (title, poid, styleid, addedby) VALUES ('$title', '$poid', '$style', '$user_id')";
        if (mysqli_query($conn, $sql)) {
            notice('success', 'New Plan Added Successfully');
            $last_id = mysqli_insert_id($conn);
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }
    }

    $date   = mysqli_real_escape_string($conn, $_POST['date']);
    $floor  = mysqli_real_escape_string($conn, $_POST['floor']);
    $line   = mysqli_real_escape_string($conn, $_POST['line']);
    $qty    = mysqli_real_escape_string($conn, $_POST['qty']);

    for ($i = 0; $i < sizeof($date); $i++) {
        $sql = "INSERT INTO plan_details (date,plan_id,floor,line,qty,addedby)
		values('$date[$i]','$last_id','$floor[$i]','$line[$i]','$qty[$i]','$user_id') ";

        if (mysqli_query($conn, $sql)) {
            notice('success', 'New Plan Added Successfully');
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }
    }
    nowgo('/index.php?page=single_plan&id=' . $last_id);
}
