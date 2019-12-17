<?php
$conn = db_connection();
if (isset($_POST['date']) && isset($_POST['po'])  && isset($_POST['style']) && isset($_POST['color']) && isset($_POST['receivefab']) &&  isset($_POST['receiveroll'])&& isset($_POST['remark'])) {

    $date    = mysqli_real_escape_string($conn, $_POST['date']);
    $po      = mysqli_real_escape_string($conn, $_POST['po']);
    $style   = mysqli_real_escape_string($conn, $_POST['style']);
    $color   = mysqli_real_escape_string($conn, $_POST['color']);
    $send    = mysqli_real_escape_string($conn, $_POST['receivefab']);
    $receive = mysqli_real_escape_string($conn, $_POST['receiveroll']);
    $remark  = mysqli_real_escape_string($conn, $_POST['remark']);
    $user_id = get_ses('user_id');

        $sql = "UPDATE wash_form SET
                              Date       = '$date',
                              POID       = '$po',
                              StyleID    = '$style',
                              Color      = '$color',
                              Send       = '$send',
                              Receive    = '$receive',
                              Remark     = '$remark'
                        where WashFormID = ".$id;


        if (mysqli_query($conn, $sql)) {
            nowgo('/index.php?page=all_wash');
            notice('success', ' Wash Updated Successfully');
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }


}

if(isset($_GET['delete']) && $_GET['delete'] !=''){
    $delete = mysqli_real_escape_string($conn, $_GET['delete']);
    $sql    = "UPDATE wash_form SET Status=0 where WashFormID='$delete'";
	if (mysqli_query($conn, $sql)) {
		notice('success', 'Wash Product Deleted From PO Successfully');
		nowgo('/index.php?page=all_wash');
	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
	}

}
