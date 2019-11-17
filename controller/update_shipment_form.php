<?php
$conn = db_connection();
if (isset($_POST['date']) && isset($_POST['po'])  && isset($_POST['style']) && isset($_POST['color']) && isset($_POST['receivefab']) && isset($_POST['receiveroll']) && isset($_POST['remark']) ) {
    $date        = mysqli_real_escape_string($conn, $_POST['date']);
    $po          = mysqli_real_escape_string($conn, $_POST['po']);
    $style       = mysqli_real_escape_string($conn, $_POST['style']);
    $color       = mysqli_real_escape_string($conn, $_POST['color']);
    $receivefab  = mysqli_real_escape_string($conn, $_POST['receivefab']);
    $receiveroll = mysqli_real_escape_string($conn, $_POST['receiveroll']);
    $remark      = mysqli_real_escape_string($conn, $_POST['remark']);
    $user_id     = get_ses('user_id');

    $sql = "UPDATE shipment_form SET
                        date     = '$date',
                        POID     = '$po',
                        StyleID  = '$style',
                        Color    = '$color',
                        Shipment = '$receivefab',
                        Sample   = '$receiveroll',
                        Remark   = '$remark' where ShipmentFormID = '$id'";
        if (mysqli_query($conn, $sql)) {
            notice('success', ' Shipment Updated Successfully');
            nowgo('/index.php?page=all_shipment');
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }


}
if(isset($_GET['delete']) && $_GET['delete'] !=''){

    $delete = mysqli_real_escape_string($conn, $_GET['delete']);
    $sql    = "UPDATE shipment_form SET Status=0 where ShipmentFormID='$delete'";

	if (mysqli_query($conn, $sql)) {
		notice('success', 'Shipment Product Deleted From PO Successfully');
		nowgo('/index.php?page=all_shipment');
	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
	}

}
