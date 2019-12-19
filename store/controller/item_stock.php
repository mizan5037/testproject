<?php
$conn = db_connection();
$sql = "SELECT ia.*, b.BuyerName, b.BuyerID, c.color, s.StyleNumber, p.PONumber FROM item_receive_access ia, buyer b, color c, style s, po p WHERE ia.buyer = b.BuyerID AND ia.ColorID = c.id AND ia.POID = p.POID GROUP BY ia.buyer, ia.ColorID, ia.POID ORDER BY ia.ID DESC";
$query = mysqli_query($conn, $sql);


