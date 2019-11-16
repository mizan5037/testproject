<?php
$conn = db_connection();
if (isset($_POST['date'])  && isset($_POST['po']) && isset($_POST['style']) && isset($_POST['color']) && isset($_POST['receivefab']) && isset($_POST['remark']) ) {

    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $po = mysqli_real_escape_string($conn, $_POST['po']);
    $style = mysqli_real_escape_string($conn, $_POST['style']);
    $color = mysqli_real_escape_string($conn, $_POST['color']);
    $receivefab = mysqli_real_escape_string($conn, $_POST['receivefab']);
    $remark = mysqli_real_escape_string($conn, $_POST['remark']);
    $user_id = mysqli_real_escape_string($conn, get_ses('user_id'));


    for ($i = 0; $i < sizeof($color); $i++) {

        $sql = "INSERT INTO carton_form (date,POID,StyleID,Color,Qty,Remark,AddedBy)

        values('$date','$po[$i]','$style[$i]','$color[$i]','$receivefab[$i]','$remark[$i]','$user_id') ";

        if (mysqli_query($conn, $sql)) {
            notice('success', 'New Carton Added Successfully');
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }
    }

}
