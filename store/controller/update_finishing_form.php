<?php
$conn = db_connection();

// Soft Delete
if (isset($_POST['id']) && isset($_POST['submit'])) {
    $id      = mysqli_real_escape_string($conn, $_POST['id']);
    $user_id = get_ses('user_id');

    $sql = "UPDATE `hourly_finishing_form` SET `Status`=0, `AddedBy`='$user_id'  WHERE `HourlyFinishingID`='$id'";
    if (mysqli_query($conn, $sql)) {
        notice('success', 'Deleted  Successfully');
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
    nowgo('/index.php?page=all_finishing_form');
}
