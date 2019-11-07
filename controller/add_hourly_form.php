<?php
$conn = db_connection();
if (isset($_POST['date']) && isset($_POST['floorno']) && isset($_POST['line']) && isset($_POST['po']) && isset($_POST['style']) && isset($_POST['color']) && isset($_POST['hour']) && isset($_POST['quantity'])  ) {

    $date = $_POST['date'];
    $floorno = $_POST['floorno'];
    $user_id = get_ses('user_id');

    $sql = "INSERT INTO hourly_production (Date,FloorNO,AddedBy)
	   values('$date','$floorno','$user_id')";

    if (mysqli_query($conn, $sql)) {
        notice('success', 'New Hourly Production added Successfully');
        $last_id = mysqli_insert_id($conn);
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }

    //hourly production datails
    $line = $_POST['line'];
    $po = $_POST['po'];
    $style = $_POST['style'];
    $color = $_POST['color'];
    $hour = $_POST['hour'];
    $quantity = $_POST['quantity'];

    $lineCount = "SELECT * FROM hourly_production_details WHERE LineNo = '$line'";
    $lineCount = count(mysqli_query($conn, $lineCount));
    for ($i = 0; $i < sizeof($color); $i++) {
        if($lineCount <= 0 ){
          $sql = "INSERT INTO hourly_production_details (HourlyProductionID,LineNo,POID,StyleID,Color,AddedBy) WHERE LineNo = $line[$i]
          values('$last_id','$line[$i]','$po[$i]','$style[$i]','$color[$i]','$user_id') ";

          if (mysqli_query($conn, $sql)) {
              notice('success', 'New Hourly Production added Successfully');
              if($hour[$i] == '9'){
                $sql = "UPDATE `hourly_production_details` SET `nine`='$hour[$i]' WHERE LineNo = $line[$i]";
              }
          } else {
              notice('error', $sql . "<br>" . mysqli_error($conn));
          }
        }
        else {

        }

    }

}
