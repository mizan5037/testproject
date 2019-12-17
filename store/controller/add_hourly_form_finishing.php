<?php
$hourColum = array(9 => 'nine', 10 => 'ten', 11 => 'eleven', 12 => 'twelve', 1 => 'one', 3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six', 7 => 'seven', 8 => 'eight');
$conn = db_connection();

if (isset($_POST['date']) && isset($_POST['floor']) && isset($_POST['po']) && isset($_POST['style']) && isset($_POST['color']) && isset($_POST['hour']) && isset($_POST['quantity'])) {

    $date    = mysqli_real_escape_string($conn, $_POST['date']);
    $floorno = mysqli_real_escape_string($conn, $_POST['floor']);
    $user_id = mysqli_real_escape_string($conn, get_ses('user_id'));

    //hourly production datails
    $po       = ($_POST['po']);
    $style    = ($_POST['style']);
    $color    = ($_POST['color']);
    $hour     = ($_POST['hour']);
    $quantity = ($_POST['quantity']);



    for ($i = 0; $i < sizeof($color); $i++) {
        $lineCount = "SELECT HourlyFinishingID FROM `hourly_finishing_form` WHERE date = '$date ' AND Floor = '$floorno' AND POID = '$po[$i]' AND StyleID = '$style[$i]' AND Color = '$color[$i]'";

        $hourlyId  = mysqli_fetch_assoc(mysqli_query($conn, $lineCount))['HourlyFinishingID'];
        $lineCount = mysqli_num_rows(mysqli_query($conn, $lineCount));

        if($lineCount <1){


            $hou = $hourColum[$hour[$i]];

            $sql = "INSERT INTO hourly_finishing_form (date,Floor,POID,StyleID,Color,$hou,AddedBy)

            values('$date','$floorno','$po[$i]','$style[$i]','$color[$i]','$quantity[$i]','$user_id') ";

            if (mysqli_query($conn, $sql)) {
                notice('success', 'New Hourly Finishing added Successfully');
            } else {
                notice('error', $sql . "<br>" . mysqli_error($conn));
            }
        }
        else{
            $hou = $hourColum[$hour[$i]];

            $sql = "UPDATE `hourly_finishing_form` SET $hou='$quantity[$i]' WHERE HourlyFinishingID = '$hourlyId'";

            if (mysqli_query($conn, $sql)) {
                notice('success', 'New Quantity Updated Successfully');
            } else {
                notice('error', $sql . "<br>" . mysqli_error($conn));
            }
        }
    }
    nowgo('/index.php?page=all_finishing_form');


}
