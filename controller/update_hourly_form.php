<?php
$conn = db_connection();

// Soft Delete
if (isset($_POST['id']) && isset($_POST['submit'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $user_id = get_ses('user_id');


    $sql = "UPDATE `hourly_production_details` SET `status`=0, `AddedBy`='$user_id'  WHERE `ID`='$id'";
    if (mysqli_query($conn, $sql)) {
      notice('success', 'Deleted  Successfully');
    } else {
      notice('error', $sql . "<br>" . mysqli_error($conn));
    }
    nowgo('/index.php?page=all_hourly_form');
}
