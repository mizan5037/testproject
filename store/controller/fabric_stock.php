<?php
$conn = db_connection();
$sql = "SELECT DISTINCT  b.BuyerName, f.Color, f.FabReceiveID,  b.BuyerID, c.color, s.StyleID, s.StyleNumber from buyer b LEFT JOIN masterlc m ON b.BuyerID = m.MasterLCBuyer LEFT JOIN masterlc_description md ON m.MasterLCID = md.MasterLCID LEFT JOIN fab_receive f ON md.POID = f.POID LEFT JOIN style s ON f.StyleID = s.StyleID LEFT JOIN color c ON f.Color = c.id WHERE NOT (s.StyleNumber <=> NULL) GROUP BY f.Color, f.StyleID";

$query = mysqli_query($conn, $sql);

$sqlother = "SELECT DISTINCT  b.BuyerName, b.BuyerID, f.ContrastPocket, f.id, c.color, f.Color from buyer b LEFT JOIN fab_receive_other f ON b.BuyerID = f.BuyerID LEFT JOIN color c ON f.Color = c.id WHERE NOT (f.Color <=> NULL) GROUP BY f.Color, f.ContrastPocket";
$queryother = mysqli_query($conn, $sqlother);
