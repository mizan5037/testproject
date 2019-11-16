<?php

$conn = db_connection();
if (isset($_POST['buyer']) && isset($_POST['layid']) && isset($_POST['style']) && isset($_POST['po'])  && isset($_POST['cutting_no']) && isset($_POST['unit']) && isset($_POST['date']) && isset($_POST['item']) && isset($_POST['mw']) && isset($_POST['marker_length']) && isset($_POST['color']) && isset($_POST['lotno']) && isset($_POST['slno']) && isset($_POST['rollno']) && isset($_POST['ttlfab']) && isset($_POST['lay']) && isset($_POST['usedfab']) && isset($_POST['ramaining']) && isset($_POST['exsshort']) && isset($_POST['sticker'])  && isset($_POST['specialaction'])) {

    $buyer = mysqli_real_escape_string($conn, $_POST['buyer']);
    $style = mysqli_real_escape_string($conn, $_POST['style']);
    $po = mysqli_real_escape_string($conn, $_POST['po']);
    $cutting_no = mysqli_real_escape_string($conn, $_POST['cutting_no']);
    $unit = mysqli_real_escape_string($conn, $_POST['unit']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $item = mysqli_real_escape_string($conn, $_POST['item']);
    $mw = mysqli_real_escape_string($conn, $_POST['mw']);
    $marker_length = mysqli_real_escape_string($conn, $_POST['marker_length']);
    $specialaction = mysqli_real_escape_string($conn, $_POST['specialaction']);
    $user_id = get_ses('user_id');
    
    $sql = "UPDATE lay_form SET 
                            BuyerID = '$buyer',
                            StyleID ='$style',
                            POID='$po',
                            CuttingNo='$cutting_no',
                            Unit    ='$unit',
                            Date = '$date',
                            MarkerWidth= '$marker_length',
                            MarkerLength = '$mw',
                            SpecialAction = '$specialaction',
                            AddedBy = '$user_id'
                            where LayFormID=".$layid;

    if (mysqli_query($conn, $sql)) {
        notice('success', ' Lay Form Updated Successfully');
        $last_id = mysqli_insert_id($conn);
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }

    //lay from datails
    $id = mysqli_real_escape_string($conn, $_POST['layid']);
    $color = mysqli_real_escape_string($conn, $_POST['color']);
    $lotno = mysqli_real_escape_string($conn, $_POST['lotno']);
    $slno = mysqli_real_escape_string($conn, $_POST['slno']);
    $rollno = mysqli_real_escape_string($conn, $_POST['rollno']);
    $ttlfab = mysqli_real_escape_string($conn, $_POST['ttlfab']);
    $lay = mysqli_real_escape_string($conn, $_POST['lay']);
    $usedfab = mysqli_real_escape_string($conn, $_POST['usedfab']);
    $ramaining = mysqli_real_escape_string($conn, $_POST['ramaining']);
    $exsshort = mysqli_real_escape_string($conn, $_POST['exsshort']);
    $sticker = mysqli_real_escape_string($conn, $_POST['sticker']);

    for($i=0; $i<sizeof($color);$i++){

    
        $sql = "UPDATE lay_form_details SET 
                                    layFormID = '$layid',
                                    Color   = '$color[$i]',
                                    LotNo   = '$lotno[$i]',
                                    SLNo    = '$slno[$i]',
                                    RollNo  = '$rollno[$i]',
                                    TTLFabricsYds = '$ttlfab[$i]',
                                    Lay     = '$lay[$i]',
                                    UsedFabricYds = '$usedfab[$i]',
                                    RemainingYds   = '$ramaining[$i]',
                                    Shortage    = '$exsshort[$i]',
                                    Sticker     = '$sticker[$i]',
                                    AddedBy     = '$user_id'
                                    where ID =".$id[$i];
        
        if (mysqli_query($conn, $sql)) {
            notice('success', 'Lay Form Updated Successfully');
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }
       
    }
	nowgo('/index.php?page=all_lay');


    

}
