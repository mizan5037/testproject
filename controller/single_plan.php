<?php
if(isset($_GET['id']) && $_GET['id'] != ''){
    $id = $_GET['id'];
}else{
    nowgo('/index.php?page=all_plan');
}

$conn = db_connection();
$sql = "SELECT p.id, p.title, p.poid, p.styleid, o.PONumber, s.StyleNumber FROM plan p LEFT JOIN po o ON o.POID = p.poid LEFT JOIN style s ON s.StyleID = p.styleid WHERE p.status = 1 AND id = '$id'";

$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
