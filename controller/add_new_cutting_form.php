<?php

$conn = db_connection();
if (isset($_POST['color']) &&
    isset($_POST['size']) &&
    isset($_POST['qty']) &&
    isset($_POST['embsend']) &&
    isset($_POST['embreceive']) &&
    isset($_POST['remark']) &&
    isset($_POST['last_id'])) {

    $user_id = get_ses('user_id');

    $last_id = $_POST['last_id'];


    //fab relaxation details
    $color = $_POST['color'];
    $size = $_POST['size'];
    $qty = $_POST['qty'];
    $embsend = $_POST['embsend'];
    $embreceive = $_POST['embreceive'];
    $remark = $_POST['remark'];



    for ($i = 0; $i < sizeof($color); $i++) {
        $sql = "INSERT INTO cutting_form_description (CuttingFormID,Color,Size,Qty,PrintEMBSent,PrintEmbReceive,remark,AddedBy)
        values('$last_id','$color[$i]','$size[$i]','$qty[$i]','$embsend[$i]', '$embreceive[$i]','$remark[$i]','$user_id') ";

        if (mysqli_query($conn, $sql)) {
            notice('success', 'New Cutting Product Added Successfully');
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }
    }
    nowgo('/index.php?page=all_cutting');
}
