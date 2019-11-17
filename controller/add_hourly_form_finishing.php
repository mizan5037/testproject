<?php
$conn = db_connection();
if (isset($_POST['date']) && isset($_POST['floorno']) && isset($_POST['po']) && isset($_POST['style']) && isset($_POST['color']) && isset($_POST['nine']) && isset($_POST['ten']) && isset($_POST['eleven']) && isset($_POST['twelve']) && isset($_POST['one']) && isset($_POST['three']) && isset($_POST['four']) && isset($_POST['five']) && isset($_POST['six']) && isset($_POST['seven']) && isset($_POST['eight']) ) {

    $date    = mysqli_real_escape_string($conn, $_POST['date']);
    $floorno = mysqli_real_escape_string($conn, $_POST['floorno']);
    $po      = mysqli_real_escape_string($conn, $_POST['po']);
    $style   = mysqli_real_escape_string($conn, $_POST['style']);
    $color   = mysqli_real_escape_string($conn, $_POST['color']);
    $nine    = mysqli_real_escape_string($conn, $_POST['nine']);
    $ten     = mysqli_real_escape_string($conn, $_POST['ten']);
    $eleven  = mysqli_real_escape_string($conn, $_POST['eleven']);
    $twelve  = mysqli_real_escape_string($conn, $_POST['twelve']);
    $one     = mysqli_real_escape_string($conn, $_POST['one']);
    $three   = mysqli_real_escape_string($conn, $_POST['three']);
    $four    = mysqli_real_escape_string($conn, $_POST['four']);
    $five    = mysqli_real_escape_string($conn, $_POST['five']);
    $six     = mysqli_real_escape_string($conn, $_POST['six']);
    $seven   = mysqli_real_escape_string($conn, $_POST['seven']);
    $eight   = mysqli_real_escape_string($conn, $_POST['eight']);
    $user_id = mysqli_real_escape_string($conn, get_ses('user_id'));
    

    for ($i = 0; $i < sizeof($color); $i++) {

        $sql = "INSERT INTO hourly_finishing_form (date,Floor,POID,StyleID,Color,nine,ten,eleven,twelve,one,three,four,five,six,seven,eight,AddedBy)

        values('$date','$floorno[$i]','$po[$i]','$style[$i]','$color[$i]','$nine[$i]', '$ten[$i]','$eleven[$i]','$twelve[$i]','$one[$i]','$three[$i]','$four[$i]','$five[$i]','$six[$i]','$seven[$i]','$eight[$i]','$user_id') ";
        
        if (mysqli_query($conn, $sql)) {
            notice('success', 'New Hourly Production added Successfully');
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }
    }

}
