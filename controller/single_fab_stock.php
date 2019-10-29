<?php
if(isset($_GET['fab_rec_id']) && $_GET['fab_rec_id'] != ''){
    echo 'this is single stock fabric receive!!';
    $buyer_id = $_GET['fab_rec_id'];
    $color = $_GET['color'];
    $sql = "SELECT DISTINCT f.FabReceiveID, b.BuyerName, b.BuyerID, f.Color, f.Shade, f.Shrinkage, f.Width, f.ReceivedFab, f.ReceivedRoll, s.StyleID, s.StyleNumber from buyer b LEFT JOIN masterlc m ON b.BuyerID = m.MasterLCBuyer LEFT JOIN masterlc_description md ON m.MasterLCID = md.MasterLCID LEFT JOIN fab_receive f ON md.POID = f.POID LEFT JOIN style s ON f.StyleID = s.StyleID WHERE b.BuyerID = '$buyer_id' AND f.Color = '$color' AND s.StyleID = 9";
}elseif(isset($_GET['fab_rec_id_other']) && $_GET['fab_rec_id_other'] != ''){
    echo 'this is single stock fabric Other receive!!';
}else{
    nowgo('/index.php?page=fabric_stock');
}
