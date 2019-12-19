<?php
$conn = db_connection();
$sql = "SELECT fr.FabReceiveID, fr.POID, fr.StyleID, fr.Buyer, fr.Color, b.BuyerName, p.PONumber, s.StyleNumber, c.color FROM fab_receive fr, Buyer b, po p, style s, color c WHERE fr.Status = '1' AND fr.Buyer = b.BuyerID AND fr.StyleID = s.StyleID AND fr.POID = p.POID AND fr.Color = c.id GROUP BY fr.Buyer, fr.StyleID, fr.POID, fr.Color ORDER BY fr.FabReceiveID DESC";

$query = mysqli_query($conn, $sql);

$sqlother = "SELECT DISTINCT  b.BuyerName, b.BuyerID, f.ContrastPocket, f.id, c.color, f.Color from buyer b LEFT JOIN fab_receive_other f ON b.BuyerID = f.BuyerID LEFT JOIN color c ON f.Color = c.id WHERE NOT (f.Color <=> NULL) GROUP BY f.Color, f.ContrastPocket";
$queryother = mysqli_query($conn, $sqlother);
