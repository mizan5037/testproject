<?php
$conn = db_connection();
if (isset($_POST['date'])  && isset($_POST['po']) && isset($_POST['style']) && isset($_POST['color']) && isset($_POST['receivefab']) ) {

    $date = $_POST['date'];
    $po = $_POST['po'];
    $style = $_POST['style'];
    $color = $_POST['color'];
    $receivefab = $_POST['receivefab'];
    $user_id = get_ses('user_id');
    

   

        $sql = "UPDATE carton_form SET 
                        date='$date',
                        POID='$po',
                        StyleID='$style',
                        Color = '$color',
                        Qty='$receivefab'
                         where CartonFromID=".$id;
        
        
        if (mysqli_query($conn, $sql)) {
            notice('success', ' Carton Updated Successfully');
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }
    

}
if(isset($_GET['delete']) && $_GET['delete'] !=''){

    $delete = $_GET['delete'];
    $sql = "UPDATE carton_form SET Status=0 where CartonFromID='$delete'";
	if (mysqli_query($conn, $sql)) {
		notice('success', 'Carton  Deleted From PO Successfully');
		nowgo('/index.php?page=all_carton');
	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
	}

}