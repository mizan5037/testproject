<?php
$conn = db_connection();
if (isset($_POST['date'])  && isset($_POST['po']) && isset($_POST['style']) && isset($_POST['color']) && isset($_POST['receivefab']) && isset($_POST['remark']) ) {

    $date       = ($_POST['date']);
    $po         = ($_POST['po']);
    $style      = ($_POST['style']);
    $color      = ($_POST['color']);
    $receivefab = ($_POST['receivefab']);
    $remark     = ($_POST['remark']);
    $user_id    = (get_ses('user_id'));


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
