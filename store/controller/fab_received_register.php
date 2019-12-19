<?php
$conn = db_connection();
$sql = "SELECT fr.FabReceiveID, fr.POID, fr.StyleID, fr.Buyer, fr.Color, b.BuyerName, p.PONumber, s.StyleNumber, c.color FROM fab_receive fr, Buyer b, po p, style s, color c WHERE fr.Status = '1' AND fr.Buyer = b.BuyerID AND fr.StyleID = s.StyleID AND fr.POID = p.POID AND fr.Color = c.id GROUP BY fr.Buyer, fr.StyleID, fr.POID, fr.Color ORDER BY fr.FabReceiveID DESC";

$query = mysqli_query($conn, $sql);

$sqlother = "SELECT b.BuyerID,b.BuyerName,fo.id,fo.ContrastPocket FROM fab_receive_other fo LEFT JOIN buyer b ON b.BuyerID = fo.BuyerID WHERE fo.Status = '1' GROUP BY fo.ContrastPocket,b.BuyerID ORDER BY fo.id";
$queryother = mysqli_query($conn, $sqlother);
