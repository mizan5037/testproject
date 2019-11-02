<?php
$conn = db_connection();
if (isset($_POST['date']) && isset($_POST['po'])  && isset($_POST['style']) && isset($_POST['color']) && isset($_POST['receivefab']) && isset($_POST['receiveroll']) ) {

    $date = $_POST['date'];
    $po = $_POST['po'];
    $style = $_POST['style'];
    $color = $_POST['color'];
    $receivefab = $_POST['receivefab'];
    $receiveroll = $_POST['receiveroll'];
    $user_id = get_ses('user_id');
    

    for ($i = 0; $i < sizeof($color); $i++) {

        $sql = "INSERT INTO shipment_form (date,POID,StyleID,Color,Shipment,Sample,AddedBy)

        values('$date','$po[$i]','$style[$i]','$color[$i]','$receivefab[$i]','$receiveroll[$i]','$user_id') ";
        
        if (mysqli_query($conn, $sql)) {
            notice('success', 'New Shipment Added Successfully');
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }
    }

}
