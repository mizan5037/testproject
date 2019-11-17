<?php

$conn = db_connection();
if (isset($_POST['color']) && isset($_POST['lotno']) && isset($_POST['slno']) && isset($_POST['rollno']) && isset($_POST['ttlfab']) && isset($_POST['lay']) && isset($_POST['usedfab']) && isset($_POST['ramaining']) && isset($_POST['exsshort']) && isset($_POST['sticker'])) {

    $buyer         = mysqli_real_escape_string($conn, $_POST['buyer']);
    $style         = mysqli_real_escape_string($conn, $_POST['style']);
    $po            = mysqli_real_escape_string($conn, $_POST['po']);
    $cutting_no    = mysqli_real_escape_string($conn, $_POST['cutting_no']);
    $unit          = mysqli_real_escape_string($conn, $_POST['unit']);
    $date          = mysqli_real_escape_string($conn, $_POST['date']);
    $item          = mysqli_real_escape_string($conn, $_POST['item']);
    $mw            = mysqli_real_escape_string($conn, $_POST['mw']);
    $marker_length = mysqli_real_escape_string($conn, $_POST['marker_length']);
    $specialaction = mysqli_real_escape_string($conn, $_POST['specialaction']);
    $user_id       = mysqli_real_escape_string($conn, get_ses('user_id'));


    //lay from datails
    $color     = mysqli_real_escape_string($conn, $_POST['color']);
    $lotno     = mysqli_real_escape_string($conn, $_POST['lotno']);
    $slno      = mysqli_real_escape_string($conn, $_POST['slno']);
    $rollno    = mysqli_real_escape_string($conn, $_POST['rollno']);
    $ttlfab    = mysqli_real_escape_string($conn, $_POST['ttlfab']);
    $lay       = mysqli_real_escape_string($conn, $_POST['lay']);
    $usedfab   = mysqli_real_escape_string($conn, $_POST['usedfab']);
    $ramaining = mysqli_real_escape_string($conn, $_POST['ramaining']);
    $exsshort  = mysqli_real_escape_string($conn, $_POST['exsshort']);
    $sticker   = mysqli_real_escape_string($conn, $_POST['sticker']);



    $sql = "INSERT INTO lay_form_details (layFormID,Color,LotNo,SlNo,RollNo,TTLFabricsYds,Lay,UsedFabricYds,RemainingYds,Shortage,Sticker,AddedBy)

        values('$layid','$color','$lotno','$slno', '$rollno','$ttlfab','$lay','$usedfab','$ramaining','$exsshort','$sticker','$user_id') ";

    if (mysqli_query($conn, $sql)) {
        notice('success', 'New  Form Updated Successfully');
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
}
if(isset($_GET['layde']) && $_GET['layde'] != '' && isset($_GET['layid'])){

    $id    = mysqli_real_escape_string($conn, $_GET['layde']);
    $layid = mysqli_real_escape_string($conn, $_GET['layid']);

    $sql = "UPDATE lay_form_details SET Status=0 where ID=".$id;

    if (mysqli_query($conn, $sql)) {
        notice('success', 'Lay Deleted Successfully');
        nowgo('/index.php?page=single_lay&layid='.$layid);
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }

}