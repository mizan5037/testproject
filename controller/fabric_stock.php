<?php
$conn = db_connection();
$sql = "SELECT DISTINCT f.FabReceiveID, b.BuyerName, b.BuyerID, f.Color, s.StyleID, s.StyleNumber from buyer b LEFT JOIN masterlc m ON b.BuyerID = m.MasterLCBuyer LEFT JOIN masterlc_description md ON m.MasterLCID = md.MasterLCID LEFT JOIN fab_receive f ON md.POID = f.POID LEFT JOIN style s ON f.StyleID = s.StyleID WHERE NOT (s.StyleNumber <=> NULL)";

$query = mysqli_query($conn, $sql);

$sqlother = "SELECT b.BuyerName, b.BuyerID, f.ContrastPocket, f.id, f.Color from buyer b LEFT JOIN fab_receive_other f ON b.BuyerID = f.BuyerID WHERE NOT (f.Color <=> NULL)";
$queryother = mysqli_query($conn, $sqlother);
