<?php
$conn = db_connection();
//color add
if (isset($_POST['color']) && $_POST['color'] != '') {
  $color = mysqli_real_escape_string($conn, $_POST['color']);
  $user_id = get_ses('user_id');
  $sql = "INSERT INTO color (color, addedby) VALUES ('$color', '$user_id')";

  if (mysqli_query($conn, $sql)) {
    notice('success', 'New Color Added Successfully');
    nowgo('/index.php?page=color_size');
  } else {
    notice('error', $sql . "<br>" . mysqli_error($conn));
  }
}

//size add
if (isset($_POST['size']) && $_POST['size'] != '') {
  $size = mysqli_real_escape_string($conn, $_POST['size']);
  $user_id = get_ses('user_id');
  $sql = "INSERT INTO size (size, addedby) VALUES ('$size', '$user_id')";

  if (mysqli_query($conn, $sql)) {
    notice('success', 'New Size Added Successfully');
    nowgo('/index.php?page=color_size');
  } else {
    notice('error', $sql . "<br>" . mysqli_error($conn));
  }
}

//color delete
if (isset($_GET['color_delete']) && $_GET['color_delete'] != '') {
  $sql = "UPDATE color SET status = 0 WHERE id = " . mysqli_real_escape_string($conn, $_GET['color_delete']);
  if (mysqli_query($conn, $sql)) {
    notice('success', 'Color Deleted Successfully');
    nowgo('/index.php?page=color_size');
  } else {
    notice('error', $sql . "<br>" . mysqli_error($conn));
  }
}

//size delete 
if (isset($_GET['size_delete']) && $_GET['size_delete'] != '') {
  $sql = "UPDATE color SET status = 0 WHERE id = " . mysqli_real_escape_string($conn, $_GET['size_delete']);
  if (mysqli_query($conn, $sql)) {
    notice('success', 'Color Deleted Successfully');
    nowgo('/index.php?page=color_size');
  } else {
    notice('error', $sql . "<br>" . mysqli_error($conn));
  }
}


$sqlc = "SELECT id, color FROM color WHERE status = 1";
$colorresult = mysqli_query($conn, $sqlc);

$sqls = "SELECT id, size FROM size WHERE status = 1";
$sizeresult = mysqli_query($conn, $sqls);
