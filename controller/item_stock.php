<?php
$conn = db_connection();
$sql = "SELECT ir.Received, ir.ColorID, po.PONumber, po.POID, c.color, b.BuyerID, b.BuyerName, s.StyleID, s.StyleNumber FROM item_receive_access ir LEFT JOIN order_description od ON ir.POID = od.POID LEFT JOIN po ON od.POID = po.POID LEFT JOIN color c ON c.id = ir.ColorID LEFT JOIN masterlc_description md ON md.POID = od.POID LEFT JOIN masterlc m ON m.MasterLCID = md.MasterLCID LEFT JOIN buyer b ON b.BuyerID = m.MasterLCBuyer LEFT JOIN style s ON s.StyleID = ir.StyleID";
$query = mysqli_query($conn, $sql);

$sqlother = "SELECT b.BuyerName, b.BuyerID, f.ContrastPocket, f.id, c.color, f.Color from buyer b LEFT JOIN fab_receive_other f ON b.BuyerID = f.BuyerID LEFT JOIN color c ON f.Color = c.id WHERE NOT (f.Color <=> NULL) GROUP BY f.Color, f.ContrastPocket";
$queryother = mysqli_query($conn, $sqlother);

