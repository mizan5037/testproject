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
    isset($_POST['sewing']) &&
    isset($_POST['embsend']) &&
    isset($_POST['embreceive']) &&
    isset($_POST['remark'])
    ) {

    $style = mysqli_real_escape_string($conn, $_POST['style']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $cutting_no = mysqli_real_escape_string($conn, $_POST['cutting_no']);
    $po = mysqli_real_escape_string($conn, $_POST['po']);
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
    $id = mysqli_real_escape_string($conn, $_POST['catdeid']);
    $color = mysqli_real_escape_string($conn, $_POST['color']);
    $size = mysqli_real_escape_string($conn, $_POST['size']);
    $qty = mysqli_real_escape_string($conn, $_POST['qty']);
    $sewing = mysqli_real_escape_string($conn, $_POST['sewing']);
    $embsend = mysqli_real_escape_string($conn, $_POST['embsend']);
    $embreceive = mysqli_real_escape_string($conn, $_POST['embreceive']);
    $remark = mysqli_real_escape_string($conn, $_POST['remark']);



    for ($i = 0; $i < sizeof($color); $i++) {
        $sql = "UPDATE cutting_form_description SET
                                                    Color = '$color[$i]',
                                                    Size  = '$size[$i]',
                                                    Qty   =  '$qty[$i]',
                                                    sewing   =  '$sewing[$i]',
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
