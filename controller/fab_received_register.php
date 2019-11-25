<?php
$conn = db_connection();
$sql = "SELECT p.POID,b.BuyerID,fr.FabReceiveID,s.StyleID, b.BuyerName, s.StyleNumber,fr.Color FROM fab_receive fr LEFT JOIN po p ON p.POID = fr.POID LEFT JOIN masterlc_description md ON md.POID = p.POID LEFT JOIN masterlc m ON m.MasterLCID = md.MasterLCID LEFT JOIN buyer b ON m.MasterLCBuyer = b.BuyerID LEFT JOIN style s ON fr.StyleID = s.StyleID LEFT JOIN color c ON c.id = fr.Color WHERE fr.Status = '1' GROUP BY b.BuyerID ORDER BY fr.FabReceiveID DESC";

$query = mysqli_query($conn, $sql);

$sqlother = "SELECT b.BuyerID,b.BuyerName,fo.id,fo.ContrastPocket FROM fab_receive_other fo LEFT JOIN buyer b ON b.BuyerID = fo.BuyerID WHERE fo.Status = '1' GROUP BY fo.ContrastPocket,b.BuyerID ORDER BY fo.id";
$queryother = mysqli_query($conn, $sqlother);
