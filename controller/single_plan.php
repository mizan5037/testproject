<?php
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
} else {
    nowgo('/index.php?page=all_plan');
}

$conn = db_connection();
$sql = "SELECT p.id, p.title, SUM(od.Units) as quantity, p.poid, p.styleid, o.PONumber, s.StyleNumber FROM plan p LEFT JOIN po o ON o.POID = p.poid LEFT JOIN style s ON s.StyleID = p.styleid LEFT JOIN order_description od ON od.POID = o.POID WHERE p.status = 1 AND p.id  = '$id' GROUP BY od.Color";

$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));


$sql = "SELECT pd.date, pd.qty, l.line, f.floor_name, pd.id FROM plan_details pd LEFT JOIN floor f ON f.floor_id = pd.floor LEFT JOIN line l ON l.id = pd.line WHERE pd.plan_id = '$id' AND pd.status= 1 ORDER BY pd.date ASC ";
$plan_details = mysqli_query($conn, $sql);


if (isset($_GET['delete']) && $_GET['delete'] != '') {
    $delete = $_GET['delete'];
    $sql = "UPDATE plan_details SET status = 0 WHERE id= '$delete'";
    if (mysqli_query($conn, $sql)) {
        notice('success', 'Day Plan Deleted Successfully');
        nowgo('/index.php?page=single_plan&id=' . $id);
    } else {
        notice('error', $sql . "<br>" . mysqli_error($conn));
    }
}
