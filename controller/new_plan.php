<?php
$conn = db_connection();
if (isset($_POST['submit']) && $_POST['submit'] == 'Save' && isset($_POST['title']) && $_POST['title'] != '') {
    $title = $_POST['title'];
    $poid = $_POST['po'];
    $style = $_POST['style'];
    $user_id = get_ses('user_id');

    $sql = "INSERT INTO plan (title, poid, styleid, addedby) VALUES ('$title', '$poid', '$style', '$user_id')";
    if (mysqli_query($conn, $sql)) {
        notice('success', 'New Plan Added Successfully');
        $last_id = mysqli_insert_id($conn);
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
        die();
    }

    $date = $_POST['date'];
    $floor = $_POST['floor'];
    $line = $_POST['line'];
    $qty = $_POST['qty'];

    for ($i = 0; $i < sizeof($date); $i++) {
        $sql = "INSERT INTO plan_details (date,plan_id,floor,line,qty,addedby)
		values('$date[$i]','$last_id','$floor[$i]','$line[$i]','$qty[$i]','$user_id') ";

        if (mysqli_query($conn, $sql)) {
            notice('success', 'New Plan Added Successfully');
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }
    }
    nowgo('/index.php?page=all_plan');
}
