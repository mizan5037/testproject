<?php
$conn = $conn = db_connection();

if (isset($_GET['id']) && $_GET['id'] != '' && isset($_GET['plan_id'])) {
    $id = $_GET['id'];
    $plan_id = $_GET['plan_id'];
    


    $sql = "SELECT * FROM plan_details WHERE id =' $id'";
    $sngle_data = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    $line_id    = $sngle_data['line'];
    $floor_id   = $sngle_data['floor'];
    
    $floor_name = "SELECT floor_name FROM floor WHERE floor_id = '$floor_id'";
    $floor_name = mysqli_fetch_assoc(mysqli_query($conn, $floor_name));

    $line_name = "SELECT line FROM line WHERE id = '$line_id'";
    $line_name = mysqli_fetch_assoc(mysqli_query($conn, $line_name));;

    if (isset($_POST['update_plan'])) {
        $qty     = ($_POST['qty']);
        $user_id = get_ses('user_id');
        $sql = "UPDATE plan_details SET qty='$qty',addedby='$user_id' WHERE id = '$id'";
        if(mysqli_query($conn,$sql)){
            notice('success', 'Plan Updated Successfully');
            nowgo('/index.php?page=single_plan&id='.$plan_id);
        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }
    }


    
}
