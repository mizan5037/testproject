<?php

$conn = db_connection();
if (isset($_POST['date']) && isset($_POST['style']) && isset($_POST['cutting_no']) && isset($_POST['po'])  && isset($_POST['color']) && isset($_POST['size']) && isset($_POST['qty']) && isset($_POST['sewing']) && isset($_POST['embsend']) && isset($_POST['embreceive']) && isset($_POST['remark'])) {

    $date       = mysqli_real_escape_string($conn, $_POST['date']);
    $style      = mysqli_real_escape_string($conn, $_POST['style']);
    $cutting_no = mysqli_real_escape_string($conn, $_POST['cutting_no']);
    $po         = mysqli_real_escape_string($conn, $_POST['po']);
    $user_id    = mysqli_real_escape_string($conn, get_ses('user_id'));

    $sql = "INSERT INTO cutting_form (date,StyleID,CuttingNo,POID,AddedBy)

	values('$date','$style','$cutting_no','$po','$user_id')";
    
    if (mysqli_query($conn, $sql)) {
        notice('success', 'New Cutting Product Added Successfully');

        $last_id = mysqli_insert_id($conn);
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }

    //fab relaxation details
    $color      = $_POST['color'];
    $size       = $_POST['size'];
    $qty        = $_POST['qty'];
    $sewing     = $_POST['sewing'];
    $embsend    = $_POST['embsend'];
    $embreceive = $_POST['embreceive'];
    $remark     = $_POST['remark'];
  


    for ($i = 0; $i < sizeof($color); $i++) {
        $sql = "INSERT INTO cutting_form_description (CuttingFormID,Color,Size,Qty,sewing,PrintEMBSent,PrintEmbReceive,remark,AddedBy)
        values('$last_id','$color[$i]','$size[$i]','$qty[$i]',$sewing[$i],'$embsend[$i]', '$embreceive[$i]','$remark[$i]','$user_id') ";

        if (mysqli_query($conn, $sql)) {
            notice('success', 'New Cutting Product Added Successfully');
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }
    }
    nowgo('/index.php?page=all_cutting');

   
}
