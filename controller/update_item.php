<?php

$conn = db_connection();
if (isset($_GET['item_id'])) {
    $id = $_GET['item_id'];

    $sql = "SELECT * FROM item where ItemID='$id'";;

    $item = mysqli_query($conn, $sql);
}

if (isset($_POST['update'])) {
    $name = $_POST['item_name'] ? $_POST['item_name'] : '';
    $specification = $_POST['item_specification'] ? $_POST['item_specification'] : '';
    $unit = $_POST['item_unit'] ? $_POST['item_unit'] : '';



    $sql = "UPDATE item set ItemName='$name', ItemDescription='$specification', ItemMeasurementUnit='$unit' where ItemID=" . $id;

    if (mysqli_query($conn, $sql)) {
        notice('success', 'Updated Successfully');
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
    nowgo('/index.php?page=all_item');
}
