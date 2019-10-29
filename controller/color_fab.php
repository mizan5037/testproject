<?php
$conn = db_connection();
if(isset($_POST['color']) && $_POST['color'] != ''){
    $color = $_POST['color'];
    $user_id = get_ses('user_id');
    $sql = "INSERT INTO color (color, addedby) VALUES ('$color', '$user_id')";

    if (mysqli_query($conn, $sql)) {
		notice('success', 'New Color Added Successfully');
		nowgo('/index.php?page=color_fab');

	} else {
		notice('error', $sql . "<br>" . mysqli_error($conn));
    }
}

$sqlc = "SELECT id, color FROM color";
$colorresult = mysqli_query($conn, $sqlc);

$sqls = "SELECT id, color FROM size";
$sizeresult = mysqli_query($conn, $sqls);