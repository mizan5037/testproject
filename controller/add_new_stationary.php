<?php

if (isset($_POST['item_name']) && $_POST['specification'] != '' && isset($_POST['unit']) && isset($_POST['unit'])) {
    $conn = db_connection();
    $name = $_POST['item_name'];
    $specification = $_POST['specification'];
    $unit = $_POST['unit'];
    $user_id = get_ses('user_id');

    $sql = "INSERT INTO stationary_item (Name,Description,MeasurmentUnit,AddedBy)

		   		values('$name','$specification','$unit','$user_id')";

    if (mysqli_query($conn, $sql)) {
        notice('success', 'New Stationary Item added Successfully');
        nowgo('/index.php?page=stationary');
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
}
