<?php
$conn = db_connection();

//if style is set
if(isset($_GET['fab_rec_id']) && $_GET['fab_rec_id'] != ''){
    $buyer_id = $_GET['fab_rec_id'];
    $color = $_GET['color'];
    $style = $_GET['style'];
    $sql = "SELECT fr.* FROM fab_receive fr LEFT JOIN masterlc_description md ON fr.POID = md.POID LEFT JOIN masterlc m ON md.MasterLCID = m.MasterLCID WHERE m.MasterLCBuyer = '$buyer_id' AND fr.Color = '$color' AND fr.StyleID = '$style'";
    $hasstyle = mysqli_query($conn, $sql);
}elseif(isset($_GET['fab_rec_id_other']) && $_GET['fab_rec_id_other'] != ''){

    echo 'this is single stock fabric Other receive!!';
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