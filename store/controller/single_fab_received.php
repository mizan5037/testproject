<?php
$conn = db_connection();

if (isset($_GET['fabRecBuyer'])&& isset($_GET['fbRecPOID'])&& isset($_GET['fbRecStyle'])&& isset($_GET['fbRecColor'])) {
    $fabRecBuyer = mysqli_real_escape_string($conn, $_GET['fabRecBuyer']);
    $fbRecPOID   = mysqli_real_escape_string($conn, $_GET['fbRecPOID']);
    $fbRecStyle  = mysqli_real_escape_string($conn, $_GET['fbRecStyle']);
    $fbRecColor  = mysqli_real_escape_string($conn, $_GET['fbRecColor']);

    $fab_Recd  = "SELECT DISTINCT b.BuyerID,b.BuyerName, fr.* FROM fab_receive fr LEFT JOIN masterlc_description md ON md.POID = fr.POID LEFT JOIN masterlc m ON m.MasterLCID = md.MasterLCID LEFT JOIN buyer b ON b.BuyerID = m.MasterLCBuyer WHERE fr.StyleID = '$fbRecStyle' AND b.BuyerID = '$fabRecBuyer' AND fr.POID = '$fbRecPOID' AND fr.Color ='$fbRecColor' AND fr.Status = '1'";

    $fab_Recd  = (mysqli_query($conn, $fab_Recd));
    if (isset($_POST['FabReceiveID']) && isset($_POST['fabRecDel'])) {
        $FabReceiveID = $_POST['FabReceiveID'];
        $sql = "UPDATE fab_receive SET  Status='0' WHERE FabReceiveID='$FabReceiveID'";
        $softDel = mysqli_query($conn,$sql);
        if($softDel){
            notice('success', 'Fab Received Deleted Successfully');
            nowgo('/index.php?page=single_fab_received&fabRecBuyer=' . $fabRecBuyer . '&fbRecPOID=' . $fbRecPOID['POID'] . '&fbRecStyle=' . $fbRecStyle . '&fbRecColor=' . $fbRecColor);

        } else {
            notice('error', $sql . "<br>" . mysqli_error($conn));
        }

    } 

} if (isset($_GET['fabRecOtherBuyerid']) && isset($_GET['ContrastPocket'])) {
    
    $BuyerID        = mysqli_real_escape_string($conn,$_GET['fabRecOtherBuyerid']);
    $ContrastPocket = mysqli_real_escape_string($conn,$_GET['ContrastPocket']);
    
    $fab_Rec_other = "SELECT * FROM fab_receive_other WHERE ContrastPocket ='$ContrastPocket' AND BuyerID = '$BuyerID' AND Status = '1'";
    
    $fab_Rec_all = mysqli_query($conn, $fab_Rec_other);

    if(isset($_POST['fabRcvOtherID']) && isset($_POST['fabRcvDel'])){
        $fabRcvOtherID = $_POST['fabRcvOtherID'];
        $sql = "UPDATE fab_receive_other SET Status='0' WHERE id = '$fabRcvOtherID'";
        $softDel = mysqli_query($conn,$sql);
        if($softDel){
            notice('success', 'Fab Received Other Deleted Successfully');
            nowgo('/index.php?page=single_fab_received&fabRecOtherBuyerid=' . $BuyerID  . '&ContrastPocket=' . $ContrastPocket);
        }    
        else{
            notice('error', $sql . "<br>" . mysqli_error($conn));

        }
    }

} 






function getname($table, $column, $idColumn, $id)
{
    global $conn;
    $sql   = "SELECT $column FROM $table WHERE $idColumn = $id";
    $query = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    if ($query) {
        return $query[$column];
    } else {
        return 'No Related Data Found!';
    }
}
