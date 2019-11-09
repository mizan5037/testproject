<?php
$conn = db_connection();
$sql = "SELECT * FROM fab_issue fi LEFT JOIN buyer b ON fi.BuyerID = b.BuyerID LEFT JOIN style s ON fi.StyleID = s.StyleID ORDER BY fi.FabIssueID DESC";

$query = mysqli_query($conn, $sql);

$sqlother = "SELECT * FROM fabric_issue_other fi LEFT JOIN buyer b ON fi.BuyerID = b.BuyerID ORDER BY fi.ID DESC";
$queryother = mysqli_query($conn, $sqlother);
