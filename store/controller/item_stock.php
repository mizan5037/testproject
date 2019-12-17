<?php
$conn = db_connection();
$sql = "SELECT DISTINCT ir.ID, ir.Received, ir.ColorID, po.PONumber, ir.POID, c.color, b.BuyerID, b.BuyerName, s.StyleID, s.StyleNumber FROM item_receive_access ir LEFT JOIN order_description od ON ir.POID = od.POID LEFT JOIN po ON od.POID = po.POID LEFT JOIN color c ON c.id = ir.ColorID LEFT JOIN masterlc_description md ON md.POID = od.POID LEFT JOIN masterlc m ON m.MasterLCID = md.MasterLCID LEFT JOIN buyer b ON b.BuyerID = m.MasterLCBuyer LEFT JOIN style s ON s.StyleID = ir.StyleID";
$query = mysqli_query($conn, $sql);


