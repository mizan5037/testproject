<?php
$conn = db_connection();

if (isset($_GET['fabRecBuyer'])&& isset($_GET['fbRecPOID'])&& isset($_GET['fbRecStyle'])&& isset($_GET['fbRecColor'])) {
    $fabRecBuyer = $_GET['fabRecBuyer'];
    $fbRecPOID = $_GET['fbRecPOID'];
    $fbRecStyle = $_GET['fbRecStyle'];
    $fbRecColor = $_GET['fbRecColor'];

    $fab_Recd  = "SELECT b.BuyerID,b.BuyerName, fr.* FROM fab_receive fr LEFT JOIN masterlc_description md ON md.POID = fr.POID LEFT JOIN masterlc m ON m.MasterLCID = md.MasterLCID LEFT JOIN buyer b ON b.BuyerID = m.MasterLCBuyer WHERE fr.StyleID = '$fbRecStyle' AND b.BuyerID = '$fabRecBuyer' AND fr.POID = '$fbRecPOID' AND fr.Color ='$fbRecColor' AND fr.Status = '1'";

    $fab_Recd  = (mysqli_query($conn, $fab_Recd));   

} if (isset($_GET['fabRecOtherBuyerid']) && isset($_GET['ContrastPocket'])) {
    
    $BuyerID = $_GET['fabRecOtherBuyerid'];
    $ContrastPocket = $_GET['ContrastPocket'];
    
    $fab_Rec_other = "SELECT * FROM fab_receive_other WHERE ContrastPocket ='$ContrastPocket' AND BuyerID = '$BuyerID' AND Status = '1'";
    
    $fab_Rec_all = mysqli_query($conn, $fab_Rec_other);

} 


function getname($table, $column, $idColumn, $id)
{
    global $conn;
    $sql = "SELECT $column FROM $table WHERE $idColumn = $id";
    $query = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    if ($query) {
        return $query[$column];
    } else {
        return 'No Related Data Found!';
    }
}
