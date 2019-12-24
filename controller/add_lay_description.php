<?php

$conn = db_connection();
if (isset($_POST['lay_description']) && isset($_POST['color']) && isset($_POST['lotno']) && isset($_POST['slno']) && isset($_POST['rollno']) && isset($_POST['ttlfab']) && isset($_POST['lay']) && isset($_POST['usedfab']) && isset($_POST['ramaining']) && isset($_POST['exsshort']) && isset($_POST['sticker'])) {
  $buyer         = ($_POST['buyer']);
  $style         = ($_POST['style']);
  $po            = ($_POST['po']);
  $cutting_no    = ($_POST['cutting_no']);
  $unit          = ($_POST['unit']);
  $date          = ($_POST['date']);
  $mw            = ($_POST['mw']);
  $marker_length = ($_POST['marker_length']);
  $specialaction = ($_POST['specialaction']);
  $user_id       = (get_ses('user_id'));



  $color     = ($_POST['color']);
  $lotno     = ($_POST['lotno']);
  $slno      = ($_POST['slno']);
  $rollno    = ($_POST['rollno']);
  $ttlfab    = ($_POST['ttlfab']);
  $lay       = ($_POST['lay']);
  $usedfab   = ($_POST['usedfab']);
  $ramaining = ($_POST['ramaining']);
  $exsshort  = ($_POST['exsshort']);
  $sticker   = ($_POST['sticker']);
    //lay from datails



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



if (isset($_POST['new_lay'])) {

    $color     = ($_POST['color']);
    $lotno     = ($_POST['lotno']);
    $slno      = ($_POST['slno']);
    $rollno    = ($_POST['rollno']);
    $ttlfab    = ($_POST['ttlfab']);
    $lay       = ($_POST['lay']);
    $usedfab   = ($_POST['usedfab']);
    $ramaining = ($_POST['ramaining']);
    $exsshort  = ($_POST['exsshort']);
    $sticker   = ($_POST['sticker']);
    $layid     = ($_POST['layid']);
    $user_id       = (get_ses('user_id'));

    
    $sql = "INSERT INTO lay_form_details (layFormID,Color,LotNo,SlNo,RollNo,TTLFabricsYds,Lay,UsedFabricYds,RemainingYds,Shortage,Sticker,AddedBy)values('$layid','$color','$lotno','$slno', '$rollno','$ttlfab','$lay','$usedfab','$ramaining','$exsshort','$sticker','$user_id')";

    if (mysqli_query($conn, $sql)) {
        notice('success', 'New  Row  Added Successfully');
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
}
else{
    echo "filed";
}
