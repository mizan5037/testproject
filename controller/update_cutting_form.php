<?php

$conn = db_connection();
if (isset($_POST['catdeid']) &&
    isset($_POST['style']) &&
    isset($_POST['cutting_no']) &&
    isset($_POST['date']) &&
    isset($_POST['po'])  &&
    isset($_POST['color']) &&
    isset($_POST['size']) &&
    isset($_POST['qty']) &&
    isset($_POST['embsend']) &&
    isset($_POST['embreceive']) &&
    isset($_POST['remark'])) {

    $style = $_POST['style'];
    $date = $_POST['date'];
    $cutting_no = $_POST['cutting_no'];
    $po = $_POST['po'];
    $user_id = get_ses('user_id');

    $sql = "INSERT INTO cutting_form (StyleID,CuttingNo,POID,AddedBy)

    values('$style','$cutting_no','$po','$user_id')";

    $sql = "UPDATE cutting_form SET
                                StyleID   = '$style',
                                date   = '$date',
                                CuttingNo = '$cutting_no',
                                POID      = '$po',
                                AddedBy   = '$user_id'
                                where CuttingFormID=".$cuttingid;


    if (mysqli_query($conn, $sql)) {
        notice('success', 'Cutting Product Updated Successfully');

    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }

    //fab relaxation details
    $id = $_POST['catdeid'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $qty = $_POST['qty'];
    $embsend = $_POST['embsend'];
    $embreceive = $_POST['embreceive'];
    $remark = $_POST['remark'];



    for ($i = 0; $i < sizeof($color); $i++) {
        $sql = "UPDATE cutting_form_description SET
                                                    Color = '$color[$i]',
                                                    Size  = '$size[$i]',
                                                    Qty   =  '$qty[$i]',
                                                    PrintEMBSent = '$embsend[$i]',
                                                    PrintEmbReceive = '$embreceive[$i]',
                                                    remark = '$remark[$i]',
                                                    AddedBy = '$user_id'

                                                    where ID=".$id[$i];

        if (mysqli_query($conn, $sql)) {
            notice('success', 'Cutting Product Updated Successfully');

        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }
    }

    nowgo('/index.php?page=all_cutting');

}
