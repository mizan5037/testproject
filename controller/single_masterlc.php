<?php
$conn = db_connection();

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
} else {
    nowgo('/index.php?page=all_master_lc');
}

$sql = "SELECT * FROM masterlc WHERE MasterLCID =  $id";
$mlc = mysqli_fetch_assoc(mysqli_query($conn, $sql));

