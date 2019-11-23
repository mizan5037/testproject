<?php
$hourColum = array(9 => 'nine', 10 => 'ten', 11 => 'eleven', 12 => 'twelve', 1 => 'one', 3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six', 7 => 'seven', 8 => 'eight');
$conn = db_connection();

if (isset($_POST['date']) && isset($_POST['floor']) && isset($_POST['line']) && isset($_POST['po']) && isset($_POST['style']) && isset($_POST['color']) && isset($_POST['hour']) && isset($_POST['quantity'])) {

    $date    = mysqli_real_escape_string($conn, $_POST['date']);
    $floorno = mysqli_real_escape_string($conn, $_POST['floor']);
    $user_id = mysqli_real_escape_string($conn, get_ses('user_id'));

    //hourly production datails
    $line     = ($_POST['line']);
    $po       = ($_POST['po']);
    $style    = ($_POST['style']);
    $color    = ($_POST['color']);
    $hour     = ($_POST['hour']);
    $quantity = ($_POST['quantity']);



    for ($i = 0; $i < sizeof($color); $i++) {
        $hou = $hourColum[$hour[$i]];

        $sql = "INSERT INTO hourly_finishing_form (date,Floor,line,POID,StyleID,Color,$hou,AddedBy)

        values('$date','$floorno','$line[$i]','$po[$i]','$style[$i]','$color[$i]','$quantity[$i]','$user_id') ";

        if (mysqli_query($conn, $sql)) {
            notice('success', 'New Hourly Finishing added Successfully');
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }
    }

}
