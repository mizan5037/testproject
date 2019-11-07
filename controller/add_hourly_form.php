<?php
$hourColum = array(9 => 'nine', 10 => 'ten', 11 => 'eleven', 12 => 'twelve', 1 => 'one', 3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six', 7 => 'seven', 8 => 'eight');
$conn = db_connection();

if (isset($_POST['date']) && isset($_POST['floor']) && isset($_POST['line']) && isset($_POST['po']) && isset($_POST['style']) && isset($_POST['color']) && isset($_POST['hour']) && isset($_POST['quantity'])  ) {

    $date = $_POST['date'];
    $floorno = $_POST['floor'];
    $user_id = get_ses('user_id');



    //hourly production datails
    $line = $_POST['line'];
    $po = $_POST['po'];
    $style = $_POST['style'];
    $color = $_POST['color'];
    $hour = $_POST['hour'];
    $quantity = $_POST['quantity'];


    for ($i = 0; $i < sizeof($color); $i++) {

      $lineCount = "SELECT p.*, d.* FROM hourly_production_details d LEFT JOIN hourly_production p ON p.HourlyProductionID = d.HourlyProductionID WHERE  p.Date = '$date' AND p.FloorNO = '$floorno' AND d.LineNo = '$line[$i]' AND d.POID = '$po[$i]' AND d.StyleID='$style[$i]' AND d.Color = '$color[$i]'";


      $hourlyId = mysqli_fetch_assoc(mysqli_query($conn,$lineCount))['ID'];

      $lineCount = mysqli_num_rows(mysqli_query($conn, $lineCount));

      if($lineCount < 1 ){

        $sql = "INSERT INTO hourly_production (Date,FloorNO,AddedBy)
         values('$date','$floorno','$user_id')";

        if (mysqli_query($conn, $sql)) {
            notice('success', 'New Hourly Production added Successfully');
            $last_id = mysqli_insert_id($conn);
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }

          $hou = $hourColum[$hour[$i]];
          $sql = "INSERT INTO hourly_production_details (HourlyProductionID,LineNo,POID,StyleID,Color,$hou,AddedBy) values ('$last_id','$line[$i]','$po[$i]','$style[$i]','$color[$i]','$quantity[$i]','$user_id') ";

          if (mysqli_query($conn, $sql)) {
              notice('success', 'New Quantity added Successfully');
              // $sql = "UPDATE `hourly_production_details` SET $hou='$hour[$i]' WHERE LineNo = $line[$i]";
          } else {
              notice('error', $sql . "<br>" . mysqli_error($conn));
          }
        }
        else {
          $hou = $hourColum[$hour[$i]];

          $sql = "UPDATE `hourly_production_details` SET $hou='$quantity[$i]' WHERE ID = $hourlyId";

          if (mysqli_query($conn, $sql)) {
              notice('success', 'New Quantity Updated Successfully');
          } else {
              notice('error', $sql . "<br>" . mysqli_error($conn));
          }
        }

    }
    nowgo('/index.php?page=all_hourly_form');
}
