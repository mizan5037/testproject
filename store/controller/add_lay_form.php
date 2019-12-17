<?php

$conn = db_connection();
if (isset($_POST['buyer']) && isset($_POST['style']) && isset($_POST['po'])  && isset($_POST['cutting_no']) && isset($_POST['unit']) && isset($_POST['date']) && isset($_POST['item']) && isset($_POST['mw']) && isset($_POST['marker_length']) && isset($_POST['color']) && isset($_POST['lotno']) && isset($_POST['slno']) && isset($_POST['rollno']) && isset($_POST['ttlfab']) && isset($_POST['lay']) && isset($_POST['usedfab']) && isset($_POST['ramaining']) && isset($_POST['exsshort']) && isset($_POST['sticker'])  && isset($_POST['specialaction'])) {

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

    $sql = "INSERT INTO lay_form (BuyerID,StyleID,POID,CuttingNo,Unit,Date,MarkerWidth,MarkerLength,SpecialAction,AddedBy)

	values('$buyer','$style','$po','$cutting_no' ,'$unit','$date','$mw','$marker_length','$specialaction','$user_id')";

    if (mysqli_query($conn, $sql)) {
        notice('success', 'New Lay Form added Successfully');
        $last_id = mysqli_insert_id($conn);
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }

    //lay from datails
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



    for ($i = 0; $i < sizeof($color); $i++) {

        $sql = "INSERT INTO lay_form_details (layFormID,Color,LotNo,SlNo,RollNo,TTLFabricsYds,Lay,UsedFabricYds,RemainingYds,Shortage,Sticker,AddedBy)

        values('$last_id','$color[$i]','$lotno[$i]','$slno[$i]', '$rollno[$i]','$ttlfab[$i]','$lay[$i]','$usedfab[$i]','$ramaining[$i]','$exsshort[$i]','$sticker[$i]','$user_id') ";

        if (mysqli_query($conn, $sql)) {
            notice('success', 'New Lay Form added Successfully');
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }
    }

	nowgo('/index.php?page=all_lay');


}
