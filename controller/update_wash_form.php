<?php
$conn = db_connection();
if (isset($_POST['date']) && isset($_POST['po'])  && isset($_POST['style']) && isset($_POST['color']) && isset($_POST['receivefab']) && isset($_POST['receiveroll']) ) {

    $date = $_POST['date'];
    $po = $_POST['po'];
    $style = $_POST['style'];
    $color = $_POST['color'];
    $send = $_POST['receivefab'];
    $receive = $_POST['receiveroll'];
    $user_id = get_ses('user_id');
    

   

        $sql = "UPDATE wash_form SET 
                        Date='$date',
                        POID='$po',
                        StyleID='$style',
                        Color = '$color',
                        Send='$send',
                        Receive='$receive' where WashFormID=".$id;
        
        
        if (mysqli_query($conn, $sql)) {
            notice('success', ' Wash Updated Successfully');
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }
    

}
if(isset($_GET['delete']) && $_GET['delete'] !=''){

    $delete = $_GET['delete'];
    $sql = "UPDATE wash_form SET Status=0 where WashFormID='$delete'";
 
	if (mysqli_query($conn, $sql)) {
		notice('success', 'Wash Product Deleted From PO Successfully');
		nowgo('/index.php?page=all_wash');
	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
	}

}