<?php
$conn = db_connection();
if (isset($_POST['item_name']) && $_POST['specification'] != '' && isset($_POST['unit']) && isset($_POST['unit'])) {

    $name = $_POST['item_name'];
    $specification = $_POST['specification'];
    $unit = $_POST['unit'];
    $user_id = get_ses('user_id');

    $sql = "INSERT INTO stationary_item (Name,Description,MeasurmentUnit,AddedBy)

		   		values('$name','$specification','$unit','$user_id')";

    if (mysqli_query($conn, $sql)) {
        notice('success', 'New Stationary Item added Successfully');
        nowgo('/index.php?page=new_stationary');
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "UPDATE stationary_item set status=0 where ID=" . $id;

    if (mysqli_query($conn, $sql)) {
        notice('success', 'Stationary Item Deleted Successfully');
        nowgo('/index.php?page=new_stationary');
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
}


$sql = "SELECT si.*, ir.ItemID FROM stationary_item si LEFT JOIN stationary_receive ir ON si.ID = ir.ItemID";
$result = mysqli_query($conn, $sql);
