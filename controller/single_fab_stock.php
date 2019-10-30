<?php
$conn = db_connection();

//if style is set
if(isset($_GET['fab_rec_id']) && $_GET['fab_rec_id'] != ''){
    $buyer_id = $_GET['fab_rec_id'];
    $color = $_GET['color'];
    $style = $_GET['style'];
    $sql = "SELECT fr.* FROM fab_receive fr LEFT JOIN masterlc_description md ON fr.POID = md.POID LEFT JOIN masterlc m ON md.MasterLCID = m.MasterLCID WHERE m.MasterLCBuyer = '$buyer_id' AND fr.Color = '$color' AND fr.StyleID = '$style'";
    $hasstyle = mysqli_query($conn, $sql);

    $sqlissue = "SELECT fi.*, f.BuyerID, f.StyleID FROM fab_issue_description fi LEFT JOIN fab_issue f ON fi.FabIssueID = f.FabIssueID WHERE f.BuyerID = '$buyer_id' AND f.StyleID = '$style' AND fi.Color = '$color'";
    $hasstyleissue = mysqli_query($conn, $sqlissue);
}elseif(isset($_GET['fab_rec_id_other']) && $_GET['fab_rec_id_other'] != ''){
    $buyer_id = $_GET['fab_rec_id_other'];
    $conpoc = $_GET['conpoc'];
    $color = $_GET['color'];

    $sql = "SELECT * FROM fab_receive_other WHERE BuyerID = '$buyer_id' AND ContrastPocket = '$conpoc' AND Color = '$color'";
    $hascon = mysqli_query($conn, $sql);

    $sqlissue = "SELECT fd.* FROM fabric_issue_other_description fd LEFT JOIN fabric_issue_other fo ON fd.FabricIssueotherID = fo.ID WHERE fo.BuyerID = '$buyer_id' AND fo.ContrastPocket = '$conpoc' AND fd.Color = '$color'";
    $hasconissue = mysqli_query($conn, $sqlissue);

}else{
    nowgo('/index.php?page=fabric_stock');
}

function getname($table, $column, $idColumn, $id){
    global $conn;
    $sql = "SELECT $column FROM $table WHERE $idColumn = $id";
    $query = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    if($query){
        return $query[$column];
    }else{
        return 'No Related Data Found!';
    }
}